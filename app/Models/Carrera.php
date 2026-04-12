<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

    protected $fillable = ['nombre'];
}
