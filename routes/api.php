<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailSaleController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\Authentication;
use App\Http\Middleware\DateMovieMiddleware;
use App\Http\Middleware\MovieAthentication;
use App\Http\Middleware\MovieMiddlware;
use App\Http\Middleware\SaleUserMiddleware;
use App\Http\Middleware\SeatSaleAuthentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\DetailSale\Infrastructure\Controller\DetailSaleController as SrcDetailSaleController;
use Src\Movie\Infrastructure\Controller\MovieController as SrcMovieController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::group([
//     'prefix' => 'movies',
//     'controller' => MovieController::class,
// ], static function (){
//     Route::get('/','index');
//     Route::get('/{movie}', 'show');
//     Route::post('/', 'store');
//     Route::patch('/{movie}', 'update');
//     Route::delete('/{movie}', 'delete');
// });
Route::group([
    'prefix' => 'movies',
    'controller' => SrcMovieController::class,
], static function (){
    Route::get('/','index');
    Route::get('/{id}','show');
    Route::post('/','store');
});
Route::group([
    'prefix' => 'login',
    'controller' => AuthController::class,
], static function(){
    Route::post('/', 'login')->withoutMiddleware(Authentication::class);
});
Route::group([
    'prefix' => 'sale',
    'controller' => SrcDetailSaleController::class,
], static function(){
    Route::post('/', 'newDetailSale')->middleware([MovieAthentication::class,SeatSaleAuthentication::class]);
});
Route::group([
    'prefix' => 'image',
    'controller' => ImageController::class,
], static function(){
    Route::post('/movie/{movie}','storeImageMovie');
    Route::post('/user/{user}','storeImageUser');
    Route::get('/movie/{movie}','getImageMovie');
    Route::get('/user/{user}','getImageUser');
});
