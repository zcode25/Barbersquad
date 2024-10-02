<?php

use App\Http\Controllers\Admin\BarbermanController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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


Route::controller(LoginController::class)->group(function() {
    Route::get('/', 'index')->name('login');
    Route::post('/login/authenticate', 'authenticate');
    Route::post('/logout', 'logout');
});

Route::controller(RegisterController::class)->group(function() {
    Route::get('/register', 'index');
    Route::post('/register/store', 'store');
});

Route::controller(UserController::class)->group(function() {
    Route::get('/profile/{user:id}', 'profile');
    Route::put('/profile/update/{user:id}', 'update');
});

Route::controller(AdminUserController::class)->group(function() {
    Route::get('/admin/customer', 'index');
    Route::get('/admin/customer/edit/{user:id}', 'edit')->middleware('auth');
    Route::put('/admin/customer/update/{user:id}', 'update')->middleware('auth');
    Route::delete('/admin/customer/delete/{user:id}', 'delete')->middleware('auth');
});

Route::controller(ServiceController::class)->group(function() {
    Route::get('/admin/service', 'index')->middleware('auth');
    Route::get('/admin/service/create', 'create')->middleware('auth');
    Route::post('/admin/service/store', 'store')->middleware('auth');
    Route::get('/admin/service/edit/{service:service_id}', 'edit')->middleware('auth');
    Route::put('/admin/service/update/{service:service_id}', 'update')->middleware('auth');
    Route::delete('/admin/service/delete/{service:service_id}', 'delete')->middleware('auth');
});

Route::controller(BarbermanController::class)->group(function() {
    Route::get('/admin/barberman', 'index')->middleware('auth');
    Route::get('/admin/barberman/create', 'create')->middleware('auth');
    Route::post('/admin/barberman/store', 'store')->middleware('auth');
    Route::get('/admin/barberman/edit/{barberman:barberman_id}', 'edit')->middleware('auth');
    Route::put('/admin/barberman/update/{barberman:barberman_id}', 'update')->middleware('auth');
    Route::delete('/admin/barberman/delete/{barberman:barberman_id}', 'delete')->middleware('auth');
});

Route::controller(BookingController::class)->group(function() {
    Route::get('/booking', 'index')->middleware('auth');
    Route::post('/booking/store', 'store')->middleware('auth');
    Route::get('/booking/date/{booking:booking_id}', 'date')->middleware('auth');
    Route::put('/booking/date/store/{booking:booking_id}', 'date_store')->middleware('auth');
    Route::get('/booking/confirmation/{booking:booking_id}', 'confirmation')->middleware('auth');
    Route::get('/booking/history', 'history')->middleware('auth');
    Route::get('/booking/print/{booking:booking_id}', 'print')->middleware('auth');
});

Route::controller(AdminBookingController::class)->group(function() {
    Route::get('/admin/booking', 'index')->middleware('auth');
    Route::get('/admin/booking/edit/{booking:booking_id}', 'edit')->middleware('auth');
    Route::put('/admin/booking/update/{booking:booking_id}', 'update')->middleware('auth');
});

Route::controller(TransactionController::class)->group(function() {
    Route::get('/admin/transaction', 'index')->middleware('auth');
    Route::get('/admin/transaction/edit/{transaction:transaction_id}', 'edit')->middleware('auth');
    Route::put('/admin/transaction/discount/{transaction:transaction_id}', 'discount')->middleware('auth');
    Route::put('/admin/transaction/update/{transaction:transaction_id}', 'update')->middleware('auth');
    Route::get('/admin/transaction/print/{transaction:transaction_id}', 'print')->middleware('auth');
    Route::get('/admin/transaction/report', 'report')->middleware('auth');
    Route::post('/admin/transaction/report/print', 'reportPrint')->middleware('auth');
});
