<?php

use Illuminate\Support\Facades\Route;
use nextdev\nextdashboard\Http\Controllers\AdminController;
use nextdev\nextdashboard\Http\Controllers\AuthController;
use nextdev\nextdashboard\Http\Controllers\DropDownsController;
use nextdev\nextdashboard\Http\Controllers\TicketCategoriesController;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::apiResource('admins',AdminController::class);

Route::apiResource('ticket-categries',TicketCategoriesController::class);

Route::get('/setting/ticket-status', [DropDownsController::class,'ticketStatuies']);
Route::get('/setting/ticket-priorities', [DropDownsController::class,'ticketPriorities']);