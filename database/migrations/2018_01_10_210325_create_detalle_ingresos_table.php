<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->increments('id_detalle_ingreso');
            $table->integer('cantidad');
            $table->float('precio_compra');
            $table->float('precio_venta');

            $table->integer('id_origen_destino')->length(10)->unsigned();
            $table->foreign('id_origen_destino')->references('id_origen_destino')->on('origen_destino')
            ->onDelete('cascade');


            $table->integer('id_ingreso')->length(10)->unsigned();
            $table->foreign('id_ingreso')->references('id_ingreso')->on('ingreso')
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
        Schema::dropIfExists('detalle_ingresos');
    }
}
