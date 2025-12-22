<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class CancelOrderJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(public int $orderId)
    {
    }

    public function handle()
    {
        $order = Order::with('items')->find($this->orderId);

        if (!$order || $order->status !== 'waiting_payment') {
            return;
        }

        if (now()->lessThan($order->payment_expired_at)) {
            return;
        }

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

        $order->update(['status' => 'canceled']);
    }
}
