<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Item;
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
        factory(Item::class)->create([
            'name' => 'Subject',
            'slug' => 'subject',
        ]);

        factory(Item::class)->create([
            'name' => 'Book',
            'slug' => 'book',
        ]);

        factory(Item::class)->create([
            'name' => 'Note',
            'slug' => 'note',
        ]);

        factory(Item::class)->create([
            'name' => 'Pastpaper',
            'slug' => 'pastpaper',
        ]);
    }
}
