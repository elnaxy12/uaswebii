<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function __construct()
    {
        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = true;
        Config::$is3ds        = true;
    }

    public function index()
    {
        $user = Auth::user();

        $cartItems = Cart::with(['product', 'size'])
            ->where('user_id', $user->id)
            ->get();

        if (session('order_source') === 'product') {
            $cartItems = $this->getBuyNowItem();
        }

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('beranda')
                ->with('error', 'Keranjang kosong, silakan pilih produk terlebih dahulu.');
        }

        foreach ($cartItems as $item) {
            $item->additional_price = 0;

            if ($item->product_id && $item->size_id) {
                $pivot = DB::table('product_sizes')
                    ->where('product_id', $item->product_id)
                    ->where('size_id', $item->size_id)
                    ->first();

                if ($pivot) {
                    $item->additional_price = $pivot->additional_price;
                }
            }
        }

        return view('v_user.v_checkout.app', compact('cartItems'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'required|string',
            'address'    => 'required|string',
        ]);

        $user = Auth::user();

        $cartItems = session('order_source') === 'product'
            ? $this->getBuyNowItem()
            : Cart::with(['product', 'size'])->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Cart kosong');
        }

        DB::beginTransaction();

        try {
            $total = 0;
            foreach ($cartItems as $item) {
                $price = $this->getItemPrice($item);
                $total += $price * $item->quantity;
            }

            $shippingCost = (int) $request->shipping_cost ?? 0;
            $total += $shippingCost;

            // ✅ Cek order pending yang masih aktif (< 30 menit)
            $existingPending = Order::where('user_id', $user->id)
                ->where('status', 'pending')
                ->latest()
                ->first();

            if ($existingPending && $existingPending->created_at->diffInMinutes(now()) < 30) {
                // Pakai order lama, update totalnya saja
                $order = $existingPending;
                $order->update(['total' => $total, 'shipping_cost' => $shippingCost]);
            } else {
                // Buat order baru
                $order = Order::create([
                    'user_id'          => $user->id,
                    'total'            => $total,
                    'status'           => 'pending',
                    'first_name'       => $request->first_name,
                    'last_name'        => $request->last_name,
                    'email'            => $request->email,
                    'phone'            => $request->phone,
                    'address'          => $request->address,
                    'payment_method'   => 'midtrans',
                    'shipping_courier' => $request->shipping_courier,
                    'shipping_service' => $request->shipping_service,
                    'shipping_cost'    => $shippingCost,
                    'last_payment_method' => $request->payment_method,
                ]);

                foreach ($cartItems as $item) {
                    $price = $this->getItemPrice($item);

                    OrderItem::create([
                        'order_id'   => $order->id,
                        'product_id' => $item->product->id,
                        'size_id'    => $item->size_id,
                        'quantity'   => $item->quantity,
                        'price'      => $price,
                    ]);
                }

                Payment::create([
                    'order_id'       => $order->id,
                    'payment_method' => 'midtrans',
                    'payment_amount' => $total,
                    'payment_status' => 'pending',
                ]);

                if (session('order_source') !== 'product') {
                    Cart::where('user_id', $user->id)->delete();
                }

                session()->forget(['order_source', 'product_id', 'size_id', 'quantity']);
            }

            // Build item details untuk Midtrans
            $itemDetails = [];
            foreach ($cartItems as $item) {
                $price = $this->getItemPrice($item);
                $itemDetails[] = [
                    'id'       => $item->product->id,
                    'price'    => (int) $price,
                    'quantity' => $item->quantity,
                    'name'     => substr($item->product->name, 0, 50),
                ];
            }

            if ($shippingCost > 0) {
                $itemDetails[] = [
                    'id'       => 'SHIPPING',
                    'price'    => $shippingCost,
                    'quantity' => 1,
                    'name'     => 'Ongkos Kirim ' . ($request->shipping_courier ?? ''),
                ];
            }

            $params = [
                'transaction_details' => [
                    'order_id'     => $order->id . '-' . time(), // ✅ hindari duplicate di Midtrans
                    'gross_amount' => (int) $total,
                ],
                'customer_details' => [
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'email'      => $request->email,
                    'phone'      => $request->phone,
                ],
                'item_details' => $itemDetails,
            ];

            $snapToken = Snap::getSnapToken($params);

            DB::commit();

            return response()->json([
                'snap_token' => $snapToken,
                'order_id'   => $order->id,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function handleNotification(Request $request)
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');

        $notification = new \Midtrans\Notification();

        $orderId        = $notification->order_id;
        $transactionStatus = $notification->transaction_status;
        $fraudStatus    = $notification->fraud_status;

        // Ambil order_id asli (karena kita pakai prefix QRIS-{id}-{time})
        $parts = explode('-', $orderId);
        $realOrderId = (count($parts) >= 2) ? $parts[1] : $orderId;

        $order = Order::with('orderItems')->find($realOrderId);

        if (!$order) return response()->json(['message' => 'Order not found'], 404);

        if ($transactionStatus == 'capture') {
        if ($fraudStatus == 'accept') {
            $order->update(['status' => 'paid']);
            $this->decrementStock($order); // ✅ kurangi stok
        }
        } elseif ($transactionStatus == 'settlement') {
            $order->update(['status' => 'paid']);
            $this->decrementStock($order); // ✅ kurangi stok
        } elseif ($transactionStatus == 'pending') {
            $order->update(['status' => 'pending']);
        } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
            $order->update(['status' => 'cancelled']);
        }

        return response()->json(['message' => 'OK']);
    }

    public function buyNow(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size_id'    => 'nullable|exists:sizes,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        // Buy Now = hapus cart lama
        Cart::where('user_id', auth()->id())->delete();

        Cart::create([
            'user_id'    => auth()->id(),
            'product_id' => $request->product_id,
            'size_id'    => $request->size_id,
            'quantity'   => $request->quantity,
        ]);

        return redirect()->route('checkout');
    }

    public function createQris(Request $request)
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $order = Order::findOrFail($request->order_id);

        $params = [
            'payment_type' => 'qris',
            'transaction_details' => [
                'order_id'     => 'QRIS-' . $order->id . '-' . time(),
                'gross_amount' => (int) $order->total,
            ],
            'qris' => [
                'acquirer' => 'gopay'
            ]
        ];

        $response = \Midtrans\CoreApi::charge($params);

        $qrUrl = $response->actions[0]->url ?? null;

        return response()->json([
            'qr_url'   => $qrUrl,
            'order_id' => $order->id,
        ]);
    }

    public function createBcaVa(Request $request)
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $order = Order::findOrFail($request->order_id);

        $params = [
            'payment_type' => 'bank_transfer',
            'transaction_details' => [
                'order_id'     => 'BCA-' . $order->id . '-' . time(),
                'gross_amount' => (int) $order->total,
            ],
            'bank_transfer' => [
                'bank' => 'bca'
            ],
            'customer_details' => [
                'first_name' => $order->first_name,
                'last_name'  => $order->last_name,
                'email'      => $order->email,
                'phone'      => $order->phone,
            ],
        ];

        $response = \Midtrans\CoreApi::charge($params);

        $vaNumber = $response->va_numbers[0]->va_number ?? null;

        return response()->json([
            'va_number' => $vaNumber,
            'bank'      => 'BCA',
            'order_id'  => $order->id,
            'total'     => $order->total,
        ]);
    }

    public function cancelBuyNow()
    {
        session()->forget(['order_source', 'product_id', 'size_id', 'quantity']);
        return redirect()->back();
    }

    public function repay($orderId)
    {
        $order = Order::with('orderItems.product', 'orderItems.size')->findOrFail($orderId);

        // Pastikan order milik user yang login
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        // Pastikan masih pending
        if ($order->status !== 'pending') {
            return redirect()->route('user.order')->with('error', 'Order ini sudah tidak bisa dibayar.');
        }

        // Generate snap token baru
        $params = [
            'transaction_details' => [
                'order_id'     => $order->id . '-' . time(), // hindari duplicate order_id
                'gross_amount' => (int) $order->total,
            ],
            'customer_details' => [
                'first_name' => $order->first_name,
                'last_name'  => $order->last_name,
                'email'      => $order->email,
                'phone'      => $order->phone,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('v_user.v_order.repay', compact('order', 'snapToken'));
    }

    private function getBuyNowItem()
    {
        $product  = Product::find(session('product_id'));
        $sizeId   = session('size_id');
        $quantity = session('quantity');

        if (!$product) {
            return collect([]);
        }

        $size = $sizeId ? Size::find($sizeId) : null;

        $additional_price = 0;
        if ($sizeId) {
            $additional_price = DB::table('product_sizes')
                ->where('product_id', $product->id)
                ->where('size_id', $sizeId)
                ->value('additional_price') ?? 0;
        }

        return collect([(object)[
            'product'          => $product,
            'size'             => $size,
            'size_id'          => $sizeId,
            'quantity'         => $quantity,
            'additional_price' => $additional_price,
        ]]);
    }

    private function getItemPrice($item)
    {
        $base = $item->product->price ?? 0;

        if (!$item->size_id) {
            return $base;
        }

        $additional_price = DB::table('product_sizes')
            ->where('product_id', $item->product->id)
            ->where('size_id', $item->size_id)
            ->value('additional_price') ?? 0;

        return $base + $additional_price;
    }

    private function decrementStock(Order $order)
    {
        // Cegah double decrement kalau notif datang 2x
        if ($order->stock_decremented) return;

        foreach ($order->orderItems as $item) {
            if ($item->size_id) {
                DB::table('product_sizes')
                    ->where('product_id', $item->product_id)
                    ->where('size_id', $item->size_id)
                    ->decrement('stock', $item->quantity);
            }
        }

        $order->update(['stock_decremented' => true]);
    }
}
