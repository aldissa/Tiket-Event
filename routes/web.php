<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/detail/{event}', [HomeController::class, 'detail'])->name('detail');

Route::get('/keranjang', [HomeController::class, 'keranjang'])->name('keranjang');
Route::post('/postkeranjang/{event}', [HomeController::class, 'postkeranjang'])->name('postkeranjang');

Route::get('/bayar/{detailorder}', [HomeController::class, 'bayar'])->name('bayar');
Route::post('/postbayar/{detailorder}', [HomeController::class, 'postbayar'])->name('postbayar');

Route::get('loginform', [AuthController::class, 'loginform'])->name('loginform');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/admin/events', [AdminController::class, 'events'])->name('admin');
    Route::post('/admin/events/{event}/update-status', [AdminController::class, 'updateEventStatus'])->name('events.update-status');

    Route::get('/admin/orders', [AdminController::class, 'pendingOrders'])->name('orders');
    Route::get('/admin/riwayat', [AdminController::class, 'completedRejectedOrders'])->name('riwayat');
    Route::post('/admin/orders/{detailOrder}/update-status', [AdminController::class, 'updateOrderStatus'])->name('orders.update-status');



