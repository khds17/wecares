<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paciente_localizacao extends Model
{
    public $timestamps = false;
    protected $table='PACIENTE_LOCALIZACAO';
    protected $fillable=['ID','LOCALIZACAO'];
}
