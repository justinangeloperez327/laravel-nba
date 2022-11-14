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

Route::resource('teams', TeamController::class);
Route::resource('rosters', RosterController::class);
Route::get('fetch-rosters', [RosterController::class, 'fetchRosters']);
Route::get('/exports', [ExportController::class, 'index']);
Route::post('/exports', [ExportController::class, 'export']);

