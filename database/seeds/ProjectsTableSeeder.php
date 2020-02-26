<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Project::class,30)->create()->each(function(App\InvestigationGroup $investigationGroup){
            $investigationGroup->projects()->attach([
                rand(1,30),
            ]);
        });
    }
}
