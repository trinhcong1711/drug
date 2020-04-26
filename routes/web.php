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

Route::get('/', function () {
    return view('welcome');
});
//Route::resource('unit', 'Backend\UnitsController');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin','middleware' => ['auth'],'namespace' => 'Backend'], function() {

    Route::resource('roles','RoleController');

    Route::resource('admins','AdminController');

    Route::resource('medicines','MedicineController');

    Route::resource('unit', 'UnitsController')->except([
        'show', 'destroy'
    ]);;
    Route::get('unit/duplication/{id}','UnitsController@duplication')->name('unit.duplication');
    Route::get('unit/destroy/{id}','UnitsController@destroy')->name('unit.destroy');
    Route::get('unit/multi-destroy','UnitsController@multiDestroy')->name('unit.multi_destroy');

});
