<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Reserva extends Model
{
     protected $table='detalle_reserva';
    protected $primaryKey='id_detalle_reserva';
    protected $fillable=['cantidad','precio','asiento','id_reserva','id_origen_destino'];
    protected $hidden=['created_at','updated_at'];

    public function Reserva(){
    	return $this->belongsTo('App\Reserva','id_reserva');
    }

    public function Origen_Destino(){
    	return $this->belongsTo('App\Origen_Destino','id_origen_destino');
    }
}
