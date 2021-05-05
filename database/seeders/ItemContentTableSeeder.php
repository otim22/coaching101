<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\ItemContent;
use Illuminate\Database\Seeder;

class ItemContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemContents = factory(ItemContent::class, 100)->create();

        $imageUrl = 'http://via.placeholder.com/800x650';

        foreach ($itemContents as $itemContent) {
            $itemContent->addMediaFromUrl($imageUrl)->toMediaCollection('default');
        }
    }
}
