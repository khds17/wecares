<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContaPagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CONTA_PAGAMENTOS', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('AGENCIA');
            $table->string('CONTA');
            $table->unsignedSmallInteger('TIPO_CONTA');
            $table->unsignedInteger('STATUS');
            $table->unsignedInteger('ID_BANCO');
            $table->unsignedInteger('ID_PRESTADOR');
            $table->foreign('ID_BANCO')->references('ID')->on('BANCOS')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADORES')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('CONTA_PAGAMENTOS');
    }
}
