<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
     protected $table='ingreso';
    protected $primaryKey='id_reserva';
    protected $fillable=['fecha_ingreso','estado','id'];
    protected $hidden=['created_at','updated_at'];
    

    public function user(){
        return  $this->belongsTo('App\User','id');
    }

    public function detalle_ingresos(){
        return  $this->hasMany('App\Detalle_Ingreso','id_detalle_ingreso');
    }


}
