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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/informations-personnelles','UserController@edit')->name('user.edit');

Route::post('/informations-personnelles','UserController@update')->name('user.update');

Route::get('/search','SearchController@search')->name('search');



Route::prefix('admin')->group(function () {
    Route::get('/{user}/soft-delete', 'UserController@softDelete')->name('admin.users.softdelete');
    Route::get('/{user}/before-delete', 'UserController@beforeDelete')->name('admin.users.beforedelete');
});
