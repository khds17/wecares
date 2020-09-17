<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ACESSOS', function (Blueprint $table) {
            $table->increments('ID');
            $table->unsignedSmallInteger('TIPO_CONTA');
            $table->unsignedInteger('ID_ADMIN');
            $table->unsignedInteger('ID_PRESTADOR');
            $table->unsignedInteger('ID_SOLICITANTE');
            $table->foreign('ID_ADMIN')->references('ID')->on('ADMIN')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADORES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_SOLICITANTE')->references('ID')->on('SOLICITANTES')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ACESSOS');
    }
}