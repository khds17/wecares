<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PAGAMENTOS', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('ID_PAGAMENTO',11);
            $table->unsignedInteger('ID_SERVICO_PRESTADO');
            $table->unsignedInteger('ID_CARTAO');
            $table->string('STATUS',20);
            $table->string('DT_CRIACAO',35);
            $table->string('DT_APROVACAO',35);
            $table->foreign('ID_SERVICO_PRESTADO')->references('ID')->on('SERVICOS_PRESTADOS')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pagamentos');
    }
}
