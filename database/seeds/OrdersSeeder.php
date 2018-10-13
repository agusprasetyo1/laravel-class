<?php

use Illuminate\Database\Seeder;

use App\Order;
use App\User;
use App\Products;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
        	$user = User::inRandomOrder()->first();
        	$product = Products::inRandomOrder()->first();

        	Order::create([
        		'user_id'    => $user->id,
        		'product_id' => $product->id
        	]);
        }
    }
}
