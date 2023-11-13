<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ServicesController;
use App\Http\Controllers\Api\ForgetPasswordController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SlotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('user')->middleware([
    'api'
])->group(function () {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('getlogin', [AuthController::class, 'getlogin']);
    Route::get('logout', [AuthController::class, 'logout']);

    Route::post('sendOtp', [AuthController::class, 'sendOtp']);
    Route::post('checkOtp', [AuthController::class, 'checkOtp']);

    Route::post('resetpassword/sendOtp', [ForgetPasswordController::class, 'sendOtp']);
    Route::post('resetpassword/checkOtp', [ForgetPasswordController::class, 'checkOtp']);
    Route::post('resetpassword', [ForgetPasswordController::class, 'resetPassword']);

    Route::prefix('profile')->group(function () {
        Route::post('addAddress', [ProfileController::class, 'getaddAddressAll']);
    });

});

Route::prefix('services')->group(function () {

    Route::get('getAll', [ServicesController::class, 'getAll']);
    Route::get('providers/getAll', [ServicesController::class, 'getProviders']);
    Route::get('providers/getSingle/{id}', [ServicesController::class, 'getSingleProviders']);
    Route::get('types/getAll', [ServicesController::class, 'getServiceTypes']);
});


Route::prefix('slots')->group(function () {

    Route::post('get', [SlotController::class, 'getSlots']);
});


Route::prefix('bookings')->group(function () {

    Route::get('getAll', [BookingController::class, 'getAll']);
    Route::get('getByDate/{date}', [BookingController::class, 'getByDate']);
    Route::get('getDetails/{id}', [BookingController::class, 'getDetails']);
    Route::post('cancel', [BookingController::class, 'cancelBooking']);
    Route::post('add', [BookingController::class, 'store']);
});
