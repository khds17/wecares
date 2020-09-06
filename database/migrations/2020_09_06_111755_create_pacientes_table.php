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
            $table->id('ID');
            $table->string('NOME',60);
            $table->longText('OBSERVACAO');
            $table->enum('SEXO', ['M', 'F', 'O']);
            $table->string('TELEFONE',15);
            $table->date('DT_NASCIMENTO');
            $table->unsignedBigInteger('ID_SOLICITANTE');
            $table->unsignedBigInteger('ID_ENDERECO');
            $table->foreign('ID_SOLICITANTE')->references('ID')->on('SOLICITANTE');
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
        Schema::dropIfExists('PACIENTES');
    }
}
