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

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create roles and assign existing permissions
        $studentRole = Role::create(['name' => 'student']);
        $studentRole->givePermissionTo('view-course');

        $teacherRole = Role::create(['name' => 'teacher']);
        $teacherRole->givePermissionTo('view-course');
        $teacherRole->givePermissionTo('create-course');
        $teacherRole->givePermissionTo('edit-course');
        $teacherRole->givePermissionTo('delete-course');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('publish-course');
        $adminRole->givePermissionTo('unpublish-course');

        $superRole = Role::create(['name' => 'super-admin']);
        $superRole->givePermissionTo('view-course');
        $superRole->givePermissionTo('create-course');
        $superRole->givePermissionTo('edit-course');
        $superRole->givePermissionTo('delete-course');
        $superRole->givePermissionTo('publish-course');
        $superRole->givePermissionTo('unpublish-course');

        // create a student user
        $student= Factory(User::class)->create([
            'name' => 'Otim student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('password'),
            'role' => $studentRole->name
        ]);

        // create a teacher user
        $teacher = Factory(User::class)->create([
            'name' => 'Otim teacher',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('password'),
            'role' => $teacherRole->name
        ]);

        // create an admin user
        $admin = Factory(User::class)->create([
            'name' => 'Otim admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => $adminRole->name
        ]);

        // create a super admin user
        $super = Factory(User::class)->create([
            'name' => 'Otim deere',
            'email' => 'super@gmail.com',
            'password' => bcrypt('password'),
            'role' => $superRole->name
        ]);
    }
}
