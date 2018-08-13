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

Route::prefix('admin')->group(function () {

    //User
    Route::get('/user', 'Admin\UserController@index')->name('admin.user.index');
    Route::post('/user', 'Admin\UserController@store')->name('admin.user.store');
    Route::get('/user/create', 'Admin\UserController@create')->name('admin.user.create');
    Route::get('/user/{user}', 'Admin\UserController@show')->name('admin.user.show');
    Route::get('/user/{user}/delete', 'Admin\UserController@softDelete')->name('admin.user.softdelete');
    Route::get('/user/{user}/before', 'Admin\UserController@beforeDelete')->name('admin.user.beforedelete');

    //SubscriptionController
    Route::get('/subscription', 'Admin\SubscriptionController@index')->name('admin.subscription.index');
    Route::post('/subscription', 'Admin\SubscriptionController@store')->name('admin.subscription.store');
    Route::get('/subscription/create', 'Admin\SubscriptionController@create')->name('admin.subscription.create');
    Route::get('/subscription/{subscription}', 'Admin\SubscriptionController@edit')->name('admin.subscription.edit');
    Route::post('/subscription/{subscription}', 'Admin\SubscriptionController@update')->name('admin.subscription.update');
    Route::get('/subscription/{subscription}/beforedelete', 'Admin\SubscriptionController@beforeDelete')->name('admin.subscription.beforedelete');
    Route::get('/subscription/{subscription}/destroy/', 'Admin\SubscriptionController@destroy')->name('admin.subscription.destroy');

    //GiftController
    Route::get('/gift', 'Admin\GiftController@index')->name('admin.gift.index');
    Route::post('/gift', 'Admin\GiftController@create')->name('admin.gift.create');
    Route::get('/gift/create', 'Admin\GiftController@show')->name('admin.gift.show');
    Route::get('/gift/{gift}', 'Admin\GiftController@edit')->name('admin.gift.edit');
    Route::post('/gift/{gift}', 'Admin\GiftController@update')->name('admin.gift.update');
    Route::get('/gift/{gift}/destroy', 'Admin\GiftController@destroy')->name('admin.gift.destroy');
    Route::get('/gift/{gift}/before-delete', 'Admin\GiftController@beforeDelete')->name('admin.gift.beforeDelete');

    //NewsletterController
    Route::get('/', 'Admin\NewsletterController@index')->name('admin.newsletter.index');
    Route::post('/', 'Admin\NewsletterController@store')->name('admin.newsletter.store');
    Route::get('/create', 'Admin\NewsletterController@create')->name('admin.newsletter.create');
    Route::get('/{newsletter}', 'Admin\NewsletterController@edit')->name('admin.newsletter.edit');
    Route::post('/{newsletter}', 'Admin\NewsletterController@update')->name('admin.newsletter.update');
    Route::get('/{newsletter}/duplicate', 'Admin\NewsletterController@duplicate')->name('admin.newsletter.duplicate');
    Route::get('/{newsletter}/before-delete', 'Admin\NewsletterController@beforeDelete')->name('admin.newsletter.beforedelete');
    Route::get('/{newsletter}/delete', 'Admin\NewsletterController@delete')->name('admin.newsletter.delete');

    //MailingController
    Route::get('/mailing', 'Admin\MailingController@index')->name('admin.mailing.index');
    Route::get('/mailing/edit/{id}', 'Admin\MailingController@edit')->name('admin.mailing.edit');
    Route::post('/mailing/update/{id}', 'Admin\MailingController@update')->name('admin.mailing.update');
});



Route::prefix('user')->group(function () {

    //UserController
    Route::get('/user', 'User\UserController@index')->name('user.user.index');
    Route::get('/history', 'User\UserController@history')->name('history');
    Route::get('/edit/{user}', 'User\UserController@edit')->name('user.edit');
    Route::post('/update/{user}', 'User\UserController@update')->name('user.update');
    Route::get('/user/password', 'User\UserController@passwordEdit')->name('user.password.edit');
    Route::post('/user/password', 'User\UserController@passwordUpdate')->name('user.password.update');
    Route::get('/user/beforedelete/{id}', 'User\UserController@beforeDelete')->name('user.user.beforedelete');
    Route::get('/user/softdelete/{id}', 'User\UserController@softDelete')->name('user.user.softdelete');

    //SubscriptionController
    Route::get('/subscription/create', 'User\SubscriptionController@create')->name('user.subscription.create');
    Route::post('/subscription/store', 'User\SubscriptionController@store')->name('user.subscription.store');

    //GiftController
    Route::get('/gift', 'User\GiftController@create')->name('user.gift.create');
    Route::post('/gift', 'User\GiftController@store')->name('user.gift.store');
});


// Membership renewal
Route::get('/membershipRenewal', 'MembershipRenewalController@display')->name('membershipRenewal');
Route::post('/membershipRenewalConfirm', 'MembershipRenewalController@create')->name('renewalConfirmation');

//logout fix
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Search
Route::get('/search', 'SearchController@search')->name('search');

Auth::routes();
