<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/employees/get/{start}/{end}', 'EmployeeController@get');
Route::get('api/employees/search/{start}/{end}/{InputName}', 'EmployeeController@search');
Route::get('api/employees/count', 'EmployeeController@count');






