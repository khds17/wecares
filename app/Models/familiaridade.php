<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class familiaridade extends Model
{
    public $timestamps = false;
    protected $table='FAMILIARIDADES';
    protected $fillable=['ID','FAMILIARIDADE'];

}
