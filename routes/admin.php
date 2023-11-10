<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    //Auth Routes
    Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('admin.authenticate');
    Route::get('/logout', [AuthController::class, 'logilogout'])->name('admin.logout');
    //Auth Routes End


    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/providers', [UserController::class, 'providers'])->name('admin.dashboard.providers');

});
