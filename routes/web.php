<?php
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CarreraController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('estudiantes.index');
});
//rutas que para estudiantes

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
//esta ruta la utilizo para eliminar 
Route::delete('/estudiantes/{id}', [EstudianteController::class, 'delete'])->name('estudiantes.delete');

//rutas para carreras

//esta ruta la utilizo para la vista principal donde listo
Route::get('/carreras', [CarreraController::class, 'index'])->name('carreras.index');
//esta vista la utilizo para la vista de crear
Route::get('/carreras/crear', [CarreraController::class, 'create'])->name('carreras.create');
//esta vista la utilozo para la vista store
Route::post('/carreras', [CarreraController::class, 'store'])->name('carreras.store');
//esta vista la utilozo para la vista editar
Route::get('/carreras/{id}/editar', [CarreraController::class, 'edit'])->name('carreras.edit');
//esta vista la utilozo para la vista actualizar
Route::put('/carreras/{id}', [CarreraController::class, 'update'])->name('carreras.update');
//esta vista la utilozo para la vista borrar
 Route::delete('/carreras/{id}', [CarreraController::class, 'delete'])->name('carreras.delete');