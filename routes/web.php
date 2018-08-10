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

    //Admin/Newsletter
    Route::prefix('newsletters')->group(function () {
        Route::get('/index', 'Admin\NewsletterController@index')->name('admin.newsletter.index');
        Route::get('/{id}/before-delete', 'Admin\NewsletterController@beforeDelete')->name('admin.newsletter.beforedelete');
        Route::get('/create', 'Admin\NewsletterController@create')->name('admin.newsletter.create');
        Route::post('/store', 'Admin\NewsletterController@store')->name('admin.newsletter.store');
        Route::post('/{newsletter}/update', 'Admin\NewsletterController@update')->name('admin.newsletter.update');
        Route::get('/{newsletter}/edit', 'Admin\NewsletterController@edit')->name('admin.newsletter.edit');
        Route::get('/{id}/duplicate', 'Admin\NewsletterController@duplicate')->name('admin.newsletter.duplicate');
        Route::get('/{id}/delete', 'Admin\NewsletterController@delete')->name('admin.newsletter.delete');
    });
});

//User Gift Route
Route::get('/gift', 'User\GiftController@index')->name('user.gift.index');
Route::post('/gift', 'User\GiftController@create')->name('user.gift.create');


