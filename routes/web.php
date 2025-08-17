<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProyectoController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::middleware('jwt.web')->group(function(){
    // Muestra todos los proyectos. Punto 1
    Route::get('/proyectos', [ProyectoController::class, 'index']);

    // Muestra un solo proyecto por su ID. Punto 5
    Route::get('/proyectos/{id}', [ProyectoController::class, 'show']);

    // Formulario para agregar o crear un nuevo proyecto. Punto 2
    Route::get('/crear', [ProyectoController::class, 'crear']);

    // Formulario para editar o actualizar un proyecto. Punto 4
    Route::get('/editar/{id}', [ProyectoController::class, 'editar']);

    // Simula la eliminación de un proyecto. Punto 3
    Route::get('/eliminar/{id}', [ProyectoController::class, 'eliminar']);

    // Muestra el valor de la UF desde la API
    Route::get('/uf', [ProyectoController::class, 'uf']);

    // ------------- RUTAS POST ------------------ 

    // Ruta para guardar un nuevo proyecto
    Route::post('/guardar', [ProyectoController::class, 'guardar']);

    // Ruta para actualizar un proyecto por su ID
    Route::post('/actualizar/{id}', [ProyectoController::class, 'actualizar']); 
});
