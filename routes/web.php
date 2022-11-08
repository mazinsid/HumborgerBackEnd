<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\IngredientController;
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

// categories
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/store/category', [CategoryController::class, 'store'])->name('store_category');

// items
Route::get('/items/{id}', [ItemController::class, 'index'])->name('items');
Route::post('/store/items', [ItemController::class, 'store'])->name('store_items');

// ingredient 
Route::post('/ingredients', [IngredientController::class, 'index'])->name('ingredients');
Route::post('/store/ingredient', [IngredientController::class, 'store'])->name('store_ingredient');
