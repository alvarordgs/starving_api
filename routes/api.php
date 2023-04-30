<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\CardapioController;
use App\Http\Controllers\AuthController;

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

Route::prefix('auth')->group(function(){
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/refresh', [AuthController::class, 'refresh']);
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('restaurantes')->group(function () {
        Route::get('/', [RestauranteController::class, 'index']);
        Route::get('/{id}', [RestauranteController::class, 'show']);
        Route::prefix('cardapios')->group(function () {
            Route::get('/', [CardapioController::class, 'index']);
            Route::get('/{id}', [CardapioController::class, 'show']);
        });
    });
});
