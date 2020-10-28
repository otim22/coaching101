<?php

namespace Database\Seeders;

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
        factory(Slider::class)->create([
            'title' => 'Learn today',
            'description' => 'At your own convenience, From seasoned teachers around.',
            'button_text' => 'Start Learning',
            'button_link' => '/home'
        ]);
    }
}
