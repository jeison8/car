<?php

use Illuminate\Database\Seeder;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('vehiculos')->insert([
            'img' => 'img/car1.jpg',
            'nombre' => 'clio 6',
            'marca' => 'mazda',
            'precio' => 60000000,
        ]);

         DB::table('vehiculos')->insert([
            'img' => 'img/car3.jpg',
            'nombre' => 'tico',
            'marca' => 'renault',
            'precio' => 20000000,
        ]);

         DB::table('vehiculos')->insert([
            'img' => 'img/car2.jpg',
            'nombre' => '4x4',
            'marca' => 'ford',
            'precio' => 100000000,
        ]);
    }
}
