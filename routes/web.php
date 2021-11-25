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
Route::get('/','\App\Http\Controllers\OrderControllers\OrderControllers@showorder');
Route::get('/order','\App\Http\Controllers\OrderControllers\OrderControllers@showorder');
Route::get('/add_order', '\App\Http\Controllers\OrderControllers\OrderControllers@addOrder');
Route::get('/users/export','\App\Http\Controllers\OrderControllers\OrderControllers@export');
Route::post('/save_order', '\App\Http\Controllers\OrderControllers\OrderControllers@saveOrder');
Route::get('/import','\App\Http\Controllers\OrderControllers\OrderControllers@import');
