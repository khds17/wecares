<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CIDADES', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('CIDADE',45);
            $table->string('UF',2);
            $table->unsignedInteger('ID_ESTADO');
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
        Schema::dropIfExists('CIDADES');
    }
}
