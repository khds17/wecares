<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certificados extends Model
{
    public $timestamps = false;
    protected $table='CERTIFICADOS';
    protected $fillable=['CERTIFICADO'];
}
