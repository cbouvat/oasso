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

Route::get('/search', 'SearchController@search')->name('search');

Route::prefix('admin')->group(function () {
    Route::get('/users-list', 'UserController@index')->name('admin.users.list');

    //Admin gift Crud
    Route::get('/gift/edit/{id}', 'GiftController@edit')->name('admin.gift.edit');
    Route::post('/gift/update/{id}', 'GiftController@update')->name('admin.gift.update');
    Route::get('/gift/destroy/{id}', 'GiftController@destroy')->name('admin.gift.destroy');
});

Route::get('/gift', 'GiftController@index')->name('front.user.gift');
Route::post('/gift', 'GiftController@create')->name('front.user.give');

Route::get('/{user}/soft-delete', 'UserController@softDelete')->name('admin.users.softdelete');
Route::get('/{user}/before-delete', 'UserController@beforeDelete')->name('admin.users.beforedelete');

