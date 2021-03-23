<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class conta_recebimento extends Model
{
    public $timestamps = false;
    protected $table = 'CONTA_RECEBIMENTO';
    protected $fillable = [
        'AGENCIA',
        'CONTA',
        'TIPO_CONTA',
        'PRINCIPAL',
        'STATUS',
        'ID_BANCO',
        'ID_PRESTADOR'
    ];
}
