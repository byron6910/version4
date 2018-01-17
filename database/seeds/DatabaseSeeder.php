<?php

use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
         
           $this->call(UserTableSeeder::class);

         $this->call(CooperativaSeeder::class);
        
         $this->call(BusSeeder::class);
     
          $this->call(OrigenDestinoSeeder::class);
     
         $this->call(ReservaSeeder::class);
         
          $this->call(DetalleReservaSeeder1::class);
         
           $this->call(IngresoSeeder::class);

          $this->call(DetalleIngresoSeeder::class);
         
    }
}
