<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('v_login.app');
    }

    /**
     * Proses login.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        // Ambil data login
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Coba login
        if (Auth::attempt($credentials, $request->filled('remember'))) {

            // generate ulang session (wajib)
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        // Kalau gagal
        return back()->withErrors([
            'email' => 'email atau password salah.',
        ])->withInput();
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}