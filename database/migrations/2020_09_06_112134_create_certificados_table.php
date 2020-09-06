<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CERTIFICADOS', function (Blueprint $table) {
            $table->id('ID');
            $table->unsignedBigInteger('ID_PRESTADOR');
            $table->foreign('ID_PRESTADOR')->references('ID')->on('PRESTADOR');
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
        Schema::dropIfExists('CERTIFICADOS');
    }
}
