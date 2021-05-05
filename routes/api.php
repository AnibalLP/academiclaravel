<?php

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
Route::resource('alumnos',App\Http\Controllers\AlumnosController::class)->only(['index','store','show','update','destroy']);
Route::resource('docentes',App\Http\Controllers\DocentesController::class)->only(['index','store','show','update','destroy']);
Route::resource('materias',App\Http\Controllers\MateriasController::class)->only(['index','store','show','update','destroy']);
