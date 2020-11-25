<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class antecedentes extends Model
{
    public $timestamps = false;
    protected $table='ANTECEDENTES';
    protected $fillable=['ANTECEDENTE'];

    // Criando relacionamento entre as tabelas antecedentes e prestadores 
    public function relPrestadores(){
        return $this->hasOne('App\Models\prestadores', 'ID_ANTECEDENTE');
    }
}
