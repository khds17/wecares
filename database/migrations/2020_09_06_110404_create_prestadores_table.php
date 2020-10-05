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
            $table->increments('ID');
            $table->string('NOME',255);
            $table->string('CPF',15);
            $table->string('EMAIL',35);
            $table->string('SENHA',25);
            $table->string('TELEFONE',15);
            $table->unsignedInteger('FORMACAO');
            $table->date('DT_NASCIMENTO');
            $table->string('CEP',13);
            $table->string('ENDERECO',255);
            $table->integer('NUMERO');
            $table->string('COMPLEMENTO',255);
            $table->string('BAIRRO',45);
            $table->string('CIDADE',45);
            $table->string('SIGLA',2);
            $table->enum('SEXO', ['M', 'F', 'O']);
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
        Schema::dropIfExists('PRESTADORES');
    }
}
