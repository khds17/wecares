<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    public $timestamps = false;
    protected $table='PACIENTES';
    protected $fillable=['NOME','ID_TIPO','ID_LOCALIZACAO','ID_ENDERECO','TOMA_MEDICAMENTOS','TIPO_MEDICAMENTOS','STATUS','ID_SOLICITANTE'];


    // Criando relacionamento entre as tabelas solicitantes e pacientes
    public function relSolicitante(){
        return $this->hasOne('App\Models\solicitantes', 'ID', 'ID_SOLICITANTE');
    }

}
