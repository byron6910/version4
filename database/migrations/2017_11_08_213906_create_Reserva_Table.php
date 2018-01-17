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
            $table->increments('id_reserva');
            $table->date('fecha_reserva');
            $table->time('hora_reserva');
            $table->boolean('estado');

            $table->enum('tipo_comprobante',['Factura','Comprobante'])->default('Comprobante');
            $table->integer('num_comprobante')->length(9)->unsigned();
            $table->integer('impuesto')->length(9)->unsigned();
            $table->integer('total')->length(9)->unsigned();


             $table->integer('id')->unsigned();
             $table->foreign('id')->references('id')->on('users')
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
