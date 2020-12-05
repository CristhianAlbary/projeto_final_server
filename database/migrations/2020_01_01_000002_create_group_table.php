<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->bigInteger('usu_id');
            $table->string('nome', 255);
            $table->string('descricao', 500);
            $table->timestamps();

            $table->foreign('usu_id')->references('id')->on('users');
            $table->index(['nome', 'descricao']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group');
    }
}
