<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class servicos extends Model
{
    public $timestamps = false;
    protected $table='SERVICOS';
    protected $fillable=['ID','TIPO'];
}
