<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SOLICITANTES', function (Blueprint $table) {
            $table->id('ID');
            $table->string('NOME',60);
            $table->string('EMAIL',35);
            $table->string('SENHA',25);
            $table->string('SENHA_CONFIRMACAO',25);
            $table->string('TELEFONE',15);
            $table->smallInteger('TIPO_FAMILIAR',1);
            $table->string('TIPO_FAMILIAR_OUTROS',20);
            $table->unsignedBigInteger('ID_ENDERECO');
            $table->foreign('ID_ENDERECO')->references('ID')->on('ENDERECO');
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
        Schema::dropIfExists('SOLICITANTES');
    }
}
