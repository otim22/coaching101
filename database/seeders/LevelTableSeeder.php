<?php

namespace Database\Seeders;

use App\Models\Level;
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
            'name' => 'O Level'
        ]);
        factory(Level::class)->create([
            'name' => 'A Level'
        ]);
    }
}
