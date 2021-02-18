<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ADMIN', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('NOME',255);
            $table->string('CPF',15);
            $table->string('EMAIL',255);
            $table->string('TELEFONE',15);            
            $table->unsignedInteger('ID_USUARIO');
            $table->unsignedInteger('ID_ENDERECO');
            $table->unsignedInteger('ID_FOTO')->nullable();
            $table->foreign('ID_USUARIO')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_ENDERECO')->references('ID')->on('ENDERECOS')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_FOTO')->references('ID')->on('FOTOS')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ADMIN');
    }
}
