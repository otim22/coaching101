<?php

namespace Database\Seeders;

use App\Models\Survey;
use App\Models\SurveyQuestion;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SurveyQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SurveyQuestion::class)->create([
            'question' => 'What kind of teaching have you done before?',
            'survey_id' => Survey::all()->random()->id
        ]);
        factory(SurveyQuestion::class)->create([
            'question' => 'How exeperienced are you at videos?',
            'survey_id' => Survey::all()->random()->id
        ]);
        factory(SurveyQuestion::class)->create([
            'question' => 'Do you have an audience?',
            'survey_id' => Survey::all()->random()->id
        ]);
    }
}
