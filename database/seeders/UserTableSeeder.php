<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = factory(User::class, 20)->create(['role' => 1]);

        $imageUrl = 'http://via.placeholder.com/55x45';

        foreach($students as $student) {
            $student->addMediaFromUrl($imageUrl)->toMediaCollection('avatars');
        }

        $teachers = factory(User::class, 20)->create(['role' => 2]);
        foreach($teachers as $teacher) {
            $teacher->addMediaFromUrl($imageUrl)->toMediaCollection('avatars');
        }
    }
}
