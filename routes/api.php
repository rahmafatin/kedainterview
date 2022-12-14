<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MessaggeController;
use App\Http\Controllers\API\StaffController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('message', [MessaggeController::class, 'create']);
    Route::get('message/all', [MessaggeController::class, 'getAllMessagges']);

    Route::get('staff/customers/all', [StaffController::class, 'getAllCustomers']);
    Route::get('staff/customers/active', [StaffController::class, 'getActiveCustomers']);
    Route::delete('staff/customer', [StaffController::class, 'deleteCustomer']);

    Route::get('customer/message', [MessaggeController::class, 'getMessagesHistory']);
    Route::post('auth/logout', [AuthController::class, 'logout']);

});

