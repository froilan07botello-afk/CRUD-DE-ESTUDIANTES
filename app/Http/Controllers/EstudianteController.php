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
        $estudiantes = Estudiante::with('carrera')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }   
    public function create()
    {
        $carreras = Carrera::all(); 
        return view('estudiantes.create', compact('carreras')); 
    }

    public function store(Request $request)
    {
    $request->validate([
        'nombre' => 'required|min:3',
        'correo' => 'required|email|unique:estudiantes,correo',
        'carrera_id' => 'required',
        'semestre' => 'required|integer|min:1|max:12',
    ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')
        ->with('success', 'Estudiante creado correctamente');
    }
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $carreras = Carrera::all();
        return view('estudiantes.edit', compact('estudiante','carreras'));
    }   

    public function update(Request $request, $id)
    {
        $request->validate([
        'nombre' => 'required|min:3',
        'correo' => 'required|email|unique:estudiantes,correo,' . $id,
        'carrera_id' => 'required',
        'semestre' => 'required|integer|min:1|max:12',
        ]);

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')
        ->with('success', 'Actualizado correctamente');
}

    public function delete($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        return redirect()->route('estudiantes.index')
        ->with('success', 'Estudiante eliminado correctamente');
    }
}
