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
            'view-subject',
            'create-subject',
            'edit-subject',
            'delete-subject',
            'publish-subject',
            'unpublish-subject',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create roles and assign existing permissions
        $studentRole = Role::create(['name' => 'student']);
        $studentRole->givePermissionTo('view-subject');

        $teacherRole = Role::create(['name' => 'teacher']);
        $teacherRole->givePermissionTo('view-subject');
        $teacherRole->givePermissionTo('create-subject');
        $teacherRole->givePermissionTo('edit-subject');
        $teacherRole->givePermissionTo('delete-subject');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('publish-subject');
        $adminRole->givePermissionTo('unpublish-subject');

        $superRole = Role::create(['name' => 'super-admin']);

        // create a student user
        $student= Factory(User::class)->create([
            'name' => 'Otim student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('password'),
            'role' => $studentRole
        ]);

        $imageUrl = 'http://via.placeholder.com/55x45';

        $student->addMediaFromUrl($imageUrl)->toMediaCollection('avatars');

        // create a teacher user
        $teacher = Factory(User::class)->create([
            'name' => 'Otim teacher',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('password'),
            'role' => $teacherRole
        ]);

        $teacher->addMediaFromUrl($imageUrl)->toMediaCollection('avatars');

        // create an admin user
        $admin = Factory(User::class)->create([
            'name' => 'Otim admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => $adminRole
        ]);

        $admin->addMediaFromUrl($imageUrl)->toMediaCollection('avatars');

        // create a super admin user
        $super = Factory(User::class)->create([
            'name' => 'Otim deere',
            'email' => 'super@gmail.com',
            'password' => bcrypt('password'),
            'role' => $superRole
        ]);

        $super->addMediaFromUrl($imageUrl)->toMediaCollection('avatars');
    }
}
