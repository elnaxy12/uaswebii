<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;

use App\Models\Product;


// Home page
Route::get('/', function () {
    $products = \App\Models\Product::all();
    return view('welcome', compact('products'));
})->name('welcome');


// Auth
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User routes (AUTH)
Route::middleware('auth')->group(function () {


    Route::get('/beranda', function () {
        $products = Product::all();
        return view('v_beranda.app', compact('products'));
    })->name('beranda')->middleware('auth');


    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
        ->name('user.dashboard');

    // Halaman order user
    Route::get('/order', [OrderController::class, 'index'])->name('user.order');

    // Checkout dari cart
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

    // Batalkan order
    Route::delete('/order/{order}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');

    // Detail order
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');

    // Wishlist page
    Route::get('/wishlists', [WishlistsController::class, 'index'])
        ->name('user.wishlists');

    // Add to wishlist
    Route::post('/wishlists/store', [WishlistsController::class, 'store'])
        ->name('wishlists.store');

    // Remove from wishlist
    Route::delete('/wishlist/{id}', [WishlistsController::class, 'destroy'])
        ->name('wishlists.destroy');

    Route::put('/dashboard/update', [UserController::class, 'updateProfile'])
        ->name('user.updateProfile');



    // ============================
    // CART SYSTEM (BARU)
    // ============================

    // Tampilkan cart
    Route::get('/cart', [CartController::class, 'index'])
        ->name('user.cart');

    // Tambah ke cart
    Route::post('/cart/store', [CartController::class, 'store'])
        ->name('cart.store');


    // Hapus item dengan DELETE method
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])
        ->name('cart.destroy'); // ⬅️ INI YANG BENAR

    // Update quantity (AJAX)
    Route::post('/cart/{cart}/update-quantity', [CartController::class, 'updateQuantity'])
        ->name('cart.update-quantity');

    // Update size (AJAX)
    Route::post('/cart/{cart}/update-size', [CartController::class, 'updateSize'])
        ->name('cart.update-size');

});


Route::middleware('auth')->group(function () {
    Route::post('/order/cart/checkout', [OrderController::class, 'createFromCart'])->name('order.createFromCart');
});


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

Route::post('/checkout/buy-now', [CheckoutController::class, 'buyNow'])
      ->name('checkout.buyNow');


// Admin routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard/analytics', [DashboardController::class, 'index'])
        ->name('admin.dashboard.analytics');

    Route::get('/admin/dashboard/ecommerce', [DashboardController::class, 'ecommerce'])
        ->name('admin.dashboard.ecommerce');
});


// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}/{slug}', [ProductController::class, 'show'])->name('product.show');
