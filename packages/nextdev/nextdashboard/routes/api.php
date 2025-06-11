<?php

use Illuminate\Support\Facades\Route;
use nextdev\nextdashboard\Http\Controllers\AdminController;
use nextdev\nextdashboard\Http\Controllers\AuthController;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::apiResource('admins',AdminController::class);