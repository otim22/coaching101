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
        $levels = ['O Level', 'A Level','KS 3', 'KS 4', 'AS', 'A Level'];
        $cambridge = 1;
        $uneb = 2;

        foreach ($levels as $key => $level) {
            if($key < 2) {
                factory(Level::class)->create([
                    'name' => $level,
                    'standard_id' => $uneb,
                ]);
            } else {
                factory(Level::class)->create([
                    'name' => $level,
                    'standard_id' => $cambridge,
                ]);
            }
        }
    }
}
