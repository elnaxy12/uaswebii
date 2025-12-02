<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('v_admin.v_dashboard.app', compact('admin'));
    }

    public function ecommerce()
    {
        $admin = Auth::guard('admin')->user();
        return view('v_admin.v_dashboard.app2', compact('admin'));
    }


    // controller user
    public function dashboard() {
        $user = Auth::guard('web')->user();
        return view('v_user.v_dashboard.app', compact('user'));
    }

    public function wishlists() {
        $user = Auth::guard('web')->user();
        return view('v_user.v_wishlists.app', compact('user'));
    }

    public function cart() {
        $user = Auth::guard('web')->user();
        return view('v_user.v_cart.app', compact('user'));
    }

    public function order() {
        $user = Auth::guard('web')->user();
        return view('v_user.v_order.app', compact('user'));
    }
}
