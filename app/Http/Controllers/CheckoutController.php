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
    public function index()
    {
        $user = Auth::user();

        $cartItems = Cart::with(['product', 'size'])
            ->where('user_id', $user->id)
            ->get();

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

        if (session('order_source') === 'product') {
            $cartItems = $this->getBuyNowItem();
        }

        return view('v_user.v_checkout.app', compact('cartItems'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'first_name'      => 'required|string',
            'last_name'       => 'required|string',
            'email'           => 'required|email',
            'phone'           => 'required|string',
            'address'         => 'required|string',
            'payment_method'  => 'required|string',
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

            $order = Order::create([
                'user_id'        => $user->id,
                'total'          => $total,
                'status'         => 'pending',
                'first_name'     => $request->first_name,
                'last_name'      => $request->last_name,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'address'        => $request->address,
                'payment_method' => $request->payment_method,
            ]);

            foreach ($cartItems as $item) {

                $price = $this->getItemPrice($item);

                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product->id,
                    'size_id'    => $item->size_id,
                    'quantity'   => $item->quantity,
                    'price'      => $price,
                    'subtotal'   => $price * $item->quantity,
                ]);

                if ($item->size_id) {
                    DB::table('product_sizes')
                        ->where('product_id', $item->product->id)
                        ->where('size_id', $item->size_id)
                        ->decrement('stock', $item->quantity);
                }
            }

            Payment::create([
                'order_id'       => $order->id,
                'payment_method' => $request->payment_method,
                'payment_amount' => $total,
                'payment_status' => 'pending',
            ]);

            if (session('order_source') !== 'product') {
                Cart::where('user_id', $user->id)->delete();
            }

            session()->forget(['order_source', 'product_id', 'size_id', 'quantity']);

            DB::commit();

            return redirect()->route('user.order', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
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

    public function cancelBuyNow()
    {
        session()->forget(['order_source', 'product_id', 'size_id', 'quantity']);
        return redirect()->back();
    }
}
