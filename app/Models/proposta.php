<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class proposta extends Model
{
    public $timestamps = false;
    protected $table='PROPOSTAS';
    protected $fillable=['ID_PRESTADOR','ID_SOLICITANTE','NOME','TIPO','LOCALIZACAO','ID_ENDERECO','ID_SERVICOS','SERVICOS_OUTROS','MEDICAMENTOS','TIPO_MEDICAMENTOS','DATA_SERVICO','HORA_INICIO','HORA_FIM','APROVACAO_SOLICITANTE','APROVACAO_PRESTADOR','VALOR'];
}
