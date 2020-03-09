<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


$factory->define(App\Researcher::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'rut' => $faker->regexify('^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$'),
        'state' => $faker->randomElement(['Activo','Inactivo']),
        'country' => $faker->country,
        'unit_id' => rand(1,30),
    ];
});
