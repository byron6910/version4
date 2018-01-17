<?php

use Illuminate\Database\Seeder;

use App\Ingreso;
use App\Detalle_Ingreso;
use App\Origen_Destino;


use Faker\Factory as Faker;

class DetalleIngresoSeeder extends Seeder
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
        $cantidad2=Ingreso::all()->count();
        

        for($i=0;$i<$cantidad1;$i++){

            for($j=0;$j<$cantidad2;$j++){

            Detalle_Ingreso::create([
// para relacionar dejar que sea autoincrementalble
              //  'id_bus'=>$faker->randomNumber(9,false),
                'cantidad'=>$faker->numberBetween($min = 0, $max = 32),
               'precio_compra'=>$faker->numberBetween(3,20),
               'precio_venta'=>$faker->numberBetween(3,20),
                
                'id_origen_destino'=>$faker->numberBetween(1,$cantidad1),

                'id_ingreso'=>$faker->numberBetween(1,$cantidad2),
                

            ]);
             }
     }
    }
}
