<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User routes
Route::middleware('auth')->group(function () {
    Route::get('/beranda', function () {
        return view('v_beranda.app');
    })->name('beranda');
    
    Route::get('/dashboard', function () {
        return view('v_dashboard.user');
    })->name('dashboard');
});

// Admin routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard/analytics', [DashboardController::class, 'index'])
        ->name('admin.dashboard.analytics');
    
    Route::get('/admin/dashboard/ecommerce', [DashboardController::class, 'ecommerce'])
        ->name('admin.dashboard.ecommerce');
});