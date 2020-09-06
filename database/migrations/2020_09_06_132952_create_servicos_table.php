<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SERVICOS', function (Blueprint $table) {
            $table->id('ID');
            $table->unsignedBigInteger('ID_PRESTADOR');
            $table->unsignedBigInteger('ID_SOLICITANTE');
            $table->unsignedBigInteger('ID_PACIENTE');
            $table->smallInteger('STATUS');
            $table->smallInteger('VALOR');
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADOR');
            $table->foreign('ID_SOLICITANTE')->references('ID')->on('SOLICITANTE');
            $table->foreign('ID_PACIENTE')->references('ID')->on('PACIENTE');
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
        Schema::dropIfExists('SERVICOS');
    }
}
