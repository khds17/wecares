<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REGISTROS_LOG', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('DATA',50);
            $table->longText('TEXTO');
            $table->unsignedInteger('ID_USUARIO')->nullable();
            $table->foreign('ID_USUARIO')->references('ID')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REGISTROS_LOG');
    }
}
