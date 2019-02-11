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
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => ['auth:api']], function () {
    /*
       |--------------------------------------------------------------------------
       | Authenticate User Route
       |--------------------------------------------------------------------------
       */
    Route::post('user', 'AuthController@user');
    /*
      |--------------------------------------------------------------------------
      | User Controller Routes
      |--------------------------------------------------------------------------
      */
    Route::resource('users', 'UserController');
    /*
      |--------------------------------------------------------------------------
      | Company Controller Routes
      |--------------------------------------------------------------------------
      */
    Route::resource('companies', 'CompanyController');

});
