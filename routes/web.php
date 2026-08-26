<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurismoController;

// 1. Ruta para el catálogo principal (Lista de lugares)
Route::get('/', [TurismoController::class, 'index'])->name('lugares.index');

// 2. Ruta para el detalle de un lugar específico
Route::get('/lugar/{id}', [TurismoController::class, 'show'])->name('lugares.show');

// 3. Ruta POST para procesar el formulario de contacto
Route::post('/contacto', [TurismoController::class, 'contacto'])->name('contacto.send');