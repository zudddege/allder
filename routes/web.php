<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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
// login
Route::get('/', '\App\Http\Controllers\OrderControllers\OrderControllers@login');
//api
Route::post('/save_order', '\App\Http\Controllers\OrderControllers\OrderControllers@saveOrder');
Route::post('/import', '\App\Http\Controllers\OrderControllers\OrderControllers@import');
Route::get('/export', '\App\Http\Controllers\OrderControllers\OrderControllers@export');
Route::get('/get_order_no', '\App\Http\Controllers\OrderControllers\OrderControllers@genOrderNo');
Route::get('/get_address_book', '\App\Http\Controllers\OrderControllers\OrderControllers@addressBook');
Route::get('/fetch_book', '\App\Http\Controllers\OrderControllers\OrderControllers@fetchBook');
Route::post('/cancel/{id}', '\App\Http\Controllers\OrderControllers\OrderControllers@cancel');
Route::get('/print/{id}', '\App\Http\Controllers\OrderControllers\OrderControllers@printLabel');
Route::post('/edit_order/{id}', '\App\Http\Controllers\OrderControllers\OrderControllers@editOrder');
// Order
Route::get('/order', '\App\Http\Controllers\OrderControllers\OrderControllers@showOrder')->name('order');;
Route::get('/add_order', '\App\Http\Controllers\OrderControllers\OrderControllers@addOrder');
Route::get('/detail/{id}', '\App\Http\Controllers\OrderControllers\OrderControllers@detail');
Route::get('/edit/{id}', '\App\Http\Controllers\OrderControllers\OrderControllers@edit');
Route::get('/ordersuccess', '\App\Http\Controllers\OrderControllers\OrderControllers@ordersuccess');
Route::get('/get_order_no', '\App\Http\Controllers\OrderControllers\OrderControllers@genOrderNo');
Route::get('/search', '\App\Http\Controllers\OrderControllers\OrderControllers@search');
// Carrier
Route::get('/callcourier', '\App\Http\Controllers\OrderControllers\OrderControllers@callcourier');
// Login
Route::get('/login', '\App\Http\Controllers\OrderControllers\OrderControllers@login');
// subaccount
Route::get('/subaccount', '\App\Http\Controllers\OrderControllers\OrderControllers@subaccount')->name('subacc');
Route::get('/add_subaccount', '\App\Http\Controllers\OrderControllers\OrderControllers@add_subaccount');
Route::post('/createSubAccount','\App\Http\Controllers\UserController@createSubAccount');
//login
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//forgotpassword
Route::get('/forgot', '\App\Http\Controllers\OrderControllers\OrderControllers@forgot');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

