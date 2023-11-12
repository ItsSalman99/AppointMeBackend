<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    //Auth Routes
    Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('admin.authenticate');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    //Auth Routes End


    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/providers', [UserController::class, 'providers'])->name('admin.dashboard.providers');
    Route::get('/dashboard/providers/{id}', [UserController::class, 'showProviders'])->name('admin.dashboard.showProviders');
    Route::get('/dashboard/customers', [UserController::class, 'customers'])->name('admin.dashboard.customers');
    Route::get('/dashboard/customers/{id}', [UserController::class, 'showCustomers'])->name('admin.dashboard.showCustomers');

    Route::get('/dashboard/bookings', [BookingController::class, 'index'])->name('admin.dashboard.bookings');

});
