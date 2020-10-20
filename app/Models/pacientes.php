<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    public $timestamps = false;
    protected $table='PACIENTES';
    protected $fillable=['NOME','ID_TIPO','ID_LOCALIZACAO','ID_ENDERECO','TOMA_MEDICAMENTOS','TIPO_MEDICAMENTOS','STATUS','ID_SOLICITANTE'];
}
