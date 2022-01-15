<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaMensagens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('remetente_id')->unsigned();;
            $table->unsignedBigInteger('destinatario_id')->unsigned();;
            $table->text('mensagem');
            $table->boolean('lido');
            $table->timestamps();

            $table->foreign('destinatario_id')->references('id')->on('users');
            $table->foreign('remetente_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensagens');
    }
}
