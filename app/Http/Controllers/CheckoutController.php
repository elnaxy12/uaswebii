<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        return view('v_user.v_checkout.app', compact('cartItems'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string'
        ]);

        $user = auth()->user();

        // Ambil cart user
        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        // Hitung total harga
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // 1. SIMPAN ORDER
        $order = Order::create([
            'user_id'     => $user->id,
            'total_price' => $total,
            'status'      => 'pending',
        ]);

        // 2. SIMPAN ORDER ITEMS
        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);
        }

        // 3. SIMPAN PAYMENT
        Payment::create([
            'order_id'        => $order->id,
            'payment_method'  => $request->payment_method,
            'payment_amount'  => $total,
            'payment_status'  => 'pending',
        ]);

        // 4. HAPUS CART
        Cart::where('user_id', $user->id)->delete();

        // 5. REDIRECT KE HALAMAN ORDER DETAIL USER
        return redirect()->route('user.order', $order->id);
    }


    // BUY NOW (langsung checkout 1 produk)
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
}
