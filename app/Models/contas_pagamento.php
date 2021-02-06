<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contas_pagamento extends Model
{
    public $timestamps = false;
    protected $table='CONTA_PAGAMENTOS';
    protected $fillable=['AGENCIA','CONTA','TIPO_CONTA','STATUS','ID_BANCO','ID_PRESTADOR'];
}
