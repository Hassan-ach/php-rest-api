<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'store']);
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth:api')->group(function () {
    Route::post('/user/addAddress', [RegisterController::class, 'addAddr']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::apiResource('products', ProductController::class)->except('index', 'show');
});

Route::apiResource('products', ProductController::class)->only('index', 'show');
