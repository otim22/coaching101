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
        $this->createUsers(20, 'student');
        $this->createUsers(20, 'teacher');
    }

    protected function createUsers($number, $role)
    {
        for ($i = 0; $i < $number; $i ++) {
            $newUser = Factory(User::class)->create();
            $newUser->assignRole($role);
            if($role == 'teacher') {
                $id = $i < 10 ? 1 : 2;
                $newUser->standards()->attach($id);
            }
        }
    }
}
