<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\TeacherImage;
use Illuminate\Database\Seeder;

class TeacherImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacherImage = factory(TeacherImage::class)->create([
            'title' => 'Become a teacher',
            'description' => 'Top teachers from the best, teaching millions of students. We provide the platform and tools so you can skill the students.',
            'button_text' => 'Get started'
        ]);

        $faker = Faker::create();
        $imageUrl = 'http://via.placeholder.com/800x650';

        $teacherImage->addMediaFromUrl($imageUrl)->toMediaCollection('default');
    }
}
