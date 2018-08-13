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

// Search
Route::get('/search', 'SearchController@search')->name('search');

Route::prefix('user')->group(function () {
    // User
    Route::get('/', 'User\UserController@index')->name('user.user.index');
    Route::get('/history', 'User\UserController@history')->name('history');
    Route::get('/{user}/edit', 'User\UserController@edit')->name('user.edit');
    Route::post('/{user}/update/', 'User\UserController@update')->name('user.update');
    Route::get('/password', 'User\UserController@passwordEdit')->name('user.password.edit');
    Route::post('/password', 'User\UserController@passwordUpdate')->name('user.password.update');
    Route::get('/{id}/beforedelete', 'User\UserController@beforeDelete')->name('user.user.beforedelete');
    Route::get('/{id}/softdelete', 'User\UserController@softDelete')->name('user.user.softdelete');

    // Subscription
    Route::get('/subscription/create', 'User\SubscriptionController@create')->name('user.subscription.create');
    Route::post('/subscription/store', 'User\SubscriptionController@store')->name('user.subscription.store');
    Route::get('/subscription/optOut/{subscription}/{user}', 'User\SubscriptionController@optOut')->name('user.subscription.optOut');

    // Gift
    Route::get('/gift', 'User\GiftController@create')->name('user.gift.create');
    Route::post('/gift', 'User\GiftController@store')->name('user.gift.store');

    // Membership renewal
    Route::get('/membershipRenewal', 'MembershipRenewalController@display')->name('membershipRenewal');
    Route::post('/membershipRenewalConfirm', 'MembershipRenewalController@create')->name('renewalConfirmation');
});

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    // User
    Route::get('/user', 'UserController@index')->name('user.index');
    Route::post('/user', 'UserController@store')->name('user.store');
    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::get('/user/{user}', 'UserController@show')->name('user.show');
    Route::get('/user/{user}/delete', 'UserController@softDelete')->name('user.softdelete');
    Route::get('/user/{user}/before', 'UserController@beforeDelete')->name('user.beforedelete');

    // Subscription
    Route::get('/subscription', 'SubscriptionController@index')->name('subscription.index');
    Route::post('/subscription', 'SubscriptionController@store')->name('subscription.store');
    Route::get('/subscription/create', 'SubscriptionController@create')->name('subscription.create');
    Route::get('/subscription/{subscription}', 'SubscriptionController@edit')->name('subscription.edit');
    Route::post('/subscription/{subscription}', 'SubscriptionController@update')->name('subscription.update');
    Route::get('/subscription/{subscription}/beforedelete', 'SubscriptionController@beforeDelete')->name('subscription.beforedelete');
    Route::get('/subscription/{subscription}/destroy/', 'SubscriptionController@destroy')->name('subscription.destroy');

    // Gift
    Route::get('/gift', 'GiftController@index')->name('gift.index');
    Route::post('/gift', 'GiftController@create')->name('gift.create');
    Route::get('/gift/create', 'GiftController@show')->name('gift.show');
    Route::get('/gift/{gift}', 'GiftController@edit')->name('gift.edit');
    Route::post('/gift/{gift}', 'GiftController@update')->name('gift.update');
    Route::get('/gift/{gift}/destroy', 'GiftController@destroy')->name('gift.destroy');
    Route::get('/gift/{gift}/before-delete', 'GiftController@beforeDelete')->name('gift.beforeDelete');

    // Newsletter
    Route::get('/newsletter', 'NewsletterController@index')->name('newsletter.index');
    Route::post('/newsletter', 'NewsletterController@store')->name('newsletter.store');
    Route::get('/newsletter/create', 'NewsletterController@create')->name('newsletter.create');
    Route::get('/newsletter/{newsletter}', 'NewsletterController@edit')->name('newsletter.edit');
    Route::post('/newsletter/{newsletter}', 'NewsletterController@update')->name('newsletter.update');
    Route::get('/newsletter/{newsletter}/duplicate', 'NewsletterController@duplicate')->name('newsletter.duplicate');
    Route::get('/newsletter/{newsletter}/before-delete', 'NewsletterController@beforeDelete')->name('newsletter.beforedelete');
    Route::get('/newsletter/{newsletter}/delete', 'NewsletterController@delete')->name('newsletter.delete');

    // Mailing
    Route::get('/mailing', 'MailingController@index')->name('mailing.index');
    Route::get('/mailing/{id}', 'MailingController@edit')->name('mailing.edit');
    Route::post('/mailing/{id}', 'MailingController@update')->name('mailing.update');
});

// Auth
Auth::routes();

// Logout
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

