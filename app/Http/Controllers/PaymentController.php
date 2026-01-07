<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Halaman konfirmasi pembayaran (dari email)
     */
    public function confirm(Order $order)
    {
        // Cegah akses kalau status tidak valid
        if (!in_array($order->status, ['pending', 'waiting_payment'])) {
            return redirect('/')
                ->with('error', 'Order tidak dapat dikonfirmasi.');
        }

        // Cek expired
        if ($order->payment_expired_at && now()->greaterThan($order->payment_expired_at)) {
            return redirect('/')
                ->with('error', 'Waktu pembayaran telah habis.');
        }

        return view('payment.confirm', compact('order'));
    }

    /**
     * Submit bukti transfer
     */
    public function submit(Request $request, Order $order)
    {
        if ($order->status !== 'waiting_payment') {
            return back()->with('error', 'Status order tidak valid.');
        }

        $request->validate([
            'sender_name'   => 'required|string|max:100',
            'payment_proof' => 'required|image|max:2048',
        ]);

        $path = $request->file('payment_proof')
            ->store('payment-proofs', 'public');

        $order->update([
            'payment_proof' => $path,
            'sender_name'   => $request->sender_name,
            'status'        => 'waiting_verification',
        ]);

        return redirect()->route('payment.confirm', $order->id)
            ->with('success', 'Bukti transfer berhasil dikirim. Menunggu verifikasi.');
    }
}
