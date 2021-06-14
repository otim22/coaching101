<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        $permissions = [
            'view-course',
            'create-course',
            'edit-course',
            'delete-course',
            'publish-course',
            'unpublish-course',
        ];

        $roles = [
            'student' => [
                'view-course'
            ],
            'teacher' => [
                'view-course',
                'create-course',
                'edit-course',
                'delete-course'
            ],
            'admin' => [
                'view-course',
                'delete-course',
                'publish-course',
                'unpublish-course'
            ],
            'super-admin' => [
                'view-course',
                'create-course',
                'edit-course',
                'delete-course',
                'publish-course',
                'unpublish-course'
            ],
        ];

        $users = [
            'student' => [
                'name' => 'Otim student',
                'email' => 'student@gmail.com',
                'password' => bcrypt('password')
            ],
            'teacher' => [
                'name' => 'Otim teacher',
                'email' => 'teacher@gmail.com',
                'password' => bcrypt('password')
            ],
            'admin' => [
                'name' => 'Otim admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password')
            ],
            'super-admin' => [
                'name' => 'Otim deere',
                'email' => 'super@gmail.com',
                'password' => bcrypt('password')
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create roles and assign existing permissions
        foreach ($roles as $key => $role) {
            $newRole = Role::create(['name' => $key]);
            $newRole->givePermissionTo($role);
        }

        // create a user
        foreach ($users as $key => $user) {
            $newUser = Factory(User::class)->create($user);
            $newUser->assignRole($key);
            if($key == 'teacher') {
                $newUser->standards()->attach(1);
            }
        }
    }
}
