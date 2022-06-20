<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductlineController;
use Illuminate\Support\Facades\Route;

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

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('productlines', ProductlineController::class);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('redirectToGoogle');

Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('handleGoogleCallback');
