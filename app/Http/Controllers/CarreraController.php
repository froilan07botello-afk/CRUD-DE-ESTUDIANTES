<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    //aqui solo consultamos las carreras para poder mostrar los datos en la lista
    public function index()
    {
        $carreras = Carrera::all();
        return view('carreras.index', compact('carreras'));
    }
    // nos sirve par crear nuevas carreras
    public function create()
    {
        return view('carreras.create');
    }
    //nos sirve para guardar carrereras
    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required|min:3|unique:carreras,nombre'
        ]);

        Carrera::create($request->all());

        return redirect()->route('carreras.index')
        ->with('success', 'Carrera creada correctamente');
    }
    // nos sirve para poder editar carreras
    public function edit($id)
    {
        $carrera = Carrera::findOrFail($id);
        return view('carreras.edit', compact('carrera'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'nombre' => 'required|min:3|unique:carreras,nombre,' . $id
        ]);

        $carrera = Carrera::findOrFail($id);
        $carrera->update($request->all());

        return redirect()->route('carreras.index')
        ->with('success', 'Carrera actualizada');
    }

    public function delete ($id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->delete();

        return redirect()->route('carreras.index')
            ->with('success', 'Carrera eliminada');
    }
}
