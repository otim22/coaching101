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
            CategoryTableSeeder::class,
            SubjectTableSeeder::class,
            MessageTableSeeder::class,
            AudienceTableSeeder::class,
            SliderTableSeeder::class,
            MenuTableSeeder::class,
            RatingTableSeeder::class,
            StudentImageTableSeeder::class,
            TeacherImageTableSeeder::class,
        ]);
    }
}
