<?php

use Illuminate\Database\Seeder;

use App\Reserva;
use App\Cliente;
use App\Viaje;
use App\User;

use Faker\Factory as Faker;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
      

          $faker=Faker::create();
    
        $cantidad2=User::all()->count();
        
        
     
        for($k=0;$k<$cantidad2;$k++){
                

            Reserva::create([

               // 'ci_conductor'=>$faker->randomNumber(9,false),
                'fecha_reserva'=>$faker->date(),
                'estado'=>$faker->boolean(),
                'hora_reserva'=>$faker->time(),
                'tipo_comprobante'=>$faker->stateAbbr(),  
                'num_comprobante'=>$faker->randomNumber(6),

                'impuesto'=>$faker->numberBetween(1,10),
                'total'=>$faker->numberBetween(1,10),
              
                'id'=>$faker->numberBetween(1,$cantidad2)

            ]);
    
        }
    }
}
