<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooperativa extends Model
{
    protected $table='cooperativa';
    protected $primaryKey='id_cooperativa';
    protected $fillable=['nombre','direccion','telefono','correo','activo'];
    protected $hidden=['created_at','updated_at'];
    
    
    public function buses(){
        return $this->hasMany('App\Bus','id_bus');
    }
    public function origen_destinos(){
        return $this->hasMany('App\Origen_Destino','id_origen_destino');
    }

    
  
        
  
}
