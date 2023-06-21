<?php

/* use App\Http\Controllers\AperitifController;
use App\Http\Controllers\BeerController;
use App\Http\Controllers\BitterDrinkController;
use App\Http\Controllers\BottleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DessertController;
use App\Http\Controllers\InternationalLongDrinkController;
use App\Http\Controllers\LongDrinkController; */
use App\Http\Controllers\ProductController;
/* use App\Http\Controllers\RedWineController;
use App\Http\Controllers\SoftDrinkController;
use App\Http\Controllers\SpecialLongDrinkController;
use App\Http\Controllers\WhiskyController;
use App\Http\Controllers\WhiteWineController; */
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

    //Products
    Route::resource('/products',  ProductController::class);
    //Categories
    // Route::resource('/categories',  CategoryController::class);

    // //Aperitis
    // Route::resource('/aperitifs',  AperitifController::class);
    // //Dessert
    // Route::resource('/desserts',  DessertController::class);
    // //LongDrinks
    // Route::resource('/long_drinks',  LongDrinkController::class);
    // //SpecialLongDrinks
    // Route::resource('/special_long_drinks',  SpecialLongDrinkController::class);
    // //InternationaLongDrinks
    // Route::resource('/international_long_drinks',  InternationalLongDrinkController::class);
    // //WhiteWines
    // Route::resource('/white_wines',  WhiteWineController::class);
    // //RedWines
    // Route::resource('/red_wines',  RedWineController::class);
    // //Beers
    // Route::resource('/beers',  BeerController::class);
    // //Bitter Drinks
    // Route::resource('/bitter_drinks',  BitterDrinkController::class);
    // //Whiskies
    // Route::resource('/whiskies',  WhiskyController::class);
    //  //Soft Drinks
    //  Route::resource('/soft_drinks',  SoftDrinkController::class);
    //  //Bottles
    //  Route::resource('/bottles',  BottleController::class);
});


Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
