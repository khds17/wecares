<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CARTOES', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('ID_CUSTOMER',30);
            $table->string('ID_CARTAO',15);            
            $table->string('INICIO_CARTAO',6);
            $table->string('FIM_CARTAO',4);
            $table->unsignedSmallInteger('MES_VENCIMENTO');
            $table->unsignedSmallInteger('ANO_VENCIMENTO');
            $table->string('CVV',255);
            $table->string('BANDEIRA',30);
            $table->unsignedSmallInteger('STATUS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartoes');
    }
}
