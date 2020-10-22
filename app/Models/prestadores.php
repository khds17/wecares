<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prestadores extends Model
{
    public $timestamps = false;
    protected $table='PRESTADORES';
    protected $fillable=['NOME','CPF','TELEFONE','DT_NASCIMENTO','ID_SEXO','EMAIL','SENHA','ID_ENDERECO','ID_FORMACAO','ID_CERTIFICADO','ID_ANTECEDENTE','STATUS'];

    // Criando relacionamento entre as tabelas prestadores e enderecos
    public function relEndereco(){
        return $this->hasOne('App\Models\enderecos', 'ID','ID_ENDERECO');
    }

    // Criando relacionamento entre as tabelas prestadores e formacao
    public function relFormacao(){
        return $this->hasMany('App\Models\formacao', 'ID','ID_FORMACAO');
    }

    // Criando relacionamento entre as tabelas prestadores e certificados
    public function relCertificado(){
        return $this->hasMany('App\Models\certificados', 'ID','ID_CERTIFICADO');
    }
}
