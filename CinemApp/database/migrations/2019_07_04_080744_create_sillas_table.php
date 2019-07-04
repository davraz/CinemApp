<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sillas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('letra',1);
            $table->integer('numero');
            $table->string('tipo');
            $table->UnsignedbigInteger('sala_id');
            $table->foreign('sala_id')
                ->references('id')->on('salas')
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
        Schema::dropIfExists('sillas');
    }
}
