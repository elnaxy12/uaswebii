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
        // Validasi
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'remember' => 'accepted'
        ], [
            'remember.accepted' => 'You must agree to Remember Me to continue.',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = true; // karena wajib accepted pasti true

        // LOGIN USER
        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/beranda')->with('success', 'Login berhasil!');
        }

        // LOGIN ADMIN
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard/analytics');
        }

        // Cek email ada atau tidak
        $email = $request->email;
        $userExists = User::where('email', $email)->exists();
        $adminExists = Admin::where('email', $email)->exists();

        if (!$userExists && !$adminExists) {
            return back()->with('error', 'Email is not registered in the system.');
        }

        return back()->with('error', 'The password or Email you entered is incorrect.');
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
