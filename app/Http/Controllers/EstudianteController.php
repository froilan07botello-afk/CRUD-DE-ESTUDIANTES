<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Carrera;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all(); // creamos una variable y traermos los registros que hay en neustra BD
        return view('estudiantes.index', compact('estudiantes'));
    }
    public function create()
    {
        $carreras = Carrera::all(); 
        return view('estudiantes.create', compact('carreras')); 
    }

    public function store(Request $request)
    {
        Estudiante::create($request->all());
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado correctamente');
    }
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $carreras = Carrera::all();
        return view('estudiantes.edit', compact('estudiante','carreras'));
    }   

    public function update(Request $request, $id)
    { 
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());
        return redirect()->route('estudiantes.index')
        ->with('success', 'Estudiante actualizado correctamente');
    }

    public function delete($id)
    {
        
    }
}
