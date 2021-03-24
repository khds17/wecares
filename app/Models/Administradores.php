<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administradores extends Model
{
    public $timestamps = false;
    protected $table = 'ADMINISTRADORES';
    protected $fillable = [
        'NOME',
        'CPF',
        'EMAIL',
        'TELEFONE',
        'ID_USUARIO',
        'ID_ENDERECO'
    ];

    // Criando relacionamento entre as tabelas admin e users
    public function relUsuario(){
        return $this->hasOne('App\Models\User', 'ID','ID_USUARIO');
    }
}
