<?php

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

Route::group(['prefix' => 'users'], function () {
    // Route::post('login', 'API\V1\Auth\LoginController@login');
    Route::post('/sendOTP', 'Frontend\OtpController@send')->name('otp');
});

Route::group(['middleware' => 'auth:api'], function () {
});
