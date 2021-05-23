<?php

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


Route::redirect('/', 'product');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('product/top', [App\Http\Controllers\ProductController::class, 'top3'])->name('product.top');
    Route::resource('product', App\Http\Controllers\ProductController::class);
});