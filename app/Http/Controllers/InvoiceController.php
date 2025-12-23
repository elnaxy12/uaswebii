<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;

class InvoiceController extends Controller
{
    public function download($orderId)
    {
        $order = Order::with(['user', 'items.product', 'items.size'])->findOrFail($orderId);

        $pdf = Pdf::loadView('invoice.pdf', compact('order'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('invoice-'.$order->id.'.pdf');
    }

    public function preview($orderId)
    {
        $order = Order::with(['user','items.product','items.size','payment'])
            ->findOrFail($orderId);

        return view('invoice.preview', compact('order'));
    }
}
