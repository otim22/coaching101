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
        factory(SurveyAnswer::class)->create([
            'answer' => json_encode(['In Person Professionally', 'In Person Informally', 'Online', 'Other']),
            'survey_question_id' => SurveyQuestion::find(1)
        ]);
        factory(SurveyAnswer::class)->create([
            'answer' => json_encode(['I am a beginner', 'I have intermidiate knowledge', 'I am exeperienced', 'I have videos ready to start']),
            'survey_question_id' => SurveyQuestion::find(2)
        ]);
        factory(SurveyAnswer::class)->create([
            'answer' => json_encode(["I am a beginner, i don't have", "I have some audience", "I have enough audience", "I am not sure"]),
            'survey_question_id' => SurveyQuestion::find(3)
        ]);
    }
}
