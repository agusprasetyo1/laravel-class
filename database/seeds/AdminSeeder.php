<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin::create([
        // 	'name'     => 'Agus Prasetyo',
        // 	'username' => 'agus123',
        // 	'email'    => 'agus@gmail.com',
        // 	'password' => Bcrypt('agus')
        // ]);
        Admin::create([
        	'name'     => 'Eko Prastiyo',
        	'username' => 'eko123',
        	'email'    => 'eko@gmail.com',
        	'password' => Bcrypt('eko')
        ]);
    }
}
