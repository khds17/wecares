<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pagamentos extends Model
{
    public $timestamps = false;
    protected $table = 'PAGAMENTOS';
    protected $fillable = [
        'ID_PAGAMENTO',
        'ID_SERVICO_PRESTADO',
        'ID_CARTAO',
        'STATUS',
        'DT_CRIACAO',
        'DT_APROVACAO'
    ];
}
