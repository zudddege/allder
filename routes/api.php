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
    Route::prefix('/excel')->group(function () {
        Route::post('/import', 'ExcelController\ExcelController@import');
        Route::get('/export', 'ExcelController\ExcelController@export');
    });

    Route::prefix('/orders')->group(function () {
        Route::post('/gen-order-no', 'OrderController\OrderController@genOrderNo');
        Route::post('/create', 'OrderController\OrderController@createOrder');
        Route::post('/edit/{id}', 'OrderController\OrderController@modifyOrder');
        Route::post('/cancel/{id}', 'OrderController\OrderController@cancelOrder');
    });

    Route::prefix('/couriers')->group(function () {
        Route::post('/get-notify', 'CourierController\CourierController@getNotification');
        Route::post('/notify-courier', 'CourierController\CourierController@notifyCourier');
        Route::post('/cancel-notify', 'CourierController\CourierController@cancelNotification');
    });

    Route::prefix('/books')->group(function () {
        Route::get('/address', 'AddressBookController\AddressController@getAddress');
        Route::get('/address/{id}', 'AddressBookController\AddressController@getAddressById');
        Route::post('/address/create', 'AddressBookController\AddressController@createAddress');
        Route::post('/address/edit/{id}', 'AddressBookController\AddressController@updateAddress');

        Route::get('/warehouse', 'AddressBookController\WarehouseController@getWarehouse');
        Route::get('/warehouse/{id}', 'AddressBookController\WarehouseController@getWarehouseById');
        Route::post('/warehouse/create', 'AddressBookController\WarehouseController@createWarehouse');
        Route::post('/warehouse/edit/{id}', 'AddressBookController\WarehouseController@updateWarehouse');
    });

/* Sub Account Controller */
    Route::middleware(['admin'])->prefix('/sub-accounts')->group(function () {
        Route::post('/create', 'UserController@createSubAccount');
        Route::get('/gen-pass', 'UserController@genPassword');
        Route::post('/edit/{id}', 'UserController@modifySubaccount');
        Route::post('/status', 'UserController@turnoffuser');
    });
});

Route::post('/webhooks/service', 'WebhookController\ServiceController@webhookServiceRequest')->middleware(['auth', 'status', 'admin']);

Route::middleware(['webhook'])->prefix('/webhooks')->group(function () {
    Route::post('/status', 'WebhookController\StatusController@webhookStatusRequest');
    Route::post('/weight', 'WebhookController\WeightController@webhookWeightRequest');
    Route::post('/price', 'WebhookController\PriceController@webhookPriceRequest');
    Route::post('/courier', 'WebhookController\CourierController@webhookCourierRequest');
});
