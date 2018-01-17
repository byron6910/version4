<?php

use Illuminate\Database\Seeder;
use App\Origen_Destino;
use App\Cooperativa;

use Faker\Factory as Faker;

class OrigenDestinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker=Faker::create();
        $cantidad1=Cooperativa::all()->count();
        for($i=0;$i<$cantidad1;$i++){

            Origen_Destino::create([

               // 'id_origen'=>$faker->randomNumber(9,false),
                'origen'=>$faker->cityPrefix(),
                'destino'=>$faker->cityPrefix(),
               // 'precio'=>$faker->numberBetween(3,20),
                'stock'=>$faker->numberBetween(10,50),
                
                  'condicion'=>$faker->boolean(),
                  'fecha'=>$faker->date(),
                  'hora'=>$faker->time(),
                  'id_cooperativa'=>$faker->numberBetween(1,$cantidad1)


            ]);

    }
}
}
