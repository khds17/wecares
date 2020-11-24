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
            $table->unsignedInteger('ID_TIPO');
            $table->unsignedInteger('ID_LOCALIZACAO');
            $table->unsignedInteger('ID_ENDERECO');
            $table->unsignedInteger('TOMA_MEDICAMENTOS');
            $table->string('TIPO_MEDICAMENTOS')->nullable();
            $table->unsignedInteger('STATUS');
            $table->unsignedInteger('ID_SOLICITANTE');
            $table->unsignedInteger('ID_FAMILIARIDADE');
            $table->string('FAMILIAR_OUTROS',100)->nullable();
            $table->foreign('ID_TIPO')->references('ID')->on('PACIENTES_TIPOS')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_LOCALIZACAO')->references('ID')->on('PACIENTE_LOCALIZACAO')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_ENDERECO')->references('ID')->on('ENDERECOS')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreign('ID_SOLICITANTE')->references('ID')->on('SOLICITANTES')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('PACIENTES');
    }
}
