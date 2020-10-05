<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PACIENTES', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('NOME',255);
            $table->longText('OBSERVACAO');
            $table->enum('SEXO', ['M', 'F', 'O']);
            $table->string('TELEFONE',15);
            $table->date('DT_NASCIMENTO');
            $table->string('CEP',13);
            $table->string('ENDERECO',255);
            $table->integer('NUMERO');
            $table->string('COMPLEMENTO',255);
            $table->string('BAIRRO',45);
            $table->string('CIDADE',45);
            $table->string('SIGLA',2);
            $table->unsignedInteger('STATUS');
            $table->unsignedInteger('ID_SOLICITANTE');
            $table->foreign('ID_SOLICITANTE')->references('ID')->on('SOLICITANTES')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('PACIENTES');
    }
}
