<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Bus;
use App\Cooperativa;

use Faker\Factory as Faker;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        $cantidad=Cooperativa::all()->count();

        for($i=0;$i<$cantidad;$i++){

            Bus::create([
// para relacionar dejar que sea autoincrementalble
              //  'id_bus'=>$faker->randomNumber(9,false),
                'marca'=>$faker->firstName(),
                'capacidad'=>$faker->numberBetween(20,48),
                'condicion'=>$faker->boolean(),
                'foto'=>$faker->word(),
                'id_cooperativa'=>$faker->numberBetween(1,$cantidad)


            ]);
    }
}
}
