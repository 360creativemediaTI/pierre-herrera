<?php

use App\Http\Controllers\LeagueController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/ligas', [LeagueController::class, 'index']);

Route::get('/ligas/{idLiga}/equipos', [TeamController::class, 'equiposDeLiga']);


Route::get('/equipos', [TeamController::class, 'index']);
