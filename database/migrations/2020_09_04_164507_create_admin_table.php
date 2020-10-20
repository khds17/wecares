<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ADMIN', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('NOME',50);
            $table->string('EMAIL',35);
            $table->string('SENHA',25);
            $table->string('SENHA_CONFIRMACAO',25);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ADMIN');
    }
}
