<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::post('/webhook/order-created', [\App\Http\Controllers\OrderWebhookController::class, 'create']);
});
