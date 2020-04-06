<?php

use Illuminate\Database\Seeder;

class ResearchersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Researcher::class,75)->create()->each(function(App\Researcher $researcher){
            $researcher->products()->attach([
                rand(1,10),
                rand(11,20),
                rand(21,30),
                rand(31,40)
            ]);

            $researcher->investigation_groups()->attach([
                rand(1,10),
                rand(11,20),
                rand(21,30),
            ]);

            $researcher->projects()->attach([
                rand(1,10),
                rand(11,20),
                rand(21,30),
            ]);

            $researcher->publications()->attach([
                rand(1,10),
                rand(11,20),
                rand(21,30),
                rand(31,40),
            ]);
        });
    }
}
