<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker=Faker::create();
        for($i=0;$i<4;$i++){

            User::create([

                //'ci'=>$faker->randomNumber(9,false),
                'name'=>$faker->firstName().' '.$faker->lastName(),
                'phone_number'=>$faker->randomNumber(9),
                'country_code'=>$faker->numberBetween($min = 0, $max = 999),
                
                'email'=>$faker->email(),
                'tipo'=>$faker->citySuffix(),
                'foto'=>$faker->word(),
                'ciudad'=>$faker->city(),
                'calle'=>$faker->streetName(),
                'postal'=>$faker->randomNumber(7),
               // 'confirmation_code'=>str_random(25),
                'password'=>$faker->word(),
              'authy_id'=>$faker->numberBetween($min = 0, $max = 99999),
              'verified'=>$faker->boolean(),
           
            ]);
       
            }
        }
    
}
