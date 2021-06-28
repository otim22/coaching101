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
        $items = ['Subject', 'Book', 'Note', 'Pastpaper'];

        foreach($items as $item) {
            factory(Item::class)->create([
                'name' => $item,
            ]);
        }
    }
}
