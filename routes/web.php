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
    Route::get('/{user}/soft-delete', 'UserController@softDelete')->name('admin.users.softdelete');
    Route::get('/{user}/before-delete', 'UserController@beforeDelete')->name('admin.users.beforedelete');

    Route::prefix('newsletters')->group(function () {
        Route::get('/index', 'Admin\NewsletterController@index')->name('admin.newsletters.index');
        Route::get('/{id}/before-delete', 'Admin\NewsletterController@beforeDelete')->name('admin.newsletters.beforedelete');
        Route::get('/create', 'Admin\NewsletterController@create')->name('admin.newsletters.create');
        Route::post('/store', 'Admin\NewsletterController@store')->name('admin.newsletters.store');
        Route::post('/{id}/store-update', 'Admin\NewsletterController@storeUpdate')->name('admin.newsletters.storeUpdate');
        Route::get('/{id}/update', 'Admin\NewsletterController@update')->name('admin.newsletters.update');
        Route::get('/{id}/duplicate', 'Admin\NewsletterController@duplicate')->name('admin.newsletters.duplicate');
        Route::get('/{id}/delete', 'Admin\NewsletterController@delete')->name('admin.newsletters.delete');
    });

});
