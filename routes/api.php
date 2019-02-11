<?php

use Illuminate\Http\Request;

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

Route::group([ 'prefix' => ''], function () {

    /*
   |--------------------------------------------------------------------------
   | User Controller Routes
   |--------------------------------------------------------------------------
   | Endpoint: /api/users
   */
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('register', 'AuthController@register');
    Route::resource('users', 'UserController');
});

Route::group(['middleware' => ['auth:api']], function () {
    /*
       |--------------------------------------------------------------------------
       | Authenticate User Route
       |--------------------------------------------------------------------------
       | Endpoint: /api/user
       */
    Route::post('user', 'AuthController@user');

});
