<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


$factory->define(App\InvestigationGroup::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    return [
        'name' => $title,
        'logo' => $faker->imageUrl($width = 400, $height = 400),
        'slug' => str_slug($title)
    ];
});
