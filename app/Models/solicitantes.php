<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class solicitantes extends Model
{
    public $timestamps = false;
    protected $table='SOLICITANTES';
    protected $fillable=['NOME','CPF','EMAIL','TELEFONE','ID_USUARIO','ID_ENDERECO','ID_FOTO'];

        // Criando relacionamento entre as tabelas solicitantes e enderecos
        public function relEndereco(){
            return $this->hasOne('App\Models\enderecos', 'ID','ID_ENDERECO');
        }

        // Criando relacionamento entre as tabelas solicitantes e users
        public function relUsuario(){
            return $this->hasOne('App\Models\user', 'ID','ID_USUARIO');
        }

        // Criando relacionamento entre as tabelas solicitantes e pacientes
        public function relPaciente(){
            return $this->hasMany('App\Models\pacientes', 'ID_SOLICITANTE');
        }     

        // Criando relacionamento entre as tabelas prestadores e fotos
        public function relFotos(){
            return $this->hasOne('App\Models\foto', 'ID','ID_FOTO');
        }

}

