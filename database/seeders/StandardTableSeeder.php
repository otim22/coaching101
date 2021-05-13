<?php

namespace Database\Seeders;

use App\Models\Standard;
use Illuminate\Database\Seeder;

class StandardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Standard::class)->create([
            'name' => 'Cambridge',
            'status' => 'false'
        ]);
        factory(Standard::class)->create([
            'name' => 'UNEB',
            'status' => 'false'
        ]);
    }
}
