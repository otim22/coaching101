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
            'slug' => 'sciences',
        ]);

        factory(Category::class)->create([
            'name' => 'Mathematics',
            'slug' => 'mathematics',
        ]);

        factory(Category::class)->create([
            'name' => 'Chemistry',
            'slug' => 'chemistry',
        ]);

        factory(Category::class)->create([
            'name' => 'Literature',
            'slug' => 'literature',
        ]);

        factory(Category::class)->create([
            'name' => 'Political sciences',
            'slug' => 'political_sciences',
        ]);

        factory(Category::class)->create([
            'name' => 'Physics',
            'slug' => 'physics',
        ]);

        factory(Category::class)->create([
            'name' => 'Languages',
            'slug' => 'languages',
        ]);

        factory(Category::class)->create([
            'name' => 'History',
            'slug' => 'history',
        ]);

        factory(Category::class)->create([
            'name' => 'Social studies',
            'slug' => 'social_studies',
        ]);

        factory(Category::class)->create([
            'name' => 'Vocational subjects',
            'slug' => 'vocational_subjects',
        ]);
    }
}
