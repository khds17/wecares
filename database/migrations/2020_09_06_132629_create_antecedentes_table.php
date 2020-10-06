<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ANTEDECENTES', function (Blueprint $table) {
            $table->increments('ID');
            $table->unsignedInteger('ID_PRESTADOR');
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADORES')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ANTEDECENTES');
    }
}
