<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShowPriceController;
use App\Http\Controllers\CurrencyController;
use App\Https\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CurrencyListController;


Route::get('/', [PageController::class, 'homePage'])->name('home');
Route::view('/about', 'about');
Route::get('/list', [CurrencyListController::class, 'index'])->name('currencies.list');

Route::get('/show-price', [ShowPriceController::class, 'showPrice'])->name('show.price');
Route::get('/currencies', [CurrencyController::class, 'showCurrenciesPage'])->name('currencies.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/favourites', [FavouriteController::class, 'showFavourites'])->name('favourites.show');
Route::post('/favourites/add', [FavouriteController::class, 'addOrUpdateFavourite'])->name('favourites.add');
Route::delete('/favourites/delete/{currencyName}', [FavouriteController::class, 'deleteFavourite'])->name('favourites.delete');
