<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RajaOngkirController;

Route::get('/provinces', [RajaOngkirController::class, 'getProvinces']);
Route::get('/cities/{provinceId}', [RajaOngkirController::class, 'getCities']);
Route::post('/cost', [RajaOngkirController::class, 'getCost']);