<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StokController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\OrderDetailController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/loginAuth', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/kelolaKasir', KasirController::class)->middleware('auth');
Route::resource('/kelolaAdmin', AdminController::class)->middleware('auth');
Route::resource('/kelolaLaptop', LaptopController::class)->middleware('auth');
Route::resource('/kelolaStok', StokController::class)->middleware('auth');
Route::resource('/kelolaPelanggan', PelangganController::class)->middleware('auth');
// Route::resource('/invoice', InvoiceController::class)->middleware('auth');
// Route::get('/invoice', [InvoiceController::class, 'index'])->middleware('auth');
// Route::resource('/invoicePelanggan', InvoicePelanganController::class)->middleware('auth');
Route::resource('/order', OrdersController::class)->middleware('auth');
Route::delete('/orderDetail/{id}', [OrderDetailController::class, 'delete'])->middleware('auth');
Route::get('/invoice/{id}', [InvoiceController::class, 'index'])->middleware('auth');
// Route::post('/invoice/search', [InvoiceController::class, 'search'])->middleware('auth');
