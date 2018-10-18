<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create category 10 rows
        factory(Category::class, 10)->create()
        // On each process would store product ( melakukan penambahan data product saat perulangan/pembuatan data )
            ->each(function ($category){
                //Menambahkan data product
                $category->products()->save(factory(App\Products::class)->make());
            });

        // for ($i=0; $i < 5; $i++) { 
        // 	Category::create([
        // 		'name' => 'Category ' .$i
        // 	]);
        // }
    }
}
