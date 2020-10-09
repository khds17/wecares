<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class enderecos extends Model
{
    public $timestamps = false;
    protected $table='ENDERECOS';
    protected $fillable=['CEP','ENDERECO','NUMERO','COMPLEMENTO','BAIRRO','ID_CIDADE','ID_ESTADO'];

        // Relacionamento entre as tabelas enderecos e prestadores
        public function relPrestador(){
            return $this->hasOne('App\Models\prestadores','ID_ENDERECO');
        }

        // Relacionamento entre as tabelas enderecos e cidades
        public function relCidade(){
            return $this->hasOne('App\Models\cidades','ID','ID_CIDADE');
        }

        // Relacionamento entre as tabelas enderecos e estados
        public function relEstado(){
            return $this->hasOne('App\Models\estados','ID','ID_ESTADO');
        }
}
