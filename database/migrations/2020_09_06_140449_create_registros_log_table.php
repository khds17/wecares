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
            $table->increments('ID');
            $table->dateTime('DATA');
            $table->longText('TEXTO');
            $table->unsignedInteger('ID_ADMIN')->nullabel();;
            $table->unsignedInteger('ID_PRESTADOR')->nullabel();;
            $table->unsignedInteger('ID_SOLICITANTE')->nullabel();;
            $table->foreign('ID_ADMIN')->references('ID')->on('ADMIN')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADORES')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('REGISTROS_LOG');
    }
}
