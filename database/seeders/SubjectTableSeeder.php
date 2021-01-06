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
        $subjects = factory(Subject::class, 100)->create();

        $imageUrl = 'http://via.placeholder.com/800x650';

        foreach ($subjects as $subject) {
            $subject->addMediaFromUrl($imageUrl)->toMediaCollection('default');
        }
    }
}
