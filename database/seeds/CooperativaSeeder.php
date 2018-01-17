<?php

use Illuminate\Database\Seeder;
use App\Cooperativa;
use App\Viaje;

use Faker\Factory as Faker;

class CooperativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

        for($i=0;$i<9;$i++){
     
            Cooperativa::create([

                //'id_cooperativa'=>$faker->numberBetween($min = 1, $max = 99999),
                'nombre'=>$faker->word(),
                'direccion'=>$faker->streetAddress(),
                'telefono'=>$faker->randomNumber(7,false),
            
                
                'correo'=>$faker->email(),
                'activo'=>$faker->boolean(),
     
            ]);
        }
    
}

}