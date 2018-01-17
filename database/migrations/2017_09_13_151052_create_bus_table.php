<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->increments('id_bus');
            $table->string('marca');            
            $table->integer('capacidad')->length(10)->unsigned();
            $table->boolean('condicion');     
            $table->string('foto');     

            $table->integer('id_cooperativa')->length(10)->unsigned();
            $table->foreign('id_cooperativa')->references('id_cooperativa')->on('cooperativa')
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
        Schema::dropIfExists('bus');
    }
}
