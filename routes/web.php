<?php

use Illuminate\Auth\Events\Login;
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
// Order
Route::get('/', '\App\Http\Controllers\OrderControllers\OrderControllers@login');
Route::get('/order', '\App\Http\Controllers\OrderControllers\OrderControllers@showOrder')->name('order');
Route::get('/add_order', '\App\Http\Controllers\OrderControllers\OrderControllers@addOrder');
Route::post('/save_order', '\App\Http\Controllers\OrderControllers\OrderControllers@saveOrder');
Route::post('/import', '\App\Http\Controllers\OrderControllers\OrderControllers@import');
Route::get('/export', '\App\Http\Controllers\OrderControllers\OrderControllers@export');
Route::get('/get_order_no', '\App\Http\Controllers\OrderControllers\OrderControllers@genOrderNo');
Route::get('/get_address_book', '\App\Http\Controllers\OrderControllers\OrderControllers@addressBook');
Route::get('/fetch_book', '\App\Http\Controllers\OrderControllers\OrderControllers@fetchBook');
Route::get('/edit/{id}', '\App\Http\Controllers\OrderControllers\OrderControllers@edit');
Route::get('/remove', '\App\Http\Controllers\OrderControllers\OrderControllers@remove');
Route::get('/cancel/{id}', '\App\Http\Controllers\OrderControllers\OrderControllers@cancel');
Route::get('/ordersuccess', '\App\Http\Controllers\OrderControllers\OrderControllers@ordersuccess');
Route::get('/get_order_no', '\App\Http\Controllers\OrderControllers\OrderControllers@genOrderNo');
Route::get('/search', '\App\Http\Controllers\OrderControllers\OrderControllers@search');
Route::get('/print/{id}', '\App\Http\Controllers\OrderControllers\OrderControllers@printLabel');
// Carrier
Route::get('/callcourier', '\App\Http\Controllers\OrderControllers\OrderControllers@callcourier');
// Login
Route::get('/login', '\App\Http\Controllers\OrderControllers\OrderControllers@login');
// subaccount
Route::get('/subaccount', '\App\Http\Controllers\OrderControllers\OrderControllers@subaccount')->name('subacc');
Route::get('/add_subaccount', '\App\Http\Controllers\OrderControllers\OrderControllers@add_subaccount');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
