<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class solicitantes extends Model
{
    public $timestamps = false;
    protected $table='SOLICITANTES';
    protected $fillable=['NOME','CPF','EMAIL','TELEFONE','ID_USUARIO','ID_ENDERECO','ID_FAMILIARIDADE','FAMILIAR_OUTROS','STATUS'];

        // Criando relacionamento entre as tabelas solicitantes e enderecos
        public function relEndereco(){
            return $this->hasOne('App\Models\enderecos', 'ID','ID_ENDERECO');
        }

        // Criando relacionamento entre as tabelas solicitantes e users
        public function relUsuario(){
            return $this->hasOne('App\Models\users', 'ID','ID_USUARIO');
        }

}

