<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\ProductsController;
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

Route::post('/register', [UserAuthController::class ,'register']);
Route::post('/create-seller', [UserAuthController::class ,'createSeller'])->middleware('auth:api');
Route::post('/login', [UserAuthController::class ,'login']);

Route::apiResource('/product', ProductsController::class);
