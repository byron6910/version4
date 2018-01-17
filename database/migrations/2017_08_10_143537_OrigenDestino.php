<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrigenDestino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('origen_destino', function (Blueprint $table) {
            

            $table->increments('id_origen_destino');
            $table->string('origen',45);
            $table->string('destino',45);
            $table->date('fecha');
            $table->time('hora');
            $table->integer('stock');
            $table->boolean('condicion');
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
        Schema::dropIfExists('origen_destino');
    }
}
