<?php

use Illuminate\Database\Seeder;

class InvestigationGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\InvestigationGroup::class,30)->create();
    }
}
