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
            $table->id('ID');
            $table->smallInteger('NUMERO');
            $table->smallInteger('VENCIMENTO');
            $table->smallInteger('CCV');
            $table->unsignedBigInteger('ID_BANDEIRA');
            $table->unsignedBigInteger('ID_SOLICITANTE');
            $table->foreign('ID_SOLICITANTE')->references('ID')->on('SOLICITANTE');
            $table->foreign('ID_BANDEIRA')->references('ID')->on('BANDEIRA');
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
