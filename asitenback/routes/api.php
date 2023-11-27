<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\GeneracionController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\UniinsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("v1/users",UserController::class);

Route::apiResource("v1/usuarios",UsuarioController::class);

Route::apiResource("v1/carreras",CarreraController::class);

Route::apiResource("v1/uniins",UniinsController::class);

Route::apiResource("v1/generacions",GeneracionController::class);

Route::apiResource("v1/tarjetas",TarjetaController::class);

Route::apiResource("v1/tipousuarios",TipoUsuarioController::class);

Route::apiResource("v1/areas",AreaController::class);

Route::apiResource("v1/estudiantes",EstudianteController::class);

Route::post("v1/usuarios/login", [UsuarioController::class, 'login']);
