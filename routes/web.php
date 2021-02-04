<?php

use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Music\MusicAuthenticateController;
use App\Http\Controllers\Music\MusicController;
use App\Http\Controllers\Music\MusicGetRecentTracksController;
use App\Http\Controllers\Music\MusicLibraryController;
use App\Http\Controllers\Music\MusicRequestAccessTokenController;
use App\Http\Controllers\Music\MusicWeeklyReportController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\JournalEntryController;

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
Route::get('/music/library', [MusicLibraryController::class, 'index'])->name('music.library');

Route::get('/music/reports/weekly', [MusicWeeklyReportController::class, 'index'])->name('reports.weekly');

/**
 * Track routes
 */
Route::get('/tracks/{id}', [TrackController::class, 'index'])->name('track');

/**
 * Artist Routes
 */
Route::get('/artists/{id}', [ArtistController::class, 'index'])->name('artist');

/**
 * Journal Routes
 */
Route::get('/journals', [JournalController::class, 'overview'])->name('journals.overview');
Route::get('/journals/create', [JournalController::class, 'create'])->name('journals.create');
Route::post('/journals/create', [JournalController::class, 'store']);
Route::get('/journals/edit/{id}', [JournalController::class, 'edit'])->name('journals.edit');
Route::post('/journals/edit/{id}', [JournalController::class, 'update']);
Route::get('/journals/{id}', [JournalController::class, 'index'])->name('journal');

/**
 * Journal Entry routes
 */
Route::get('/journals/{id}/create-entry', [JournalEntryController::class, 'create'])->name('journals.entries.create');
Route::post('/journals/{id}/create-entry', [JournalEntryController::class, 'store']);

require __DIR__.'/auth.php';
