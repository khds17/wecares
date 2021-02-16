<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    public $timestamps = false;
    protected $table='FOTOS';
    protected $fillable=['FOTO'];

    // Criando relacionamento entre as tabelas antecedentes e prestadores 
    public function relPrestadores(){
        return $this->hasOne('App\Models\prestadores', 'ID_FOTO');
    }

    // Relacionamento entre as tabelas users e solicitanteS
    public function relSolicitante(){
        return $this->hasOne('App\Models\solicitantes','ID_FOTO');
    }

}