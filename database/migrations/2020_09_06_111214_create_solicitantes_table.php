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
            $table->increments('ID');
            $table->string('NOME',60);
            $table->string('EMAIL',35);
            $table->string('SENHA',25);
            $table->string('SENHA_CONFIRMACAO',25);
            $table->string('TELEFONE',15);
            $table->string('CEP',13);
            $table->string('ENDERECO',50);
            $table->integer('NUMERO');
            $table->string('COMPLEMENTO',25);
            $table->string('BAIRRO',45);
            $table->string('CIDADE',45);
            $table->string('SIGLA',2);
            $table->unsignedSmallInteger('TIPO_FAMILIAR');
            $table->string('TIPO_FAMILIAR_OUTROS',20);
            $table->unsignedInteger('STATUS');
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
