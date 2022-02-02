<?php

use App\Models\Order\Order;
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

Route::middleware(['auth', 'status'])->group(function () {
    Route::prefix('/orders')->group(function () {
        Route::get('/', 'OrderController\OrderController@showOrder');
        Route::get('/create', 'OrderController\OrderController@addOrder');
        Route::get('/detail/{id}', 'OrderController\OrderController@detailOrder');
        Route::get('/edit/{id}', 'OrderController\OrderController@editOrder');
        Route::get('/print/{id}', 'OrderController\OrderController@printLabel');
    });

    Route::prefix('/couriers')->group(function () {
        Route::get('/', 'CourierController\CourierController@showCourier');
    });

    Route::prefix('/books')->group(function () {
        Route::get('/', 'AddressBookController\AddressController@showAddressBook');
        Route::get('/address/create', 'AddressBookController\AddressController@addAddress');
        Route::get('/address/detail', 'AddressBookController\AddressController@detailAddress');
        Route::get('/address/edit', 'AddressBookController\AddressController@editAddress');
        Route::get('/warehouse/create', 'AddressBookController\WarehouseController@addWarehouse');
        Route::get('/warehouse/detail', 'AddressBookController\WarehouseController@detailWarehouse');
        Route::get('/warehouse/edit', 'AddressBookController\WarehouseController@editWarehouse');
    });
/* Sub Account Controller */
    Route::middleware(['admin'])->prefix('/sub-accounts')->group(function () {
        Route::get('/', 'UserController@showSubAccount');
        Route::get('/create', 'UserController@addSubAccount');
        Route::get('/detail', 'UserController@detailsubAccount');
        Route::get('/edit', 'UserController@editsubAccount');
        Route::get('/searchsubacc', 'UserController@search');
    });

/* Search Controller */
    Route::get('/search', 'SearchController\SearchController@search');
    Route::get('/testcod', 'SearchController\SearchController@testcod');
});

Route::get('/event', 'OrderController\OrderController@event');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//login
Auth::routes();
Route::get('/', 'UserController@login');
Route::get('/login', 'UserController@login')->name('login');
Route::get('/home', 'OrderController\OrderController@showOrder')->name('home')->middleware('checkstatus', 'returnlogin');
//forget password
Route::get('/forgot', 'UserController@forgot')->name('forgot');
Route::get('forget-password', 'Auth\ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');
Route::get('/mailcon', 'Auth\ForgotPasswordController@mailcon')->name('mailcon');
Route::get('/forgetpass', 'Auth\ForgotPasswordController@forgetpass')->name('forgetpass');
Route::post('reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');

// ตาราง COD-table
Route::get('/cod', function () {
    return view('cod-table.cod-table');
});

// ตาราง POD-table
Route::get('/pod', function () {
    $orders = Order::all();
    return view('pod-table.pod-table', compact('orders'));
});
Route::get('/detail-pod', function () {
    return view('pod-table.detail-pod');
});

// Problem-order
Route::get('/problem-orders', function () {
    return view('problem-order.problem-order');
});

// Check-order
Route::get('/tracking', function () {
    return view('tracking.check-order');
});

// Affect-cost
Route::get('/affect-costs', function () {
    return view('affect-cost.affect-cost');
});
