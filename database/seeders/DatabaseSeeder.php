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
            PermissionTableSeeder::class,
            UserTableSeeder::class,
            SliderTableSeeder::class,
            CategoryTableSeeder::class,
            MenuTableSeeder::class,
            YearTableSeeder::class,
            TermTableSeeder::class,
            SubjectTableSeeder::class,
            // RatingTableSeeder::class,
            SubjectSubscriptionTableSeeder::class,
            MessageTableSeeder::class,
            AudienceTableSeeder::class,
            StudentImageTableSeeder::class,
            TeacherImageTableSeeder::class,
            FaqTableSeeder::class,
        ]);
    }
}
