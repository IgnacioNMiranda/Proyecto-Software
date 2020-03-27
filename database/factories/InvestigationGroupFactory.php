<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


$factory->define(App\InvestigationGroup::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    return [
        'name' => $title,
        'logo' => $faker->imageUrl($width = 300, $height = 300),
        'slug' => str_slug($title)
    ];
});
