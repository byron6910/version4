<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_reserva', function (Blueprint $table) {
            $table->increments('id_detalle_reserva');
            $table->integer('cantidad');
            $table->float('precio');
            $table->integer('asiento');

            $table->integer('id_origen_destino')->length(10)->unsigned();
            $table->foreign('id_origen_destino')->references('id_origen_destino')->on('origen_destino')
            ->onDelete('cascade');


            $table->integer('id_reserva')->length(10)->unsigned();
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
        Schema::dropIfExists('detalle_reserva');
    }
}
