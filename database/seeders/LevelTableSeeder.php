<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Standard;
use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Level::class)->create([
            'name' => 'O Level',
            'standard_id' => Standard::all()->random()->id,
        ]);
        factory(Level::class)->create([
            'name' => 'A Level',
            'standard_id' => Standard::all()->random()->id,
        ]);
        factory(Level::class)->create([
            'name' => 'Check Point',
            'standard_id' => Standard::all()->random()->id,
        ]);
        factory(Level::class)->create([
            'name' => 'IGCSE',
            'standard_id' => Standard::all()->random()->id,
        ]);
        factory(Level::class)->create([
            'name' => 'AS / A2',
            'standard_id' => Standard::all()->random()->id,
        ]);
    }
}
