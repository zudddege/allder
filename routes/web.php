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
Route::get('/login', function(){
    return view('Login_page.login');
});

Route::get('/edit', function(){
    return view('edit');
});

Route::get('/','\App\Http\Controllers\OrderControllers\OrderControllers@login');
Route::get('/order','\App\Http\Controllers\OrderControllers\OrderControllers@showOrder');
Route::get('/add_order', '\App\Http\Controllers\OrderControllers\OrderControllers@addOrder');
Route::get('/users/export','\App\Http\Controllers\OrderControllers\OrderControllers@export');
Route::post('/save_order', '\App\Http\Controllers\OrderControllers\OrderControllers@saveOrder');
Route::post('/import', '\App\Http\Controllers\OrderControllers\OrderControllers@import');


Route::get('/get_order_no', '\App\Http\Controllers\OrderControllers\OrderControllers@genOrderNo');
