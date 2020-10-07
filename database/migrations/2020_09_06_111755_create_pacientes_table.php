<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PACIENTES', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('NOME',255);
            $table->string('TIPO', 25);
            $table->string('LOCALIZACAO', 25);
            $table->unsignedInteger('ID_ENDERECO');
            $table->string('SERVICOS', 255);
            $table->unsignedInteger('MEDICAMENTOS');
            $table->string('TIPO_MEDICAMENTOS');
            $table->unsignedInteger('STATUS');
            $table->unsignedInteger('ID_SOLICITANTE');
            $table->foreign('ID_ENDERECO')->references('ID')->on('ENDERECOS')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreign('ID_SOLICITANTE')->references('ID')->on('SOLICITANTES')->onDelete('cascade')->onUpdate('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PACIENTES');
    }
}
