<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    //
    protected $fillable = [
        'nombreEvento', 'fechaEvento', 'horaEvento','lugarEvento','costoEvento','descripcion'
    ];

}
