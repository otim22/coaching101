<?php

namespace Database\Seeders;

use App\Models\Survey;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Survey::class)->create([
            'title' => 'So, you wanna share your knowledge?',
            'description' => 'Our classes are majorly video based that give students edge skills to excellence in life. Whether you are exeperienced or not, we will work together to give great value to students.'
        ]);
    }
}
