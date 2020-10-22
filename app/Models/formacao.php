<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formacao extends Model
{
    public $timestamps = false;
    protected $table='FORMACAO';
    protected $fillable=['ID','FORMACAO'];

    // Relacionamento entre as tabelas formacao e prestadores
    public function relPrestador(){
        return $this->hasMany('App\Models\prestadores','ID_FORMACAO');
    }
}
