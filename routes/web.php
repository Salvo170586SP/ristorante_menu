<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StyleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

    //Categories
    Route::resource('/categories',  CategoryController::class);
    //Products
    Route::resource('/products',  ProductController::class);
    //Styles
    Route::resource('/styles',  StyleController::class);

});


Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
