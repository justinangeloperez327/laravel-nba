<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TeamController::class, 'index']);


Route::get('fetch-rosters', [RosterController::class, 'fetchRosters']);
Route::get('/exports', [ExportController::class, 'index']);
Route::post('/exports', [RosterController::class, 'export']);
Route::get('/export-roster', [RosterController::class, 'export']);
Route::post('/export-roster', [RosterController::class, 'export']);
Route::get('/export-player', [RosterController::class, 'exportPlayer']);
Route::get('/export-player', [RosterController::class, 'exportPlayer']);
Route::resource('teams', TeamController::class);
Route::resource('rosters', RosterController::class);
