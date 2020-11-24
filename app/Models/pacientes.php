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

    // Criando relacionamento entre as tabelas prestadores e enderecos
    public function relEndereco(){
        return $this->hasOne('App\Models\enderecos', 'ID','ID_ENDERECO');
    }

    // Criando relacionamento entre as tabelas pacientes e familiaridade
    public function relFamiliaridade(){
        return $this->hasOne('App\Models\familiaridade', 'ID','ID_FAMILIARIDADE');
    }
}
