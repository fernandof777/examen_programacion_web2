<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;

Route::get('/', function () {
    return view('welcome');
});

// Módulo Vehículos - CRUD completo
Route::resource('vehiculos', VehiculoController::class);
