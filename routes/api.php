<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProyectoController;

// públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// protegidas con JWT (auth:api)
Route::middleware('auth:api')->group(function () {
    Route::get('/proyectos',       [ProyectoController::class, 'index']);
    Route::get('/proyectos/{id}',  [ProyectoController::class, 'show']);
    Route::post('/proyectos',      [ProyectoController::class, 'guardar']);
    Route::post('/proyectos/{id}', [ProyectoController::class, 'actualizar']);
});