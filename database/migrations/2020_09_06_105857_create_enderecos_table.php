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
            $table->increments('ID');
            $table->string('ENDERECO',255);
            $table->string('CEP',13);
            $table->unsignedInteger('ID_BAIRRO');
            $table->unsignedInteger('ID_CIDADE');
            $table->unsignedInteger('ID_ESTADO');
            $table->foreign('ID_BAIRRO')->references('ID')->on('BAIRROS')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_CIDADE')->references('ID')->on('CIDADES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_ESTADO')->references('ID')->on('ESTADOS')->onDelete('cascade')->onUpdate('cascade');
            
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
