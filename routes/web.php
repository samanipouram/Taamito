<?php

use Illuminate\Support\Facades\Route;

Route::name('products')->prefix('products')->group(function () {
    Route::get('/get', [\App\Http\Controllers\ProductController::class, 'getProducts']);
    Route::get('/index', [\App\Http\Controllers\ProductController::class, 'index']);
});
