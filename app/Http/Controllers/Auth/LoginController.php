<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('v_login.app');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        $email = $request->email;

        // Cek apakah email exists di database
        $userExists = User::where('email', $email)->exists();
        $adminExists = Admin::where('email', $email)->exists();

        // LOGIN ADMIN
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard/analytics');
        }

        // LOGIN USER
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        // Error handling yang lebih spesifik
        if (!$userExists && !$adminExists) {
            return back()->with('error', 'Email is not registered in the system.');
        }

        if (($userExists || $adminExists) && !Auth::guard('web')->attempt($credentials) && !Auth::guard('admin')->attempt($credentials)) {
            return back()->with('error', 'The password you entered is incorrect.');
        }

        // Fallback error
        return back()->with('error', 'An error occurred while logging in. Please try again.');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
