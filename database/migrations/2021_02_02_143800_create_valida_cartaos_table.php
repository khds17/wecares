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
            $table->string('ID_CARTAO',15);
            $table->string('STATUS',20);
            $table->string('DT_CRIACAO',35);
            $table->string('DT_APROVACAO',35)->nullable();
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
