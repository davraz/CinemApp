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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pelicula_id'); 
            $table->foreign('pelicula_id')
                ->references('id')->on('pelicula')
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
