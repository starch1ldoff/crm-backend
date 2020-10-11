<?php

/*
|--------------------------------------------------------------------------
| Service - API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth:api']
], function () {
    Route::resource('companies', 'CompanyController')->except(['create', 'edit']);
    Route::resource('employees', 'EmployeeController')->except(['create', 'edit']);
});
