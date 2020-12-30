<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slider = factory(Slider::class)->create([
            'title' => 'Learn today',
            'description' => '<p>At your own convenient time,</p> <p>Learn from our verified seasoned teachers </p> <p>With proven experience in their fields.</p>',
            'button_text' => 'Start Learning',
            'button_link' => '/home'
        ]);

        $imageUrl = 'http://via.placeholder.com/800x650';

        $slider->addMediaFromUrl($imageUrl)->toMediaCollection('default');
    }
}
