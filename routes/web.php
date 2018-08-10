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
    Route::get('/gift', 'Admin\GiftController@index')->name('admin.gift.index');
    Route::post('/gift', 'Admin\GiftController@create')->name('admin.gift.create');
    Route::get('/gift/add', 'Admin\GiftController@show')->name('admin.gift.show');
    Route::get('/gift/edit/{id}', 'Admin\GiftController@edit')->name('admin.gift.edit');
    Route::post('/gift/update/{id}', 'Admin\GiftController@update')->name('admin.gift.update');
    Route::get('/gift/destroy/{id}', 'Admin\GiftController@destroy')->name('admin.gift.destroy');
});

//User Gift Route
Route::get('/gift', 'User\GiftController@index')->name('user.gift.index');
Route::post('/gift', 'User\GiftController@create')->name('user.gift.create');

Route::get('/{user}/soft-delete', 'UserController@softDelete')->name('admin.users.softdelete');
Route::get('/{user}/before-delete', 'UserController@beforeDelete')->name('admin.users.beforedelete');

