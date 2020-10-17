<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sexo extends Model
{
    public $timestamps = false;
    protected $table='SEXOS';
    protected $fillable=['ID','SEXO'];
}
