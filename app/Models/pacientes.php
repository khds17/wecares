<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    public $timestamps = false;
    protected $table='PACIENTES';
    protected $fillable=['NOME','TIPO','LOCALIZACAO','ID_ENDERECO','SERVICOS','TOMA_MEDICAMENTOS','TIPO_MEDICAMENTOS','STATUS','ID_SOLICITANTE'];
}
