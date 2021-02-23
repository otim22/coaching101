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
        $teachers = factory(User::class, 20)->create(['role' => 2]);
    }
}
