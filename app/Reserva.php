<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reserva extends Model
{
    protected $table='reserva';
    protected $primaryKey='id_reserva';
    protected $fillable=['fecha_reserva','estado','hora_reserva','id'];
    protected $hidden=['created_at','updated_at'];
    

   

    public function user(){
        return  $this->belongsTo('App\User','id');
    }

    public function detalle_reservas(){
        return  $this->hasMany('App\Detalle_Reserva','id_detalle_reserva');
    }

    public function pago(){
        return  $this->belongsTo('App\Pago','id_pago');
    }




}
