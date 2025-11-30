<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\EtalaseController;
use App\Http\Controllers\ProductController;


// routes/web.php


Route::get('/', function () {
    $products = \App\Models\Product::all(); 
    return view('welcome', compact('products'));
})->name('welcome');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// User routes

Route::middleware('auth')->group(function () {

    Route::get('/beranda', function () {
        return view('v_beranda.app');
    })->name('beranda');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
        ->name('user.dashboard');

    // Wishlists
    Route::get('/wishlists', [DashboardController::class, 'wishlists'])
        ->name('user.wishlists');

    // Cart
    Route::get('/cart', [DashboardController::class, 'cart'])
        ->name('user.cart');
});



// Admin routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard/analytics', [DashboardController::class, 'index'])
        ->name('admin.dashboard.analytics');
    
    Route::get('/admin/dashboard/ecommerce', [DashboardController::class, 'ecommerce'])
        ->name('admin.dashboard.ecommerce');
});




Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
