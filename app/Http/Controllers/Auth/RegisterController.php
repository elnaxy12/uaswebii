<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Tampilkan halaman register.
     */
    public function showRegisterForm()
    {
        return view('v_register.app');
    }

    /**
     * Proses register user baru.
     */
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username'   => 'required|unique:users,username|min:3|max:30',
            'password'   => 'required|min:6',
            'password2'  => 'required|same:password', // konfirmasi password
        ]);

        // Simpan user baru
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Login otomatis setelah register
        Auth::login($user);

        // Arahkan ke dashboard
        return redirect('/dashboard');
    }
}