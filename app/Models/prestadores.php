<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prestadores extends Model
{
    public $timestamps = false;
    protected $table='PRESTADORES';
    protected $fillable=[''];

    // Criando relacionamento entre as tabelas prestadores e enderecos
    public function relEndereco(){
        return $this->hasOne('App\Models\enderecos', 'ID','ID_ENDERECO');
    }
}
