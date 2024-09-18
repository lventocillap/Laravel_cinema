<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailSaleController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\Authentication;
use App\Http\Middleware\DateMovieMiddleware;
use App\Http\Middleware\MovieMiddlware;
use App\Http\Middleware\SaleUserMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'prefix' => 'movies',
    'controller' => MovieController::class,
], static function (){
    Route::get('/','index');
    Route::get('/{movie}', 'show');
    Route::post('/', 'store');
    Route::patch('/{movie}', 'update');
    Route::delete('/{movie}', 'delete');
});

Route::group([
    'prefix' => 'login',
    'controller' => AuthController::class,
], static function(){
    Route::post('/', 'login')->withoutMiddleware(Authentication::class);
});

Route::group([
    'prefix' => 'sale',
    'controller' => DetailSaleController::class,
], static function(){
    Route::post('/', 'store');
});