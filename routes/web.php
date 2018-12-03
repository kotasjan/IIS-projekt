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

    Route::resource('borrowings', 'BorrowingsController');

    Route::post('borrowings/{borrowing}/confirm', 'BorrowingsController@confirm');

    Route::post('borrowings/{borrowing}/reject', 'BorrowingsController@reject');

    Route::post('borrowings/{borrowing}/finish', 'BorrowingsController@finish');

    Route::resource('clients', 'ClientsController');

    Route::resource('costume_types', 'CostumeTypesController');

    Route::resource('costume_types.costumes', 'CostumesController');

    Route::resource('borrowings.record_costumes', 'RecordsCostumeController');

    Route::resource('borrowings.record_accessories', 'RecordsAccessoryController');

    Route::resource('costume_types.accessories', 'AccessoriesController');

    Route::resource('categories', 'CategoriesController');

    Route::resource('employees', 'EmployeesController');

});