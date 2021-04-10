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
            YearTableSeeder::class,
            TermTableSeeder::class,
            SubjectTableSeeder::class,
            ItemTableSeeder::class,
            ItemContentTableSeeder::class,
            MessageTableSeeder::class,
            AudienceTableSeeder::class,
            ProfileTableSeeder::class,
            StudentImageTableSeeder::class,
            TeacherImageTableSeeder::class,
            FaqTableSeeder::class,
            BookTableSeeder::class,
            NoteTableSeeder::class,
            PastpaperTableSeeder::class,
            QuestionTableSeeder::class,
        ]);
    }
}
