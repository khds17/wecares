<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PRESTADORES', function (Blueprint $table) {
            $table->id('ID');
            $table->string('NOME',60);
            $table->string('CPF',15);
            $table->string('EMAIL',35);
            $table->string('SENHA',25);
            $table->string('SENHA_CONFIRMACAO',25);
            $table->string('TELEFONE',15);
            $table->smallInteger('FORMACAO',1);
            $table->date('DT_NASCIMENTO');
            $table->unsignedBigInteger('ID_ENDERECO');
            $table->enum('SEXO', ['M', 'F', 'O']);
            $table->smallInteger('STATUS',1);
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
        Schema::dropIfExists('PRESTADORES');
    }
}
