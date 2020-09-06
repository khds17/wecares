<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CONTATOS', function (Blueprint $table) {
            $table->id('ID');
            $table->string('TELEFONE');
            $table->string('EMAIL');
            $table->unsignedBigInteger('ID_PRESTADOR');
            $table->unsignedBigInteger('ID_SOLICITANTE');
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADOR');
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADOR');
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
        Schema::dropIfExists('CONTATOS');
    }
}
