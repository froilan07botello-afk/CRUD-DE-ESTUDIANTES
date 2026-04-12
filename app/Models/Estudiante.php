<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    public function carrera()
    {
        return $this->belongsTo(carrera::class);
    }

    protected $fillable = 
    [
    'nombre',
    'correo',
    'carrera_id',
    'semestre'
    ];
}
