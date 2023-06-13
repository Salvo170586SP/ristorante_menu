<?php

use App\Http\Controllers\BeerController;
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
    
    //Birre
    Route::resource('/beers',  BeerController::class);

});


Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');

