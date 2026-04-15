<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//este modelo nos sirve para poder hacer las consultas necesarias para nuestras vistas
class Carrera extends Model
{
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class); //indica la relacion que tiene, para poder hacer consultas de manera sencilla
    }

    protected $fillable = ['nombre']; //nos indica el atributo al que tenemos acceso de esa tabla
}
