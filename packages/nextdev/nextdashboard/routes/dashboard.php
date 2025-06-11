<?php

use Illuminate\Support\Facades\Route;
use nextdev\nextdashboard\Http\Controllers\AdminController;
use nextdev\nextdashboard\Http\Controllers\AuthController;
use nextdev\nextdashboard\Http\Controllers\DropDownsController;
use nextdev\nextdashboard\Http\Controllers\TicketCategoriesController;
use nextdev\nextdashboard\Http\Controllers\TicketController;

Route::group(["prefix"=> "dashboard"], function () {
    
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
    });

    Route::group(['middleware' => 'auth:admin'], function () {

        // Admin management
        Route::apiResource('admins', AdminController::class);

        // Ticket management
        Route::apiResource('tickets', TicketController::class);

        // Ticket category management
        Route::apiResource('ticket-categories', TicketCategoriesController::class);

        // Dropdown settings
        Route::group(['prefix' => 'settings'], function () {
            Route::get('ticket-status', [DropDownsController::class, 'ticketStatuies']);
            Route::get('ticket-priorities', [DropDownsController::class, 'ticketPriorities']);
        });

    });
    
});
