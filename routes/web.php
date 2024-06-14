<?php

use App\Http\Controllers\PlayerController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/crear-equipo', function () {
    return view('crear_equipo_vue');
});

Route::post('/equipos', [TeamController::class, 'store']);


Route::get('/ligas', function () {
    return view('ligas');
});


Route::get('/crear-jugador', function () {
    return view('crear_jugador');
});

Route::post('/jugador', [PlayerController::class, 'store']);
