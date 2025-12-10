<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $orderCount = Order::count();
        $totalQuantity = OrderItem::sum('quantity');
        $totalUsers    = User::count();
        $canceledOrders  = Order::where('status', 'canceled')->count();


        return view('v_admin.v_dashboard.app', compact('admin', 'orderCount', 'totalQuantity', 'totalUsers', 'canceledOrders'));
    }

    public function ecommerce()
    {
        $admin = Auth::guard('admin')->user();

        // Best seller
        $bestSellers = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->take(10)
            ->get();

        // Recent orders
        $orders = Order::with('items.product')
            ->latest()
            ->take(5)
            ->get();

        return view('v_admin.v_dashboard.app2', compact('admin', 'bestSellers', 'orders'));
    }


    // controller user
    public function dashboard()
    {
        $user = Auth::guard('web')->user();
        return view('v_user.v_dashboard.app', compact('user'));
    }

    public function wishlists()
    {
        $user = Auth::guard('web')->user();
        return view('v_user.v_wishlists.app', compact('user'));
    }

    public function cart()
    {
        $user = Auth::guard('web')->user();
        return view('v_user.v_cart.app', compact('user'));
    }

    public function order()
    {
        $user = Auth::guard('web')->user();
        return view('v_user.v_order.app', compact('user'));
    }
}
