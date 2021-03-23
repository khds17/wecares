<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cidades extends Model
{
    public $timestamps = false;
    protected $table = 'CIDADES';
    protected $fillable = [
        'CIDADE',
        'UF'
    ];


        // Relacionamento entre as tabelas cidades e enderecos
        public function relEndereco(){
            return $this->hasMany('App\Models\enderecos','ID_CIDADE');
        }

        // Relacionamento entre as tabelas cidades e estados 
        public function relEstado(){
            return $this->hasOne('App\Models\estados','ID','ID_ESTADO');
        }
}
