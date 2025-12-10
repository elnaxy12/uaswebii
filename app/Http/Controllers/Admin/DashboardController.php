<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $productCount = Product::count();
        $totalOrders = Order::count();
        $orderCount = Order::where('status', Order::STATUS_PENDING)->count();
        $totalQuantity = OrderItem::sum('quantity');
        $totalUsers    = User::count();
        $canceledOrders  = Order::where('status', 'canceled')->count();


        return view('v_admin.v_dashboard.app', compact('admin', 'orderCount', 'totalQuantity', 'totalUsers', 'canceledOrders', 'productCount', 'totalOrders'));
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

    public function users()
    {
        $admin = Auth::guard('admin')->user();
        $users = User::latest()->paginate(10);
        return view('v_admin.v_data.v_users.app', compact('admin', 'users'));
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
