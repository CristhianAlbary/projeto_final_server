<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->bigInteger('usu_origem');
            $table->bigInteger('usu_destino');
            $table->string('mensagem');
            $table->char('status', 1);
            $table->timestamps();

            $table->foreign('usu_origem')->references('id')->on('users');
            $table->foreign('usu_destino')->references('id')->on('users');
            $table->index(['mensagem', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message');
    }
}
