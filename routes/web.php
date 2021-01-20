<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Music\MusicAuthenticateController;
use App\Http\Controllers\Music\MusicController;
use App\Http\Controllers\Music\MusicGetRecentTracksController;
use App\Http\Controllers\Music\MusicRequestAccessTokenController;
use App\Http\Controllers\WeatherController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * Weather routes 
 */
Route::get('/weather', [WeatherController::class, 'index'])->name('weather');
Route::get('/weather/update', [WeatherController::class, 'update'])->name('weather.update');

/**
 * Music Routes
 */
Route::get('/music', [MusicController::class, 'index'])->name('music');
Route::get('/music/authenticate', [MusicAuthenticateController::class, 'index'])->name('music.authenticate');
Route::get('/music/request-access-token', [MusicRequestAccessTokenController::class, 'store'])->name('music.request');
Route::get('/music/get-recent-tracks', [MusicGetRecentTracksController::class, 'create'])->name('music.recent');

require __DIR__.'/auth.php';
