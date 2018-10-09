<?php

use Illuminate\Database\Seeder;
use App\Products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
        	Products::create([
        		'name'  	 => 'name '.$i,
        		'price' 	 => 0,
        		'stock'      => 0,
        		'description'=> 'description '.$i,
        		'photo'		 => 'photo '.$i
        	]);
        }
    }
}
