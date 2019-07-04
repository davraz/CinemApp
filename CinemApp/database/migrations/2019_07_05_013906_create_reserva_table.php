<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('funcion_id'); 
            $table->foreign('funcion_id')
                ->references('id')->on('funcion')
                ->onDelete('cascade');
            $table->UnsignedBigInteger('silla_id');
            $table->foreign('silla_id')
                ->references('id')->on('silla')
                ->onDelete('cascade');
            $table->integer('usuario_id');
            $table->foreign('usuario_id')
                ->references('cedula')->on('usuario')
                ->onDelete('cascade');
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
        Schema::dropIfExists('reserva');
    }
}
