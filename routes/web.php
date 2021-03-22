<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyTopController;
use App\Http\Controllers\GenreSeedsController;
use App\Http\Controllers\PlaylistController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'search'], function() {
//     Route::resource('myTop', MyTopController::class);
// });

Route::group(['prefix' => 'result'], function() {
    Route::resource('/', ResultContrller::class);
});

Route::group(['prefix' => 'playlist'], function() {
    Route::resource('/', PlaylistController::class);
});

Route::group(['prefix' => 'genre'], function() {
    Route::resource('/', GenreSeedsController::class);
});
