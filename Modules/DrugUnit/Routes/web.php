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


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'unit'], function () {
        Route::get('', 'UnitController@getList')->name('unit.getList');
        Route::get('add', 'UnitController@getAdd')->name('unit.getAdd');
        Route::post('add', 'UnitController@postAdd')->name('unit.postAdd');
        Route::get('edit/{id}', 'UnitController@getEdit')->name('unit.getEdit');
        Route::post('edit/{id}', 'UnitController@postEdit')->name('unit.postEdit');
        Route::get('delete/{id}', 'UnitController@getDelete')->name('unit.getDelete');
        Route::get('multi-delete/{id}', 'UnitController@getMultiDelete')->name('unit.getMultiDelete');
    });
});
