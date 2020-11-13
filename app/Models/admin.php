<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    public $timestamps = false;
    protected $table='ADMIN';
    protected $fillable=['NOME','EMAIL','SENHA','ID_USUARIO','STATUS'];

    // Criando relacionamento entre as tabelas admin e users
    public function relUsuario(){
        return $this->hasOne('App\Models\user', 'ID','ID_USUARIO');
    }
}
