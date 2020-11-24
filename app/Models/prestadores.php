<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prestadores extends Model
{
    public $timestamps = false;
    protected $table='PRESTADORES';
    protected $fillable=['NOME','CPF','TELEFONE','DT_NASCIMENTO','ID_SEXO','EMAIL','ID_USUARIO','ID_ENDERECO','ID_FORMACAO','ID_CERTIFICADO','ID_ANTECEDENTE'];

    // Criando relacionamento entre as tabelas prestadores e sexo
    public function relSexo(){
        return $this->hasOne('App\Models\sexo', 'ID','ID_SEXO');
    }

    // Criando relacionamento entre as tabelas solicitantes e users
    public function relUsuario(){
        return $this->hasOne('App\Models\user', 'ID','ID_USUARIO');
    }

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

    // Criando relacionamento entre as tabelas prestadores e antecedentes
    public function relAntecedentes(){
        return $this->hasMany('App\Models\antecedentes', 'ID','ID_ANTECEDENTE');
    }

}
