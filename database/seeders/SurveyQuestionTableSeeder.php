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
        $questions = [
            'What kind of teaching have you done before?',
            'How exeperienced are you at videos?',
            'Do you have an audience?'
        ];

        foreach ($questions as $question) {
            factory(SurveyQuestion::class)->create([
                'question' => $question,
                'survey_id' => Survey::all()->random()->id
            ]);
        }
    }
}
