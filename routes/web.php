<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreSeedsController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\RecomendationController;
use App\Http\Controllers\ResultContrller;

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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/', RecomendationController::class, [
        'names' => [
            'create' => 'recomendation.create',
            'store'  => 'recomendation.store',
        ]
    ]);

    Route::group(['prefix' => 'playlist'], function() {
        Route::resource('/', PlaylistController::class, [
            'names' => [
                'create' => 'playlist.create',
                'store'  => 'playlist.store',
            ]
        ]);
    });

    Route::group(['prefix' => 'result'], function() {
        Route::resource('/', ResultContrller::class);
    });


    Route::group(['prefix' => 'genre'], function() {
        Route::resource('/', GenreSeedsController::class);
    });
});
