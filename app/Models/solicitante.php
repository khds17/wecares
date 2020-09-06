<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class solicitante extends Model
{
    public $timestamps = false;
    protected $table='solicitante';
    protected $fillable=['nome','email','cep','endereco','numero','cidade','bairro','complemento','estado','nivelfamiliaridade','nivelfamiliaridadeoutros','status'];

    // public $timestamps = false;
    // protected $table='SOLICITANTE';
    // protected $fillable=[''];
}

}
