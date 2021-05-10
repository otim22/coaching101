<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Item::class)->create([
            'name' => 'Subject',
        ]);

        factory(Item::class)->create([
            'name' => 'Book',
        ]);

        factory(Item::class)->create([
            'name' => 'Note',
        ]);

        factory(Item::class)->create([
            'name' => 'Pastpaper',
        ]);
    }
}
