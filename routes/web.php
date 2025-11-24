<?php

use Illuminate\Support\Facades\Route;

Route::name('products')->prefix('products')->group(function () {
    Route::get('/index', [\App\Http\Controllers\ProductController::class, 'index']);
    Route::get('/temp', [\App\Http\Controllers\ProductController::class, 'temp']);
});

