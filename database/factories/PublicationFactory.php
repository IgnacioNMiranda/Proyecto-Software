<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Publication::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    return [
        'title' => $title,
        'titleSecondLanguage' => $title,
        'publicationType' => $faker->randomElement(['Indexada','No Indexada']),
        'publicationIndex' =>$faker->randomElement(['WOS','SCOPUS','SCIELO','Otro Indice']),
        'publicationNoIndex' =>$faker->randomElement(['CONGRESO','REVISTA']),
        'type' =>$faker->unique()->text(10),
        'date' => $faker->date,
        'slug' => str_slug($title),
        'investigation_group_id' => rand(1,30),
        'project_id' => rand(1,30)
    ];
});
