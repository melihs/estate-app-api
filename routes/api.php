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

    Route::post('logout','AuthController@logout');
    /*
      |--------------------------------------------------------------------------
      | User Controller Routes
      |--------------------------------------------------------------------------
      */
    Route::resource('users', 'UserController');
    Route::get('users/{id}/companies','UserController@UserCompany');
    /*
      |--------------------------------------------------------------------------
      | Company Controller Routes
      |--------------------------------------------------------------------------
      */
    Route::resource('companies', 'CompanyController');
    Route::get('companies/{id}/appointments', 'CompanyController@companyAppointments');
    /*
      |--------------------------------------------------------------------------
      | Appointment Controller Routes
      |--------------------------------------------------------------------------
      */
    Route::resource('appointments','AppointmentController');
});
