<?php

namespace Database\Seeders;

use App\Models\TargetStudent;
use Illuminate\Database\Seeder;

class TargetStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TargetStudent::class, 50)->create();
    }
}
