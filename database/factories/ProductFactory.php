<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


    $factory->define(App\Product::class, function (Faker $faker) {
        $title = $faker->sentence(5);
        return [
            'name' => $title,
            'description' => $faker->text(500),
            'date' => $faker->date,
            'slug' => str_slug($title),
            'investigationGroupId' => rand(1,30),
            'projectId' => rand(1,30)
        ];
});
