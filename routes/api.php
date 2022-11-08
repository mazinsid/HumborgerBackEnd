<?php

use App\Http\Controllers\CategoryAPIController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/CategoryInfo', [CategoryAPIController::class, 'CategoryInfo']);
    Route::post('/getItems', [CategoryAPIController::class, 'getItems']);

    Route::post('/logout', [UserController::class, 'logout']);
});
