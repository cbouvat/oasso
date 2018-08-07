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

Route::prefix('admin')->group(function() {
    Route::get('/users-list', 'UserController@index')->name('admin.users.list');

    Route::get('/newsletter-index', 'NewsletterController@index')->name('admin.newsletter.index');
    Route::post('/newsletters', 'NewsletterController@submit')->name('admin.newsletters.submit');


});

