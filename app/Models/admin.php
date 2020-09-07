<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    public $timestamps = false;
    protected $table='ADMIN';
    protected $fillable=['NOME','EMAIL', 'STATUS', 'SENHA', 'SENHA_CONFIRMACAO'];
}
