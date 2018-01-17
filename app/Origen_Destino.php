<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origen_Destino extends Model
{
    protected $table='origen_destino';
    protected $primaryKey='id_origen_destino';
    protected $fillable=['origen','destino','stock','condicion','fecha','hora'];
    protected $hidden=['created_at','updated_at'];


    

    public function detalle_reservas(){
        
    return $this->hasMany('App\Detalle_Reserva','id_detalle_reserva');
    }    

     public function detalle_ingresos(){
        
    return $this->hasMany('App\Detalle_Ingreso','id_detalle_ingreso');
    }  

    public function cooperativa(){
        return $this->belongsTo('App\Cooperativa','id_cooperativa');
    }



//     public function cooperativas(){

//        return $this->hasManyThrough('App\Cooperativa','App\Viaje','id_origen_destino','id_viaje','id_origen_destino','id_viaje');
//     }
}
