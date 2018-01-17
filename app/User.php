<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract,
AuthorizableContract,
CanResetPasswordContract
{
use Authenticatable, Authorizable, CanResetPassword;
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $fillable = ['name', 'email', 'password', 'country_code', 'phone_number','ciudad','calle','postal','foto','tipo'];
   // protected $fillable = ['name', 'email', 'password', 'country_code', 'phone_number'];
    
    /**
     * The attributes that should be hidden for arrays. 'name','remember_token'
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $dates = ['deleted_at'];
      //relaciones

      
      public function reservas(){
        return  $this->hasMany('App\Reserva','id_reserva');
    }

    public function ingresos(){
        return  $this->hasMany('App\Ingreso','id_ingreso');
    }


    public function detalle_reserva(){
        
        return $this->hasManyThrough('App\Detalle_Reserva','App\Reserva','id','id_reserva','id','id_reserva');
            }

    public function detalle_ingreso(){
        
        return $this->hasManyThrough('App\Detalle_Ingreso','App\Ingreso','id','id_ingreso','id','id_ingreso');
            }



    public function getIsAdminAtribute(){

    return $this->role==0;
    }



    public function getIsSuportAtribute(){
        
        return $this->role==1;
    }

    public function fullNumber()
    {
        return '+' . $this->country_code . $this->phone_number;
    }


}
