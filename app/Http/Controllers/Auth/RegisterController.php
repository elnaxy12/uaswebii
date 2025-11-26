<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    public function register(Request $request) // Pastikan method ini ada
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|email|unique:users,email',
            'username'   => 'required|unique:users,username|min:3|max:30|alpha_dash',
            'password'   => 'required|min:6|confirmed',
            'address'    => 'nullable|string|max:255',
            'phone'      => 'nullable|string|max:20',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan user baru
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'username'   => $request->username,
            'password'   => Hash::make($request->password),
            'address'    => $request->address,
            'phone'      => $request->phone,
        ]);

        // Login otomatis setelah register
        Auth::login($user);

        // Redirect ke dashboard
        return redirect('/beranda')->with('success', 'Registrasi berhasil!');
    }

    /**
     * OPSIONAL: Jika butuh API, buat method terpisah
     * Tapi pastikan route-nya di routes/api.php
     */
    public function registerApi(Request $request)
    {
        // ... kode untuk API
    }
}
