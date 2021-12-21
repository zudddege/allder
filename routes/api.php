<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Import and Export */
Route::post('/import/excel', 'ExcelController\ExcelController@import');
Route::get('/export/excel', 'ExcelController\ExcelController@export');

/* Order Controller */
Route::post('/order/create', 'OrderController\OrderController@createOrder');
Route::get('/order/gen-order-no', 'OrderController\OrderController@genOrderNo');
Route::post('/order/{id}/modify', 'OrderController\OrderController@modifyOrder');
Route::post('/order/{id}/cancel', 'OrderController\OrderController@cancelOrder');

/* Courier Controller */

/* Address Book Controller */
Route::get('/address-book/id', 'AddressBookController\AddressBookController@getAddressBookById');

/* Sub Account Controller */
Route::post('/sub-account/create', 'UserController@createSubAccount');
