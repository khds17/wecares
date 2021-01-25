<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class registros_log extends Model
{
    public $timestamps = false;
    protected $table='REGISTROS_LOG';
    protected $fillable=['ID','DATA','TEXTO','ID_USUARIO'];
}
