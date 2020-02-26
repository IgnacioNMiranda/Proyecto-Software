<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Unit::class,30)->create()->each(function(App\Unit $unit){
            $unit->investigation_groups()->attach([
                rand(1,10),
                rand(11,20),
                rand(21,30)
            ]);
        });
    }
}
