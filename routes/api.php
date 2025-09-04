<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProyectoController;

// públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// protegidas con JWT (auth:api)
Route::middleware('auth:api')->group(function () {
    //Route::get('/proyectos',       [ProyectoController::class, 'index']);// Se lista todos los proyectos con respuesta 200
    //Route::get('/proyectos/{id}',  [ProyectoController::class, 'show']);// Muestra Proyecto por ID con respuesta 200 - 404
    //Route::post('/proyectos',      [ProyectoController::class, 'guardar']);// Para nuevo proyecto con validaciones y respuesta 201
    //Route::match(['put', 'patch'], '/proyectos/{id}', [ProyectoController::class, 'actualizar']);// Actualiza un proyecto existente con respuesta 200 - 404
    //Route::delete('/proyectos/{id}', [ProyectoController::class, 'eliminar']);// Elimina proyecto por ID con respuesta 204 - 404

    Route::apiResource('proyectos', ProyectoController::class)->only(['index','show','store','update','destroy']);
});