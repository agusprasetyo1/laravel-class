<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i <= 5 ; $i++) { 
	     	User::create([
	     		'name' 	   => 'Junaedi' .$i,
	     		'email'    => 'junaedi' .$i. '@gmail.com',
	     		'password' => 'abcdefghijk'
	     	]);
      }
    }
}
