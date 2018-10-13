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
        Admin::create([
        	'name'     => 'Agus Prasetyo',
        	'username' => 'agus123',
        	'email'    => 'agus@gmail.com',
        	'password' => Hash::make('agus')
        ]);
    }
}
