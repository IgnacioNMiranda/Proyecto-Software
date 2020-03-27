<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Unit::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    return [
        'name' => $title,
        'country' => $faker->country,
        'slug' => str_slug($title)
    ];
});
