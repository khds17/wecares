<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteLocalizacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PACIENTE_LOCALIZACAO', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('LOCALIZACAO', 255);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PACIENTE_LOCALIZACAO');
    }
}
