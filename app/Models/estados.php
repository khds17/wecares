<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estados extends Model
{
    public $timestamps = false;
    protected $table = 'ESTADOS';
    protected $fillable = [
        'ESTADO',
        'UF'
    ];

    // Relacionamento entre as tabelas enderecos e cidades
    public function relCidade(){
        return $this->hasMany('App\Models\cidades','ID_CIDADE');
    }
}
