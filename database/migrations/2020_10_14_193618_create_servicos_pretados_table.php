<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosPretadosTable extends Migration
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
            $table->unsignedInteger('ID_PRESTADOR');
            $table->unsignedInteger('ID_SOLICITANTE');
            $table->unsignedInteger('ID_PACIENTE');
            $table->string('NOME',255);
            $table->string('TIPO', 25);
            $table->string('LOCALIZACAO', 25);
            $table->unsignedInteger('ID_ENDERECO');
            $table->string('SERVICOS', 255);
            $table->unsignedInteger('MEDICAMENTOS');
            $table->string('TIPO_MEDICAMENTOS');
            $table->date('DATA_SERVICO');
            $table->time('HORA_INICIO',0);
            $table->time('HORA_FIM',0);
            $table->unsignedSmallInteger('STATUS');
            $table->float('VALOR',8,2);
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADORES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_SOLICITANTE')->references('ID')->on('SOLICITANTES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_PACIENTE')->references('ID')->on('PACIENTES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_ENDERECO')->references('ID')->on('ENDERECOS')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos_pretados');
    }
}
