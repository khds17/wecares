<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContaRecebimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CONTA_RECEBIMENTO', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('AGENCIA',10);
            $table->string('CONTA',15);
            $table->unsignedSmallInteger('TIPO_CONTA');
            $table->unsignedSmallInteger('PRINCIPAL');
            $table->unsignedInteger('STATUS');
            $table->unsignedInteger('ID_BANCO');
            $table->unsignedInteger('ID_PRESTADOR');
            $table->foreign('ID_BANCO')->references('ID')->on('BANCOS')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADORES')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CONTA_RECEBIMENTO');
    }
}
