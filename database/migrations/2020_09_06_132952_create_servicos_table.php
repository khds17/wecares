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
            $table->increments('ID');
            $table->unsignedInteger('ID_PRESTADOR');
            $table->unsignedInteger('ID_SOLICITANTE');
            $table->unsignedInteger('ID_PACIENTE');
            $table->unsignedSmallInteger('STATUS');
            $table->float('VALOR',8,2);
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADORES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_SOLICITANTE')->references('ID')->on('SOLICITANTES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_PACIENTE')->references('ID')->on('PACIENTES')->onDelete('cascade')->onUpdate('cascade');
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
