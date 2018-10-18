<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(App\User::class, function (Faker $faker) {
	return [
		'name' => $faker->firstName,
		'email' => $faker->unique()->safeEmail
	];
});
