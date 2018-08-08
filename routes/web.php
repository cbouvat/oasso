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

Route::get('/admin/members', 'Admin\UserController@index')->name('admin.member.index');
Route::get('/admin/member/create', 'Admin\UserController@create')->name('admin.member.create');
Route::post('/admin/member', 'Admin\UserController@store')->name('admin.member.store');

