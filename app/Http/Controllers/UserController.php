<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function updateProfile(Request $request)
    {

        $request->validate([
            'username' => "required|unique:users,username," . auth()->id(),
            'email'    => "required|email|unique:users,email," . auth()->id(),
        ]);


        $user = auth()->user();

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui');
    }

}
