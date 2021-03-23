<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paciente_tipo extends Model
{
    public $timestamps = false;
    protected $table = 'PACIENTES_TIPOS';
    protected $fillable = [
        'TIPO'
    ];

}
