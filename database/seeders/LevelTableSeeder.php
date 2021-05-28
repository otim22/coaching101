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
        $levels = ['O Level', 'A Level','Check Point', 'IGCSE', 'AS / A2'];

        foreach ($levels as $level) {
            factory(Level::class)->create([
                'name' => $level,
                'standard_id' => Standard::all()->random()->id,
            ]);
        }
    }
}
