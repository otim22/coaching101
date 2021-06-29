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
        $surveyAnswersQtnOne = ['In Person Professionally', 'In Person Informally', 'Online', 'Other'];
        $surveyAnswersQtnTwo = ['I am a beginner', 'I have intermidiate knowledge', 'I am exeperienced', 'I have videos ready to start'];
        $surveyAnswersQtnThree = ["I am a beginner, i don't have", "I have some audience", "I have enough audience", "I am not sure"];
        $qtnOne = 1;
        $qtnTwo = 2;
        $qtnThree = 3;

        foreach ($surveyAnswersQtnOne as $answer) {
            factory(SurveyAnswer::class)->create([
                'answer' =>$answer,
                'survey_question_id' => $qtnOne
            ]);
        }

        foreach ($surveyAnswersQtnTwo as $answer) {
            factory(SurveyAnswer::class)->create([
                'answer' =>$answer,
                'survey_question_id' => $qtnTwo
            ]);
        }

        foreach ($surveyAnswersQtnThree as $answer) {
            factory(SurveyAnswer::class)->create([
                'answer' =>$answer,
                'survey_question_id' => $qtnThree
            ]);
        }
    }
}
