<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcion', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('pelicula_id'); 
            $table->foreign('pelicula_id')
                ->references('id')->on('pelicula')
                ->onDelete('cascade');
            $table->UnsignedBigInteger('sala_id');
            $table->foreign('sala_id')
                ->references('id')->on('sala')
                ->onDelete('cascade');
            $table->time('HoraInicio');
            $table->time('HoraFin');
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
        Schema::dropIfExists('funcion');
    }
}
