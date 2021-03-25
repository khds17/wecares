<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propostas extends Model
{
    public $timestamps = false;
    protected $table = 'PROPOSTAS';
    protected $fillable = [
        'ID_PRESTADOR',
        'NOME_PRESTADOR',
        'ID_SOLICITANTE',
        'NOME_SOLICITANTE',
        'ID_FAMILIARIDADE',
        'OUTROS_FAMILIARIDADE',
        'ID_PACIENTE',
        'NOME_PACIENTE',
        'TIPO',
        'LOCALIZACAO',
        'CEP',
        'ENDERECO',
        'NUMERO',
        'COMPLEMENTO',
        'BAIRRO',
        'CIDADE',
        'UF',
        'SERVICOS',
        'SERVICOS_OUTROS',
        'TOMA_MEDICAMENTOS',
        'TIPO_MEDICAMENTOS',
        'DATA_SERVICO',
        'HORA_INICIO',
        'HORA_FIM',
        'APROVACAO_SOLICITANTE',
        'APROVACAO_PRESTADOR',
        'VALOR'
    ];
}
