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

// Membership renewal
Route::get('/membershipRenewal', 'MembershipRenewalController@display')->name('membershipRenewal');
// route to payment will have to be inserted
Route::post('/membershipRenewalConfirm', 'MembershipRenewalController@create')->name('renewalConfirmation');

Route::prefix('user')->group(function () {
//User edit / update
    Route::get('/edit/{user}', 'UserController@edit')->name('user.edit');
    Route::post('/update/{user}', 'UserController@update')->name('user.update');
});

Route::prefix('admin')->group(function () {

    Route::get('/user', 'Admin\UserController@index')->name('admin.user.index');
    Route::get('/user/create', 'Admin\UserController@create')->name('admin.user.create');
    Route::get('/user/show/{user}', 'Admin\UserController@show')->name('admin.user.show');
    Route::post('/user/store', 'Admin\UserController@store')->name('admin.user.store');
    Route::get('/user/{user}/delete', 'Admin\UserController@softDelete')->name('admin.user.softdelete');
    Route::get('/user/{user}/before', 'Admin\UserController@beforeDelete')->name('admin.user.beforedelete');

    //Subscribers
    Route::get('/subscription', 'Admin\SubscriptionController@index')->name('admin.subscription.index');
    Route::get('/subscription/create', 'Admin\SubscriptionController@create')->name('admin.subscription.create');
    Route::post('/subscription/store', 'Admin\SubscriptionController@store')->name('admin.subscription.store');
    Route::get('/subscription/edit/{subscription}', 'Admin\SubscriptionController@edit')->name('admin.subscription.edit');
    Route::post('/subscription/update/{id}', 'Admin\SubscriptionController@update')->name('admin.subscription.update');
    Route::get('/subscription/beforedelete/{subscription}', 'Admin\SubscriptionController@beforeDelete')->name('admin.subscription.beforeDelete');
    Route::get('/subscription/destroy/{id}', 'Admin\SubscriptionController@destroy')->name('admin.subscription.destroy');

    //Gift Crud
    Route::get('/gift', 'Admin\GiftController@index')->name('admin.gift.index');
    Route::post('/gift', 'Admin\GiftController@create')->name('admin.gift.create');
    Route::get('/gift/add', 'Admin\GiftController@show')->name('admin.gift.show');
    Route::get('/gift/edit/{id}', 'Admin\GiftController@edit')->name('admin.gift.edit');
    Route::post('/gift/update/{id}', 'Admin\GiftController@update')->name('admin.gift.update');
    Route::get('/gift/destroy/{id}', 'Admin\GiftController@destroy')->name('admin.gift.destroy');

});

//User Gift Route

Route::get('/search', 'SearchController@search')->name('search');


Route::get('/user', 'User\UserController@index')->name('user.user.index');
Route::get('/user/beforedelete/{id}', 'User\UserController@beforeDelete')->name('user.user.beforedelete');
Route::get('/user/softdelete/{id}', 'User\UsertController@softDelete')->name('user.user.softdelete');

//subscription
Route::get('/subscription/create', 'User\SubscriptionController@create')->name('user.subscription.create');
Route::post('/subscription/store', 'User\SubscriptionController@store')->name('user.subscription.store');

//User Gift Route
Route::get('/gift', 'User\GiftController@create')->name('user.gift.create');
Route::post('/gift', 'User\GiftController@store')->name('user.gift.store');


