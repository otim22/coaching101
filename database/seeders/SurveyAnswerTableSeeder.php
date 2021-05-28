<?php

namespace Database\Seeders;

use App\Models\Survey;
use Faker\Factory as Faker;
use App\Models\SurveyAnswer;
use Illuminate\Database\Seeder;
use App\Models\SurveyQuestion;

class SurveyAnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surveyAnswers = [
            ['In Person Professionally', 'In Person Informally', 'Online', 'Other'],
            ['I am a beginner', 'I have intermidiate knowledge', 'I am exeperienced', 'I have videos ready to start'],
            ["I am a beginner, i don't have", "I have some audience", "I have enough audience", "I am not sure"]
        ];
        foreach ($surveyAnswers as $key => $surveyAnswer) {
            factory(SurveyAnswer::class)->create([
                'answer' => json_encode($surveyAnswer),
                'survey_question_id' => SurveyQuestion::find($key+1)
            ]);
        }
    }
}
