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

    	Schema::disableForeignKeyConstraints();
 
        DB::table('users')->truncate();
        DB::table('vehiculos')->truncate();

        Schema::enableForeignKeyConstraints();

        $this->call(UserSeeder::class);
        $this->call(VehiculoSeeder::class);

    }
}
