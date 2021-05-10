<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class)->create([
            'name' => 'Sciences',
        ]);

        factory(Category::class)->create([
            'name' => 'Mathematics',
        ]);

        factory(Category::class)->create([
            'name' => 'Chemistry',
        ]);

        factory(Category::class)->create([
            'name' => 'Literature',
        ]);

        factory(Category::class)->create([
            'name' => 'Political sciences',
        ]);

        factory(Category::class)->create([
            'name' => 'Physics',
        ]);

        factory(Category::class)->create([
            'name' => 'Languages',
        ]);

        factory(Category::class)->create([
            'name' => 'History',
        ]);

        factory(Category::class)->create([
            'name' => 'Social studies',
        ]);

        factory(Category::class)->create([
            'name' => 'Vocational subjects',
        ]);
    }
}
