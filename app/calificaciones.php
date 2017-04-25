<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calificaciones extends Model
{
    //
    protected $fillable = [
        'visto', 'materias','idAlumno',
    ];
}
