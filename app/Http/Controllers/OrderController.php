<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Auth;
use DB;

class OrderController extends Controller
{
    // Tampilkan semua order user
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        return view('index2.order', compact('orders'));
    }

    // Checkout / buat order baru dari cart


    public function createFromCart()
    {
        $user = auth()->user();

        // Ambil cart + relasi product untuk menghindari null
        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Keranjang masih kosong!');
        }

        // Hitung total harga
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        // Simpan order
        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'total_price' => $totalPrice,
        ]);

        // Simpan order item
        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Hapus cart user
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('user.order')
            ->with('success', 'Order berhasil dibuat!');
    }


    // Batalkan order
    public function cancel(Order $order)
    {
        if ($order->user_id != auth()->id()) {
            abort(403);
        }
        $order->update(['status' => 'canceled']);
        return redirect()->back()->with('success', 'Order dibatalkan!');
    }

    // Detail order
    public function show(Order $order)
    {
        if ($order->user_id != auth()->id()) {
            abort(403);
        }
        $order->load('orderItems.product');
        return view('v_user.v_order.detail', compact('order'));
    }
}
