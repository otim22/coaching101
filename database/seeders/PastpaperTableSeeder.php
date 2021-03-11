<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Pastpaper;
use Illuminate\Database\Seeder;

class PastpaperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notes = factory(Pastpaper::class, 100)->create();
    }
}
