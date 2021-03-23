<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certificados extends Model
{
    public $timestamps = false;
    protected $table = 'CERTIFICADOS';
    protected $fillable = [
        'CERTIFICADO'
    ];

    // Relacionamento entre as tabelas certificados e prestadores
    public function relPrestador(){
        return $this->hasMany('App\Models\prestadores','ID_CERTIFICADO');
    }
}
