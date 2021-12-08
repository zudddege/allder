<?php

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

Route::get('/', '\App\Http\Controllers\OrderControllers\OrderControllers@showOrder');
Route::get('/order', '\App\Http\Controllers\OrderControllers\OrderControllers@showOrder');
Route::get('/add_order', '\App\Http\Controllers\OrderControllers\OrderControllers@addOrder');
Route::post('/save_order', '\App\Http\Controllers\OrderControllers\OrderControllers@saveOrder');
Route::post('/import', '\App\Http\Controllers\OrderControllers\OrderControllers@import');
Route::post('/export', '\App\Http\Controllers\OrderControllers\OrderControllers@export');
Route::get('/get_order_no', '\App\Http\Controllers\OrderControllers\OrderControllers@genOrderNo');
Route::get('/get_address_book', '\App\Http\Controllers\OrderControllers\OrderControllers@addressBook');
Route::get('/fetch_book', '\App\Http\Controllers\OrderControllers\OrderControllers@fetchBook');
Route::get('/edit', '\App\Http\Controllers\OrderControllers\OrderControllers@edit');
Route::get('/remove', '\App\Http\Controllers\OrderControllers\OrderControllers@remove');
Route::get('/cancel', '\App\Http\Controllers\OrderControllers\OrderControllers@cancel');
Route::get('/ordersuccess', '\App\Http\Controllers\OrderControllers\OrderControllers@ordersuccess');
Route::get('/get_order_no', '\App\Http\Controllers\OrderControllers\OrderControllers@genOrderNo');
Route::post('/order', '\App\Http\Controllers\OrderControllers\OrderControllers@search');
Route::get('/login', '\App\Http\Controllers\OrderControllers\OrderControllers@login');
Route::get('/callcuria', '\App\Http\Controllers\OrderControllers\OrderControllers@callcuria');

