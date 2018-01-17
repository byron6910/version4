<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->increments('id_pago');
            $table->date('fecha_emision');
            $table->float('precio');

            $table->date('fecha_pago');
            $table->enum('tipo',['transferencia','deposito','efectivo']);

            $table->integer('id_reserva')->unsigned();
            $table->foreign('id_reserva')->references('id_reserva')->on('reserva')
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
        Schema::dropIfExists('pago');
    }
}
