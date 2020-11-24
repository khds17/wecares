<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class familiaridade extends Model
{
    public $timestamps = false;
    protected $table='FAMILIARIDADES';
    protected $fillable=['ID','FAMILIARIDADE'];

    // Criando relacionamento entre as tabelas familiaridade e pacientes
    public function relSolicitantePaciente(){
        return $this->hasMany('App\Models\paciente', 'ID_FAMILIARIDADE');
    }

}
