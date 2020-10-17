<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formacao extends Model
{
    public $timestamps = false;
    protected $table='FORMACAO';
    protected $fillable=['ID','FORMACAO'];
}
