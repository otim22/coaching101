<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StandardTableSeeder::class,
            PermissionTableSeeder::class,
            UserTableSeeder::class,
            SliderTableSeeder::class,
            CategoryTableSeeder::class,
            LevelTableSeeder::class,
            YearTableSeeder::class,
            TermTableSeeder::class,
            CurrencyTableSeeder::class,
            ItemTableSeeder::class,
            ItemContentTableSeeder::class,
            MessageTableSeeder::class,
            AudienceTableSeeder::class,
            ProfileTableSeeder::class,
            SurveyTableSeeder::class,
            SurveyQuestionTableSeeder::class,
            SurveyAnswerTableSeeder::class,
            StudentImageTableSeeder::class,
            TeacherImageTableSeeder::class,
            FaqTableSeeder::class,
            QuestionTableSeeder::class,
        ]);
    }
}
