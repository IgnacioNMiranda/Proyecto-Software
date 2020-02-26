<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


$factory->define(App\Project::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    return [
        'code' => $title,
        'name' => $title,
        'state' => $faker->randomElement(['Postulado','En ejecucion','Aceptado','Cancelado']),
        'startDate' => $faker->date,
        'endDate' => $faker->date,
        'slug' => str_slug($title),
        'investigationGroup_id' => rand(1,30)
    ];
});
