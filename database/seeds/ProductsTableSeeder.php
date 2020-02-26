<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class,40)->create()->each(function(App\InvestigationGroup $investigationGroup, App\Project $project ){
            $investigationGroup->products()->attach([
                rand(1,30),
            ]);

            $project->products()->attach(){[
                rand(1,30),
            ]};
        });
    }
}
