<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBairrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BAIRROS', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('BAIRRO',45);
            $table->unsignedInteger('ID_CIDADE');
            $table->foreign('ID_CIDADE')->references('ID')->on('CIDADES')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('BAIRROS');
    }
}
