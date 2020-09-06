<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ENDERECOS', function (Blueprint $table) {
            $table->id('ID');
            $table->string('ENDERECO',50);
            $table->smallInteger('NUMERO',4);
            $table->smallInteger('CEP',13);
            $table->unsignedBigInteger('ID_BAIRRO');
            $table->foreign('ID_BAIRRO')->references('ID')->on('BAIRRO');
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
        Schema::dropIfExists('ENDERECOS');
    }
}
