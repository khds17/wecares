<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormasPagamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FORMAS_PAGAMENTO', function (Blueprint $table) {
            $table->increments('ID');
            $table->unsignedSmallInteger('NUMERO');
            $table->string('VENCIMENTO',10);
            $table->unsignedSmallInteger('CCV');
            $table->unsignedInteger('STATUS');
            $table->unsignedInteger('ID_BANDEIRA');
            $table->unsignedInteger('ID_SOLICITANTE');
            $table->foreign('ID_SOLICITANTE')->references('ID')->on('SOLICITANTES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_BANDEIRA')->references('ID')->on('BANDEIRAS')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('FORMAS_PAGAMENTO');
    }
}
