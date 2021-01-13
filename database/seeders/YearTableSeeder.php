<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;

class YearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Year::class)->create([
            'name' => 'Senior one'
        ]);
        factory(Year::class)->create([
            'name' => 'Senior two'
        ]);
        factory(Year::class)->create([
            'name' => 'Senior three'
        ]);
        factory(Year::class)->create([
            'name' => 'Senior four'
        ]);
        factory(Year::class)->create([
            'name' => 'Senior five'
        ]);
        factory(Year::class)->create([
            'name' => 'Senior six'
        ]);
        factory(Year::class)->create([
            'name' => 'Year one'
        ]);
        factory(Year::class)->create([
            'name' => 'Year two'
        ]);
        factory(Year::class)->create([
            'name' => 'Year three'
        ]);
        factory(Year::class)->create([
            'name' => 'Year four'
        ]);
    }
}
