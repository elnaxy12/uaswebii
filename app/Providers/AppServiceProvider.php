<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Order;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('base.sidebar', function ($view) {
            $view->with([
                'totalOrders'     => Order::count(),
                'pendingOrders'   => Order::where('status', 'pending')->count(),
                'waitingPaymentOrders'  => Order::where('status', 'waiting_payment')->count(),
                'waitingVerificationOrders'   => Order::where('status', 'waiting_verification')->count(),
                'shippedOrders'   => Order::where('status', 'shipped')->count(),
                'deliveredOrders' => Order::where('status', 'delivered')->count(),
                'canceledOrders'  => Order::where('status', 'canceled')->count(),
            ]);
        });

    }
}
