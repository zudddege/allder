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

Route::middleware(['auth', 'status'])->group(function () {
/* Import and Export */
    Route::post('/import/excel', 'ExcelController\ExcelController@import');
    Route::get('/export/excel', 'ExcelController\ExcelController@export');

/* Order Controller */
    Route::get('/order/gen-order-no', 'OrderController\OrderController@genOrderNo');
    Route::post('/order/create', 'OrderController\OrderController@createOrder');
    Route::post('/order/{id}/modify', 'OrderController\OrderController@modifyOrder');
    Route::post('/order/{id}/cancel', 'OrderController\OrderController@cancelOrder');

/* Courier Controller */
    Route::get('/courier/get-notify', 'CourierController\CourierController@getNotification');
    Route::post('/courier/notify-courier', 'CourierController\CourierController@notifyCourier');
    Route::post('/courier/cancel-notify', 'CourierController\CourierController@cancelNotification');

/* Address Book Controller */
    Route::get('/book/address-book/get', 'AddressBookController\AddressBookController@getAddressBookById');
    Route::post('/book/address-book/create', 'AddressBookController\AddressBookController@createAddressBook');
    Route::post('/book/address-book/{id}/modify', 'AddressBookController\AddressBookController@modifyAddressBook');

    Route::get('/book/warehouse/get', 'AddressBookController\AddressBookController@getWarehouseById');
    Route::post('/book/warehouse/create', 'AddressBookController\AddressBookController@createWarehouse');
    Route::post('/book/warehouse/{id}/modify', 'AddressBookController\AddressBookController@modifyWarehouse');

/* Sub Account Controller */
    Route::middleware(['admin'])->group(function () {
        Route::post('/sub-account/create', 'UserController@createSubAccount');
        Route::get('/sub-account/gen-pass', 'UserController@genPassWord');
        Route::post('/sub-account/{id}/modifySubaccount', 'UserController@modifySubaccount');
        Route::get('/sub-account/turnoffuser', 'UserController@turnoffuser');
    });
});
