<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpresaconvenioController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\CampanaController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Translation\Catalogue\TargetOperation;

Route::get('empresas/empresapdf', [App\Http\Controllers\EmpresaController::class,'empresapdf'])->name('empresas.empresapdf');

//Route::resource('/')->names('dashboard')->middleware('auth');
Route::resource('empresas', EmpresaController::class)->names('empresa')->middleware('auth');
Route::resource('convenios', ConvenioController::class)->names('convenio')->middleware('auth');
Route::resource('sucursals', SucursalController::class)->names('sucursal')->middleware('auth');
Route::resource('clientes', ClienteController::class)->names('cliente')->middleware('auth');
Route::resource('tarjetas', TarjetaController::class)->names('tarjeta')->middleware('auth');
Route::resource('lugars', LugarController::class)->names('lugar')->middleware('auth');
Route::resource('users', UserController::class)->names('user')->middleware('auth');
Route::resource('roles', RolController::class)->names('rol')->middleware('auth');
Route::resource('permisos', PermisoController::class)->names('permiso')->middleware('auth');
Route::resource('campanas', CampanaController::class)->names('campana')->middleware('auth');
//Route::resource('empresaconvenios', EmpresaconvenioController::class)->names('empresaconvenio')->middleware('auth');
Route::delete('/cliente/{client}', [ClienteController::class,'destroy'])->name('cliente.destroy');
//Route::get('StatusNoticia/{client}', [ClienteController::class,'UpdateStatusNoti'])->name('cliente.UpdateStatusNoti');



