<?php

use Faker\Generator as Faker;

$factory->define(App\Products::class, function (Faker $faker) {
    return [
		'name' => $faker->name,
		'price' => 19000,
		'stock' => 20
    ];
});
