<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SOLICITANTES', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('NOME',255);
            $table->string('CPF',15);
            $table->string('EMAIL',255);
            $table->string('TELEFONE',15);
            $table->string('SENHA',25);
            $table->unsignedInteger('ID_ENDERECO');
            $table->string('TIPO_FAMILIAR',25);
            $table->string('TIPO_FAMILIAR_OUTROS',20)->nullabel();
            $table->unsignedInteger('STATUS');
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
        Schema::dropIfExists('SOLICITANTES');
    }
}
