<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Subject::class, 50)
                    ->create();

        // $faker = Faker::create();
        // $imageUrl = $faker->imageUrl(640,480, null, false);
        // dd($imageUrl);
        // foreach($subjects as $subject) {
        //     $subject->addMediaFromUrl($imageUrl)->toMediaCollection('images');
        // }
    }
}
