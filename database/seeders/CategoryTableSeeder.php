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
        $standards = [$uneb, $cambridge];
        $categories = [
            $cambridge => [
                'Sciences', 'Mathematics', 'Chemistry', 'Literature', 'Physics', 'Languages'
            ],
            $uneb => [
                'Sciences', 'Mathematics', 'Chemistry', 'Literature',  'Political sciences',
                'Physics', 'Languages', 'History', 'Social studies', 'Vocational subjects'
            ]
        ];

        foreach($standards as $standard) {
            $standardCategories = $categories[$standard];

            foreach($standardCategories as $category) {
                $newCategory = factory(Category::class)->create([
                    'name' => $category
                ]);
                $newCategory->standards()->attach($standard);
            }
        }
    }
}
