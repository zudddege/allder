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

/* Order Controller */
Route::get('/order', 'OrderController\OrderController@showOrder')->name('order');
Route::get('/order/create', 'OrderController\OrderController@addOrder');
Route::get('/order/{id}/detail', 'OrderController\OrderController@detailOrder');
Route::get('/order/{id}/edit', 'OrderController\OrderController@editOrder');
Route::get('/order/{id}/print', 'OrderController\OrderController@printLabel');

/* Courier Controller */
Route::get('/courier', 'CourierController\CourierController@showCourier');

/* Address Book Controller */
Route::get('/book/address', 'AddressBookController\AddressBookController@showAddressBook');

/* Sub Account Controller */
Route::get('/sub-account', 'UserController@showSubAccount')->name('subacc');
Route::get('/sub-account/create', 'UserController@addSubAccount');

/* Search Controller */
Route::get('/search', 'SearchController\SearchController@search');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//login
Auth::routes();
Route::get('/', 'UserController@login');
Route::get('/login', 'UserController@login')->name('login');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/forgot', 'UserController@forgot');
Route::get('forget-password', 'Auth\ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');

/** API **/
Route::post('/api/order/create', 'OrderController\OrderController@createOrder');
