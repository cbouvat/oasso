<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users', function(){
    return \App\User::all();
});

//
//    Route::middleware('auth:api')->get('/user', function (Request $request) {
//        return $request->user();
//    });

