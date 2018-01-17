<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Ingreso extends Model
{
    protected $table='detalle_ingreso';
    protected $primaryKey='id_detalle_ingreso';
    protected $fillable=['cantidad','precio_compra','precio_venta','id_ingreso','id_origen_destino'];
    protected $hidden=['created_at','updated_at'];

    public function Ingreso(){
    	return $this->belongsTo('App\Ingreso','id_ingreso');
    }

    public function Origen_Destino(){
    	return $this->belongsTo('App\Origen_Destino','id_origen_destino');
    }
}
