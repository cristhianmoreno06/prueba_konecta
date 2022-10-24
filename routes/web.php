<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('product')->middleware('auth')->group(function () {
    Route::get('/list', [ProductController::class, 'index'])->name('admin.list');
    Route::get('/create', [ProductController::class, 'create'])->name('admin.create');
    Route::get('/store', [ProductController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('admin.update');
    Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('admin.delete');
});

Route::prefix('sales')->middleware('auth')->group(function () {
    Route::get('/list', [SaleController::class, 'index'])->name('sale.list');
    Route::get('/sale/{id}', [SaleController::class, 'edit'])->name('sale.edit');
    Route::post('/sale/success/{id}', [SaleController::class, 'update'])->name('sale.update');
});
