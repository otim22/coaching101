<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\StudentImage;
use Illuminate\Database\Seeder;

class StudentImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studentImage = factory(StudentImage::class)->create([
            'title' => 'Start learning today',
            'description' => 'Tap from the experience of handpicked best teachers around and ace that examination you have all been waiting to do.',
            'button_text' => 'Get started'
        ]);

        $faker = Faker::create();
        $imageUrl = 'http://via.placeholder.com/800x650';

        $studentImage->addMediaFromUrl($imageUrl)->toMediaCollection('default');
    }
}
