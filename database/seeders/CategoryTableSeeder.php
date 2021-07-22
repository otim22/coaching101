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
            'Biology', 'Mathematics', 'Chemistry', 'Physics',  'English', 'French',
            'Swahili', 'Computer studies', 'History'
        ];

        foreach($categories as $category) {
            $newCategory = factory(Category::class)->create([
                'name' => $category
            ]);
            if($newCategory->id <= 7) {
                $newCategory->standards()->attach($cambridge);
            }
            $newCategory->standards()->attach($uneb);
        }
    }
}
