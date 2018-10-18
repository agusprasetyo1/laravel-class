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
      //Menambahkan data dengan faker
      $users = factory(User::class, 10000)->create([
        'password' => Hash::make('rahasia')
      ]);
      // for ($i=0; $i <= 5 ; $i++) { 
	    //  	User::create([
	    //  		'name' 	   => 'Dummy name' .$i,
	    //  		'email'    => 'Dummy email' .$i. '@gmail.com',
	    //  		'password' => Hash::make('Dummy password')
	    //  	]);
      // }
    }
}
