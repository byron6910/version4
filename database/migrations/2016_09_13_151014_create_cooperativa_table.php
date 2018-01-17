<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCooperativaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooperativa', function (Blueprint $table) {
            $table->increments('id_cooperativa');
            $table->string('nombre');
            $table->string('direccion');
            $table->integer('telefono')->length(10)->unsigned();
            $table->string('correo');
            $table->boolean('activo');

           

            
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
        Schema::dropIfExists('cooperativa');
    }
}
