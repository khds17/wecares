<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cartoes extends Model
{
    public $timestamps = false;
    protected $table='BANDEIRAS';
    protected $fillable=['ID_CUSTOMER','ID_CARTAO','INICIO_CARTAO','FIM_CARTAO','MES_VENCIMENTO','ANO_VENCIMENTO','CVV','BANDEIRA','STATUS'];
}