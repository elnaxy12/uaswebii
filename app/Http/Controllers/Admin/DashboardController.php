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
}
