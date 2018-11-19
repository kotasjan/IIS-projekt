<?php

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


Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index');

    //Route::resource('orders', 'OrdersController');

    Route::resource('clients', 'ClientsController');

    //Route::resource('costumes', 'CostumesController');

    //Route::resource('accessories', 'AccessoriesController');

    //Route::resource('categories', 'CategoriesController');

    //Route::resource('employees', 'EmployeesController');


});