<?php
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CarreraController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//esta ruta es utilizada para listar 
Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');

//esta ruta es utilizada crear  
Route::get('/estudiantes/crear', [EstudianteController::class, 'create'])->name('estudiantes.create');

// esta ruta es utilizada para guardar
Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('estudiantes.store');

// esta ruta es utilzada para edita
Route::get('/estudiantes/{id}/editar', [EstudianteController::class, 'edit'])->name('estudiantes.edit');

// esta ruta la utilizo para actualizar
Route::put('/estudiantes/{id}', [EstudianteController::class, 'update'])->name('estudiantes.update');

// esta ruta la utilizo para eliminar
Route::delete('/estudiantes/{id}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
