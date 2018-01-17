<?php

use Illuminate\Database\Seeder;

use App\Ingreso;

use App\User;

use Faker\Factory as Faker;

class IngresoSeeder extends Seeder
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
                

            Ingreso::create([

               // 'ci_conductor'=>$faker->randomNumber(9,false),
                'fecha_ingreso'=>$faker->dateTime(),
              
                
                'estado'=>$faker->boolean(),
               'impuesto'=>$faker->numberBetween(1,10),
                
                'id'=>$faker->numberBetween(1,$cantidad2)

            ]);
    
        }
    }
}
