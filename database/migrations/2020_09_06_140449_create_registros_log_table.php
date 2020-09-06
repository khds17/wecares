<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REGISTROS_LOG', function (Blueprint $table) {
            $table->id('ID');
            $table->dateTime('DATA');
            $table->longText('TEXTO');
            $table->unsignedBigInteger('ID_ADMIN');
            $table->unsignedBigInteger('ID_PRESTADOR');
            $table->unsignedBigInteger('ID_SOLICITANTE');
            $table->foreign('ID_ADMIN')->references('ID')->on('ADMIN');
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADOR');
            $table->foreign('ID_SOLICITANTE')->references('ID')->on('SOLICITANTE');
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
        Schema::dropIfExists('REGISTROS_LOG');
    }
}
