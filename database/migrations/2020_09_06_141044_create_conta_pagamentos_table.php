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
            $table->id('ID');
            $table->smallInteger('AGENCIA');
            $table->smallInteger('CONTA');
            $table->smallInteger('TIPO_CONTA');
            $table->unsignedBigInteger('ID_BANCO');
            $table->unsignedBigInteger('ID_PRESTADOR');
            $table->foreign('ID_BANCO')->references('ID')->on('BANCO');
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
        Schema::dropIfExists('CONTA_PAGAMENTOS');
    }
}
