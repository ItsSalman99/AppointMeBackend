<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Provider\AuthController;
use App\Http\Controllers\Provider\DashboardController;
use App\Http\Controllers\Provider\SettingsController;
use App\Http\Controllers\Provider\ServiceController;
use App\Http\Controllers\Provider\BookingController;
use App\Http\Controllers\Provider\AccountSettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class , 'login'])->name('login');
Route::post('/authenticate', [AuthController::class , 'authenticate'])->name('login.authenticate');
Route::get('/logout', [AuthController::class , 'logout'])->name('logout');
Route::get('/register', [AuthController::class , 'register'])->name('register');
Route::get('/register/business-info', [AuthController::class , 'registerStep2'])->name('registerStep2');
Route::get('/register/review', [AuthController::class , 'registerStep3'])->name('registerStep3');
Route::post('/user/session', [AuthController::class , 'registerUserSession'])->name('register.registerUserSession');
Route::post('/user/register', [AuthController::class , 'registerStore'])->name('register.user');

// Dashboard
Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');
Route::get('/dashboard/calendar', [DashboardController::class , 'calendar'])->name('dashboard.calendar');
Route::get('/dashboard/clients', [DashboardController::class , 'clients'])->name('dashboard.clients');
Route::get('/dashboard/inbox', [DashboardController::class , 'inbox'])->name('dashboard.inbox');

Route::get('/dashboard/bookings', [BookingController::class , 'index'])->name('dashboard.bookings.index');

Route::get('/dashboard/settigs/services', [ServiceController::class , 'index'])->name('dashboard.settings.services');
Route::post('/dashboard/settigs/services/store', [ServiceController::class , 'store'])->name('dashboard.settings.services.store');
Route::get('/dashboard/settigs/services/delete/{id}', [ServiceController::class , 'delete'])->name('dashboard.settings.services.delete');

Route::get('/dashboard/settigs/business-details', [SettingsController::class , 'businessDetails'])->name('dashboard.settings.business-details');
Route::post('/dashboard/settigs/business-details/update', [SettingsController::class , 'updateBusinessDetails'])->name('dashboard.settings.business-details.update');

Route::get('/dashboard/settigs/location', [SettingsController::class , 'location'])->name('dashboard.settings.location');
Route::get('/dashboard/settigs/availability', [SettingsController::class , 'availability'])->name('dashboard.settings.availability');
Route::get('/dashboard/settigs/payments', [SettingsController::class , 'payments'])->name('dashboard.settings.payments');

Route::get('/dashboard/account-settings', [AccountSettingController::class , 'accountSettings'])->name('dashboard.settings.accountSettings');
Route::post('/dashboard/updateScheduleDays', [AccountSettingController::class , 'updateScheduleDays'])->name('dashboard.settings.updateScheduleDays');

//ajax
Route::get('/register/getSubSectors/{id}', [AuthController::class , 'getSubSectors'])->name('getSubSectors');