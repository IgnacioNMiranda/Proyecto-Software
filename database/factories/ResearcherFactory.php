<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


$factory->define(App\Researcher::class, function (Faker $faker) {
    return [
        'researcher_name' => $faker->name,
        'passport' => $faker->unique()->shuffle('ADFNU3476921'),
        'state' => $faker->randomElement(['Activo','Inactivo']),
        'country' => $faker->country,
        'unit_id' => rand(1,30),
    ];
});
