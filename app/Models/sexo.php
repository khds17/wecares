<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sexo extends Model
{
    public $timestamps = false;
    protected $table='SEXOS';
    protected $fillable=['ID','SEXO'];

    // Criando relacionamento entre as tabelas sexo e prestadores
    public function relPrestadores(){
        return $this->hasOne('App\Models\prestadores', 'ID_SEXO');
    }
}
