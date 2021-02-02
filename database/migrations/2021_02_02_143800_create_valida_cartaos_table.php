<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidaCartaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VALIDA_CARTAO', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('ID_PAGAMENTO',11);
            $table->unsignedInteger('ID_CARTAO');
            $table->string('STATUS',20);
            $table->string('DT_CRIACAO',35);
            $table->string('DT_APROVACAO',35);
            $table->foreign('ID_CARTAO')->references('ID')->on('CARTOES')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('VALIDA_CARTAO');
    }
}
