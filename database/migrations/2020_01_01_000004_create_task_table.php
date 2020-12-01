<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->bigInteger('usu_origem');
            $table->bigInteger('usu_destino');
            $table->string('descricao', 2000);
            $table->char('status', 1);
            $table->timestamps();

            $table->foreign('usu_origem')->references('id')->on('users');
            $table->foreign('usu_destino')->references('id')->on('users');
            $table->index(['descricao']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
