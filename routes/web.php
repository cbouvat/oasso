<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);
Route::get('/member/list', [MemberListController::class, 'index'])->name('member.list')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']);