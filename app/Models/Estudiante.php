<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//modelo que nos sirve para poder hacer consultas de manera sencilla
class Estudiante extends Model
{
    //la funcion nos indica la relacion que tiene
    public function carrera() 
    {
        return $this->belongsTo(Carrera::class);
    }
    //nos indica los campos a los que tenemos acceso para consultar
    protected $fillable = 
    [
    'nombre',
    'correo',
    'carrera_id',
    'semestre'
    ];
}
