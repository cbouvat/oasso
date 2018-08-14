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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('user')->name('user.')->namespace('User')->group(function () {
    // User
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/history', 'UserController@history')->name('history');
    Route::get('/{user}/edit', 'UserController@edit')->name('edit');
    Route::post('/{user}/update/', 'UserController@update')->name('update');
    Route::get('/password', 'UserController@passwordEdit')->name('password.edit');
    Route::post('/password', 'UserController@passwordUpdate')->name('password.update');
    Route::get('/{id}/beforedelete', 'UserController@beforeDelete')->name('user.beforedelete');
    Route::get('/{id}/softdelete', 'UserController@softDelete')->name('user.softdelete');

    // Subscription
    Route::prefix('/subscription')->name('subscription.')->group(function () {
        Route::post('/', 'SubscriptionController@store')->name('store');
        Route::get('/create', 'SubscriptionController@create')->name('create');
    });

    // Gift
    Route::prefix('/gift')->name('gift.')->group(function () {
        Route::post('/', 'GiftController@store')->name('store');
        Route::get('/create', 'GiftController@create')->name('create');
    });
});

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    // User
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::post('/', 'UserController@store')->name('store');
        Route::get('/create', 'UserController@create')->name('create');
        Route::get('/{user}', 'UserController@show')->name('show');
        Route::get('/{user}/delete', 'UserController@softDelete')->name('softdelete');
        Route::get('/{user}/before', 'UserController@beforeDelete')->name('beforedelete');
    });

    // Subscription
    Route::prefix('subscription')->name('subscription.')->group(function () {
        Route::get('/', 'SubscriptionController@index')->name('index');
        Route::post('/', 'SubscriptionController@store')->name('store');
        Route::get('/create', 'SubscriptionController@create')->name('create');
        Route::get('/{subscription}', 'SubscriptionController@edit')->name('edit');
        Route::post('/{subscription}', 'SubscriptionController@update')->name('update');
        Route::get('/{subscription}/beforedelete', 'SubscriptionController@beforeDelete')->name('beforedelete');
        Route::get('/{subscription}/destroy/', 'SubscriptionController@destroy')->name('destroy');
    });

    // Gift
    Route::prefix('gift')->name('gift.')->group(function () {
        Route::get('/', 'GiftController@index')->name('index');
        Route::post('/', 'GiftController@create')->name('create');
        Route::get('/create', 'GiftController@show')->name('show');
        Route::get('/{gift}', 'GiftController@edit')->name('edit');
        Route::post('/{gift}', 'GiftController@update')->name('update');
        Route::get('/{gift}/destroy', 'GiftController@destroy')->name('destroy');
        Route::get('/{gift}/before-delete', 'GiftController@beforeDelete')->name('beforeDelete');
    });

    // Newsletter
    Route::prefix('newsletter')->name('newsletter.')->group(function () {
        Route::get('/', 'NewsletterController@index')->name('index');
        Route::post('/', 'NewsletterController@store')->name('store');
        Route::get('/create', 'NewsletterController@create')->name('create');
        Route::get('/{newsletter}', 'NewsletterController@edit')->name('edit');
        Route::post('/{newsletter}', 'NewsletterController@update')->name('update');
        Route::get('/{newsletter}/duplicate', 'NewsletterController@duplicate')->name('duplicate');
        Route::get('/{newsletter}/before-delete', 'NewsletterController@beforeDelete')->name('beforedelete');
        Route::get('/{newsletter}/delete', 'NewsletterController@delete')->name('delete');
    });

    // Mailing
    Route::prefix('mailing')->name('mailing.')->group(function () {
        Route::get('/', 'MailingController@index')->name('index');
        Route::get('/{id}', 'MailingController@edit')->name('edit');
        Route::post('/{id}', 'MailingController@update')->name('update');
    });
    Route::get('/payment', 'CheckoutController@payment')->name('payment');
    Route::post('/charge', 'CheckoutController@charge')->name('charge');

    // Search
    Route::get('/search', 'SearchController@search')->name('search');
});

// Auth
Auth::routes();

// Logout
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
