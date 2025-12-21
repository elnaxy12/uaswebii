<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;

class CancelExpiredOrders extends Command
{
    protected $signature = 'orders:cancel-expired';
    protected $description = 'Cancel waiting payment orders and restore stock';

    public function handle()
    {
        $orders = Order::where('status', 'waiting_payment')
            ->where('payment_expired_at', '<', now())
            ->get();

        foreach ($orders as $order) {
            $order->cancelAndRestoreStock();
        }

        return Command::SUCCESS;
    }
}
