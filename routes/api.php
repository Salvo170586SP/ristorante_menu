<?php

use App\Http\Controllers\Api\AperitifController;
use App\Http\Controllers\Api\BeerController;
use App\Http\Controllers\Api\BitterDrinkController;
use App\Http\Controllers\Api\BottleController;
use App\Http\Controllers\Api\DessertController;
use App\Http\Controllers\Api\InternationalLongDrinkController;
use App\Http\Controllers\Api\LongDrinkController;
use App\Http\Controllers\Api\RedWineController;
use App\Http\Controllers\Api\SoftDrinkController;
use App\Http\Controllers\Api\SpecialLongDrinkController;
use App\Http\Controllers\Api\WhiskyController;
use App\Http\Controllers\Api\WhiteWineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Aperitifs
Route::get('/aperitifs', [AperitifController::class, 'index']);
Route::get('/aperitif/{id}', [AperitifController::class, 'show']);
//Beers
Route::get('/beers', [BeerController::class, 'index']);
Route::get('/beer/{id}', [BeerController::class, 'show']);
//BitterDrinks
Route::get('/bitterDrinks', [BitterDrinkController::class, 'index']);
Route::get('/bitterDrink/{id}', [BitterDrinkController::class, 'show']);
//Bottle
Route::get('/bottles', [BottleController::class, 'index']);
Route::get('/bottle/{id}', [BottleController::class, 'show']);
//Desserts
Route::get('/desserts', [DessertController::class, 'index']);
Route::get('/dessert/{id}', [DessertController::class, 'show']);
//InternationalLongDrinks
Route::get('/internationalLongDrinks', [InternationalLongDrinkController::class, 'index']);
Route::get('/internationalLongDrink/{id}', [InternationalLongDrinkController::class, 'show']);
//LongDrinks
Route::get('/longDrinks', [LongDrinkController::class, 'index']);
Route::get('/longDrink/{id}', [LongDrinkController::class, 'show']);
//RedWine
Route::get('/redWines', [RedWineController::class, 'index']);
Route::get('/redWine/{id}', [RedWineController::class, 'show']);
//SoftDrinks
Route::get('/softDrinks', [SoftDrinkController::class, 'index']);
Route::get('/softDrink/{id}', [SoftDrinkController::class, 'show']);
//SpecialLongDrink
Route::get('/specialLongDrinks', [SpecialLongDrinkController::class, 'index']);
Route::get('/specialLongDrink/{id}', [SpecialLongDrinkController::class, 'show']);
//Whiskeis
Route::get('/whiskies', [WhiskyController::class, 'index']);
Route::get('/whisky/{id}', [WhiskyController::class, 'show']);
//WhiteWines
Route::get('/whiteWines', [WhiteWineController::class, 'index']);
Route::get('/whiteWine/{id}', [WhiteWineController::class, 'show']);
