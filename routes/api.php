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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('register/check', 'Auth\RegisterController@check')->name('api-register-check');

Route::get('provinces', 'App\Http\Controllers\API\LocationController@provinces')->name('api-provinces');
Route::get('regencies/{provinces_id}', 'App\Http\Controllers\API\LocationController@regencies')->name('api-regencies');
Route::get('districts/{regencies_id}', 'App\Http\Controllers\API\LocationController@districts')->name('api-districts');
