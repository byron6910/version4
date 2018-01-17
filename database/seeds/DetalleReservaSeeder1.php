<?php

use Illuminate\Database\Seeder;

use App\Reserva;
use App\Detalle_Reserva;
use App\Origen_Destino;


use Faker\Factory as Faker;

class DetalleReservaSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker=Faker::create();
        $cantidad1=Origen_Destino::all()->count();
        $cantidad2=Reserva::all()->count();
        

        for($i=0;$i<$cantidad1;$i++){

            for($j=0;$j<$cantidad2;$j++){

            Detalle_Reserva::create([
// para relacionar dejar que sea autoincrementalble
              //  'id_bus'=>$faker->randomNumber(9,false),
                'cantidad'=>$faker->numberBetween($min = 0, $max = 32),
               'precio'=>$faker->numberBetween(3,20),
                'asiento'=>$faker->numberBetween(1,40),
                'id_origen_destino'=>$faker->numberBetween(1,$cantidad1),

                'id_reserva'=>$faker->numberBetween(1,$cantidad2),
                

            ]);
             }
     }
    }
    
}
