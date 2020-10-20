<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ACESSOS', function (Blueprint $table) {
            $table->increments('ID');
            $table->unsignedInteger('ID_TIPO');
            $table->unsignedInteger('ID_TELA');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ACESSOS');
    }
}
