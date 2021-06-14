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
            if($itemContent->item_id == "1") {
                $itemContent->addMediaFromUrl($imageUrl)->toMediaCollection('cover_images');
                $itemContent->addMediaFromUrl($imageUrl)->toMediaCollection('subjects');
            }
            if($itemContent->item_id == "2") {
                $itemContent->addMediaFromUrl($imageUrl)->toMediaCollection('cover_images');
                $itemContent->addMediaFromUrl($imageUrl)->toMediaCollection('books');
            }
            if($itemContent->item_id == "3") {
                $itemContent->addMediaFromUrl($imageUrl)->toMediaCollection('notes');
            }
            if($itemContent->item_id == "4") {
                $itemContent->addMediaFromUrl($imageUrl)->toMediaCollection('pastpapers');
            }
        }
    }
}
