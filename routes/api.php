<?php

use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('send/otp', [UserController::class, 'sendOtpEmail']);
Route::post('/otp/verify', [UserController::class, 'otpVerifyEmail']);
Route::post('/forget/password', [UserController::class, 'forgetPassword']);

Route::group(['middleware' => 'auth:api'], function () {

    Route::post('/password/update', [UserController::class, 'passwordUpdate']);
    Route::get('/save-token/{token}', [UserController::class, 'token']);
    Route::get('/delete/account', [UserController::class, 'deleteAccount']);

});
