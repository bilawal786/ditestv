<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\Profile\ProfileController;
use App\Http\Controllers\Backend\Profile\ChangePasswordController;
use App\Http\Controllers\Backend\Users\UserController;
use App\Http\Controllers\Backend\Roles\RoleController;
use App\Http\Controllers\Backend\Setting\SettingController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Jobs\SendEmailJob;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('/email/send', [UserController::class, 'release_test_deadline_send_email'])->name('sendEmail');
    Route::get('/minimum/send', [UserController::class, 'minimum_activity_deadline'])->name('minimum_activity');
    Route::get('/insurance/send', [UserController::class, 'insurance_expiration'])->name('insurance_expire');
    Route::get('/medical/send', [UserController::class, 'medical_examination_deadline'])->name('medical_dealine');
    Route::get('/expiry/send', [UserController::class, 'expiry_date'])->name('expiry_date');
    Route::get('/all/emails', [UserController::class, 'sendAllEmails'])->name('sendAllEmails');

    Route::get('/export-data', [UserController::class, 'export'])->name('export.data');
    Route::get('/expired-data', [UserController::class, 'expiredUser'])->name('expired.data');


    Route::resource('profile', ProfileController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::post('/change/password', [ChangePasswordController::class, 'store'])->name('password.change');
});
