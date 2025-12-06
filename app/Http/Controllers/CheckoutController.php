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

class CheckoutController extends Controller
{
    // Halaman checkout
    public function index()
    {
        $user = Auth::user();

        // Ambil cart user
        $cartItems = Cart::with('product', 'size')
            ->where('user_id', $user->id)
            ->get();

        // Cek Buy Now di session
        if (session('order_source') === 'product') {
            $cartItems = $this->getBuyNowItem();
        }

        return view('v_user.v_checkout.app', compact('cartItems'));
    }

    // Proses checkout
    public function processCheckout(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'required|string',
            'address'    => 'required|string',
            'payment_method' => 'required|string'
        ]);

        $user = Auth::user();

        // Ambil cart / Buy Now
        $cartItems = session('order_source') === 'product'
            ? $this->getBuyNowItem()
            : Cart::with('product', 'size')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada item untuk checkout.');
        }

        DB::beginTransaction();
        try {
            // Hitung total
            $total = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);

            // Simpan order
            $order = Order::create([
                'user_id' => $user->id,
                'total'   => $total,
                'status'  => 'pending',
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'address'    => $request->address,
                'payment_method' => $request->payment_method,
            ]);

            // Simpan order items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product->id,
                    'size_id'    => $item->size->id ?? $item->size_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price,
                    'subtotal'   => $item->product->price * $item->quantity,
                ]);
            }

            // Simpan payment
            Payment::create([
                'order_id'       => $order->id,
                'payment_method' => $request->payment_method,
                'payment_amount' => $total,
                'payment_status' => 'pending',
            ]);

            // Hapus cart
            if (session('order_source') !== 'product') {
                Cart::where('user_id', $user->id)->delete();
            }

            DB::commit();

            return redirect()->route('user.order', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Buy Now
    public function buyNow(Request $request)
    {
        session([
            'order_source' => 'product',
            'product_id'   => $request->product_id,
            'size_id'      => $request->size_id,
            'quantity'     => $request->quantity,
        ]);

        return redirect()->route('checkout');
    }

    // Buat item Buy Now supaya size selalu ada
    private function getBuyNowItem()
    {
        $product = Product::find(session('product_id'));
        $sizeId  = session('size_id');
        $quantity = session('quantity');

        if (!$product) {
            return collect([]);
        }

        // Ambil size dari database jika ada sizeId
        $size = $sizeId ? \App\Models\Size::find($sizeId) : null;

        return collect([(object) [
            'product' => $product,
            'size'    => $size,
            'size_id' => $sizeId,
            'quantity' => $quantity,
        ]]);
    }

    public function cancelBuyNow()
    {
        // Hapus session Buy Now
        session()->forget(['order_source', 'product_id', 'size_id', 'quantity']);

        // Redirect ke halaman sebelumnya atau ke list produk
        return redirect()->back();
    }

}
