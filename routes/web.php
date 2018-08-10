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

Route::prefix('user')->group(function () {
//User edit / update
    Route::get('/edit/{user}', 'UserController@edit')->name('user.edit');
    Route::post('/update/{user}', 'UserController@update')->name('user.update');

});


Route::get('/search', 'SearchController@search')->name('search');
Route::get('/search', 'SearchController@search')->name('search');

Route::prefix('admin')->group(function () {
    Route::get('/user', 'UserController@index')->name('admin.user.index');
    Route::get('/user/create', 'Admin\UserController@create')->name('admin.user.create');
    Route::post('/user/store', 'Admin\UserController@store')->name('admin.user.store');
    Route::get('/user/{user}/delete', 'UserController@softDelete')->name('admin.user.softdelete');
    Route::get('/user/{user}/before', 'UserController@beforeDelete')->name('admin.user.beforedelete');
  
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


