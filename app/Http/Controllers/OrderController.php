<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Mail\PaymentLinkMail;
use Illuminate\Support\Facades\Mail;
use App\Jobs\CancelOrderJob;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('index2.order', compact('orders'));
    }

    public function createFromCart()
    {
        $user = auth()->user();

        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Keranjang masih kosong!');
        }

        DB::transaction(function () use ($user, $cartItems) {

            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'waiting_payment',
                'payment_expired_at' => now()->addSeconds(30),
                'total' => null,
            ]);

            foreach ($cartItems as $item) {

                $order->items()->create([
                    'product_id' => $item->product_id,
                    'size_id' => $item->size_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                if ($item->size_id) {
                    DB::table('product_sizes')
                        ->where('product_id', $item->product_id)
                        ->where('size_id', $item->size_id)
                        ->decrement('stock', $item->quantity);
                } else {
                    DB::table('products')
                        ->where('id', $item->product_id)
                        ->decrement('stock', $item->quantity);
                }
            }

            Cart::where('user_id', $user->id)->delete();
        });

        return redirect()->route('user.order')
            ->with('success', 'Order berhasil dibuat, silakan lakukan pembayaran.');
    }

    public function cancel(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if ($order->status !== 'waiting_payment') {
            return back()->with('error', 'Order tidak bisa dibatalkan');
        }

        DB::transaction(function () use ($order) {

            foreach ($order->items as $item) {
                if ($item->size_id) {
                    DB::table('product_sizes')
                        ->where('product_id', $item->product_id)
                        ->where('size_id', $item->size_id)
                        ->increment('stock', $item->quantity);
                } else {
                    DB::table('products')
                        ->where('id', $item->product_id)
                        ->increment('stock', $item->quantity);
                }
            }

            $order->update(['status' => 'cancelled']);
        });

        return back()->with('success', 'Order dibatalkan & stok dikembalikan');
    }

    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('v_user.v_order.detail', compact('order'));
    }

    public function sendPaymentEmail($orderId)
    {
        $order = Order::with('user')->findOrFail($orderId);

        if (!in_array($order->status, ['pending', 'waiting_payment'])) {
            return back()->with('error', 'Order sudah diproses.');
        }

        $paymentLink = "https://paymentkamu.com/pay/{$order->id}";

        Mail::to($order->user->email)
            ->send(new PaymentLinkMail($order, $paymentLink));

        if (!$order->payment_expired_at) {

            $order->update([
                'status' => 'waiting_payment',
                'payment_expired_at' => now()->addSeconds(30),
            ]);

            CancelOrderJob::dispatch($order->id)
                ->delay($order->payment_expired_at);
        }

        return back()->with('success', 'Link pembayaran berhasil dikirim ke email.');
    }
}
