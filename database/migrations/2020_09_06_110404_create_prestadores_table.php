<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PRESTADORES', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('NOME',255);
            $table->string('CPF',15);
            $table->string('TELEFONE',15);
            $table->date('DT_NASCIMENTO');
            $table->unsignedInteger('ID_SEXO');
            $table->string('EMAIL',255);
            $table->unsignedInteger('ID_USUARIO');
            $table->unsignedInteger('ID_ENDERECO');
            $table->unsignedInteger('ID_FORMACAO');
            $table->unsignedInteger('ID_CERTIFICADO');
            $table->unsignedInteger('ID_ANTECEDENTE');
            $table->unsignedInteger('STATUS');
            $table->foreign('ID_USUARIO')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_ENDERECO')->references('ID')->on('ENDERECOS')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_CERTIFICADO')->references('ID')->on('CERTIFICADOS')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_ANTECEDENTE')->references('ID')->on('ANTECEDENTES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_FORMACAO')->references('ID')->on('FORMACAO')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_SEXO')->references('ID')->on('SEXOS')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PRESTADORES');
    }
}
