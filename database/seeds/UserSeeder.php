<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'cliente',
            'email' => 'xxx@xxx.com',
            'password' => Hash::make('12345678'),
            'is_admin' => 3,
            'img' => 'img/user.png'
        ]);

        DB::table('users')->insert([
            'name' => 'vendedor',
            'email' => 'zzz@zzz.com',
            'password' => Hash::make('12345678'),
            'is_admin' => 2,
            'img' => 'img/user.png'
        ]);

        DB::table('users')->insert([
            'name' => 'administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'is_admin' => 1,
            'img' => 'img/user.png'
        ]);
    }
}
