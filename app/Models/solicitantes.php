<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class solicitantes extends Model
{
    public $timestamps = false;
    protected $table='SOLICITANTES';
    protected $fillable=['NOME','CPF','EMAIL','TELEFONE','SENHA','ID_ENDERECO','TIPO_FAMILIAR','TIPO_FAMILIAR_OUTROS','STATUS'];

    // public $timestamps = false;
    // protected $table='SOLICITANTE';
    // protected $fillable=[''];
}

