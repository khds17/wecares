<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosPrestadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SERVICOS_PRESTADOS', function (Blueprint $table) {
            $table->increments('ID');
            $table->unsignedInteger('ID_PROPOSTA');
            $table->unsignedInteger('ID_PRESTADOR');
            $table->string('NOME_PRESTADOR',255);
            $table->unsignedInteger('ID_SOLICITANTE');
            $table->string('NOME_SOLICITANTE',255);
            $table->unsignedInteger('ID_FAMILIARIDADE');
            $table->string('OUTROS_FAMILIARIDADE',100)->nullable();
            $table->unsignedInteger('ID_PACIENTE');
            $table->string('NOME_PACIENTE',255);
            $table->string('TIPO', 25);
            $table->string('LOCALIZACAO', 25);
            $table->string('CEP',13);
            $table->string('ENDERECO',255);
            $table->integer('NUMERO');
            $table->string('COMPLEMENTO',255)->nullable();
            $table->string('BAIRRO',50);
            $table->string('CIDADE',50);
            $table->string('UF',2);
            $table->string('SERVICOS');
            $table->string('SERVICOS_OUTROS', 255)->nullable();
            $table->unsignedSmallInteger('TOMA_MEDICAMENTOS');
            $table->string('TIPO_MEDICAMENTOS')->nullable();
            $table->date('DATA_SERVICO');
            $table->time('HORA_INICIO',0);
            $table->time('HORA_FIM',0);
            $table->float('VALOR',8,2);
            $table->unsignedSmallInteger('STATUS_SERVICO');
            $table->string('STATUS_APROVACAO',20)->nullable();
            $table->foreign('ID_PROPOSTA')->references('ID')->on('PROPOSTAS')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADORES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_SOLICITANTE')->references('ID')->on('SOLICITANTES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_PACIENTE')->references('ID')->on('PACIENTES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_FAMILIARIDADE')->references('ID')->on('FAMILIARIDADES')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SERVICOS_PRESTADOS');
    }
}
