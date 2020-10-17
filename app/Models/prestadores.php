<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prestadores extends Model
{
    public $timestamps = false;
    protected $table='PRESTADORES';
    //
    protected $fillable=['NOME','CPF','TELEFONE','DT_NASCIMENTO','SEXO','EMAIL','SENHA','ID_ENDERECO','FORMACAO','ID_CERTIFICADO','ID_ANTECEDENTE','STATUS','ID_ACESSO'];

    // Criando relacionamento entre as tabelas prestadores e enderecos
    public function relEndereco(){
        return $this->hasOne('App\Models\enderecos', 'ID','ID_ENDERECO');
    }
}
