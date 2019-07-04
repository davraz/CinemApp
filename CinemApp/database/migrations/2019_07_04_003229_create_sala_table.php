<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sala', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->UnsignedBigInteger('funcion_id');
            $table->foreign('funcion_id')
                ->references('id')->on('funcion')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sala');
    }
}
