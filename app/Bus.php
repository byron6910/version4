<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table='bus';
    protected $primaryKey='id_bus';
    protected $fillable=['capacidad','marca','condicion','id_cooperativa','foto'];
    protected $hidden=['created_at','updated_at'];
    

  
    public function cooperativa(){
        return $this->belongsTo('App\Cooperativa','id_cooperativa');
    }
}
