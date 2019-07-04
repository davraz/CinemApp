<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pelicula_id');
            $table->foreign('pelicula_id')
                ->references('id')->on('peliculas')
                ->onDelete('cascade');
            $table->UnsignedBigInteger('sala_id');
            $table->foreign('sala_id')
                ->references('id')->on('salas')
                ->onDelete('cascade');
            $table->dateTime('hora_inicio');
            $table->dateTime('hora_fin');
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
        Schema::dropIfExists('funciones');
    }
}
