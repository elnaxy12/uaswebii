<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

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


        return view('payment.confirm', [
             'order' => $order,
             'expiredAt' => Carbon::parse($order->payment_expired_at),
         ]);
    }

    /**
     * Submit bukti transfer
     */
    public function submit(Request $request, Order $order)
    {
        // Cegah akses kalau status tidak valid
        if ($order->status !== 'waiting_payment') {
            return back()->with('error', 'Status order tidak valid.');
        }


        $maxMB = 5;

        $request->validate(
            [
                'payment_proof' => 'required|image|max:' . ($maxMB * 1024),
            ],
            [
                'payment_proof.max' => "Ukuran bukti pembayaran maksimal {$maxMB} MB.",
                'payment_proof.image' => 'Bukti pembayaran harus berupa gambar.',
                'payment_proof.required' => 'Bukti pembayaran wajib diupload.',
            ]
        );


        $path = $request->file('payment_proof')
            ->store('payment-proofs', 'public');

        $order->update([
            'payment_proof' => $path,
            'sender_name'   => $request->sender_name,
            'status'        => 'waiting_verification',
        ]);

        return redirect()->route('v_user.v_order.app', $order->id)
            ->with('success', 'Bukti transfer berhasil dikirim. Menunggu verifikasi.');
    }
}
