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
        $cambridge = 1;
        $uneb = 2;
        $categories = [
            'Sciences', 'Mathematics', 'Chemistry', 'Literature',  'Political sciences',
            'Physics', 'Languages', 'History', 'Social studies', 'Vocational subjects'
        ];

        foreach($categories as $category) {
            $newCategory = factory(Category::class)->create([
                'name' => $category
            ]);
            if($newCategory->id <= 5) {
                $newCategory->standards()->attach($cambridge);
            }
            $newCategory->standards()->attach($uneb);
        }
    }
}
