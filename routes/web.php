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
// Order
    Route::prefix('/orders')->group(function () {
        Route::get('/', 'OrderController\OrderController@showOrder');
        Route::get('/create', 'OrderController\OrderController@addOrder');
        Route::get('/detail/{id}', 'OrderController\OrderController@detailOrder');
        Route::get('/edit/{id}  ', 'OrderController\OrderController@editOrder');
        Route::get('/print-S/{id}', 'OrderController\OrderController@printLabel_S');
        Route::get('/print-L/{id}', 'OrderController\OrderController@printLabel_L');

    });

    Route::prefix('/couriers')->group(function () {
        Route::get('/', 'CourierController\CourierController@showCourier');
    });
// สมุดที่อยู่
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

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//login
Auth::routes();
Route::get('/', 'UserController@login');
Route::get('/login', 'UserController@login')->name('login');
Route::get('/home', 'OrderController\OrderController@showOrder')->name('home')->middleware('checkstatus');
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
Route::get('/cod','CodController\CodController@showCOD');
Route::get('/event','CodController\CodController@event');

// ตาราง POD-table
Route::get('/pod','PodController\PodController@showPOD');
Route::get('/detail-pod/{id}','PodController\PodController@detailPOD');

// Problem-order
Route::get('/problem-orders','ProblemOrderController\ProblemOrderController@showProlemOrder');

// Check-order
Route::get('/tracking','TrackingController\TrackingController@showTracking');

// Affect-cost
Route::get('/affect-costs','AffectCostsController\AffectCostsController@showaffectcosts');


Route::get('/get-warehouse-data', 'AddressBookController\WarehouseController@getWarehouseDataListing');
Route::get('/create-order','OrderController\OrderController@authoCreateOrder');
Route::get('/edit-order','OrderController\OrderController@authoeditOrder');
Route::get('/cancel-order','OrderController\OrderController@authocancelOrder');
