<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('estado');
            $table->unsignedBigInteger('funcion_id');
            $table->foreign('funcion_id')
                ->references('id')->on('funciones')
                ->onDelete('cascade');
            $table->UnsignedBigInteger('silla_id');
            $table->foreign('silla_id')
                ->references('id')->on('sillas')
                ->onDelete('cascade');
            $table->integer('usuario_id');
            $table->foreign('usuario_id')
                ->references('cedula')->on('usuarios')
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
        Schema::dropIfExists('reservas');
    }
}
