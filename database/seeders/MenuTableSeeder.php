<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Menu::class)->create([
            'title' => 'Sciences',
        ]);
        factory(Menu::class)->create([
            'title' => 'Mathematics',
        ]);
        factory(Menu::class)->create([
            'title' => 'Languages',
        ]);
        factory(Menu::class)->create([
            'title' => 'History',
        ]);
        factory(Menu::class)->create([
            'title' => 'Social studies',
        ]);
        factory(Menu::class)->create([
            'title' => 'Vocational subjects',
        ]);
    }
}
