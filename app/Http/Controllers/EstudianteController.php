<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Carrera;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    //funcion que hace consulta a la BD y la manda para mostrarla en la vista
  public function index()
    {
        $estudiantes = Estudiante::with('carrera')->get(); //saca a todos los estudiantes que estan en una carrera
        return view('estudiantes.index', compact('estudiantes'));
    }   
    //funcion create 
    public function create()
    {
        
        $carreras = Carrera::all(); //es un selec a mi BD
        return view('estudiantes.create', compact('carreras')); 
    }

    public function store(Request $request)
    {
        //validamos datos del formulario y personalizamos los mensajes que apareceran en caso de que falte algun dato
    $request->validate([
        'nombre' => 'required|min:3',
        'correo' => 'required|email|unique:estudiantes,correo',
        'carrera_id' => 'required',
        'semestre' => 'required|integer|min:1|max:12',
        ],
        [
            'nombre.required'=>'Debes ingresar el nombre.',
            'correo.required'=>'Debes ingreasar el correo.',
            'semestre'=>'Debes ingrear el semeste.'
        ]);

        Estudiante::create($request->all());
        //redireccionamos a la vista, con  un mensaje de exito
        return redirect()->route('estudiantes.index')
        ->with('success', 'Estudiante creado correctamente');
    }
    //funcion para editar
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id); //buscamos el estudiante mediante su id
        $carreras = Carrera::all(); //traemos las carreras que tenemos en la tabla de la BD
        return view('estudiantes.edit', compact('estudiante','carreras'));
    }   

    public function update(Request $request, $id)
    {
        //validamos campos y personalizmos mensajes de error
        $request->validate([
        'nombre' => 'required|min:3',
        'correo' => 'required|email|unique:estudiantes,correo,' . $id,
        'carrera_id' => 'required',
        'semestre' => 'required|integer|min:1|max:12',
        ],
        [
            'nombre.required'=>'Debes ingresar el nombre.',
            'correo.required'=>'Debes ingreasar el correo.',
            'semestre'=>'Debes ingrear el semeste.'
        ]);
        //buscamos al estudiante por su id, para modificarlo
        $estudiante = Estudiante::findOrFail($id); 
        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')
        ->with('success', 'Actualizado correctamente');
}

    public function delete($id)
    {
        //buscamos al estudiante por su id, eliminamos y mandamos mensaje de exito
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        return redirect()->route('estudiantes.index')
        ->with('success', 'Estudiante eliminado correctamente');
    }
}
