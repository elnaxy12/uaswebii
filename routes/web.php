<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// =============
// bagian route
// =============
Route::get('login', function () {
    return view('v_login.app');
})->name('login');

Route::get('register', function () {
    return view('v_register.app');
})->name('register');