<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
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

        factory(User::class)->create([
            'name' => 'Student deere',
            'email' => 'student@gmail.com',
            'role' => $studentRole
        ]);

        factory(User::class)->create([
            'name' => 'Teacher deere',
            'email' => 'teacher@gmail.com',
            'role' => $teacherRole
        ]);

        factory(User::class)->create([
            'name' => 'Admin John',
            'email' => 'admin@gmail.com',
            'role' => $adminRole
        ]);

        factory(User::class)->create([
            'name' => 'Otim deere',
            'email' => 'superdeere@gmail.com',
            'role' => $superRole
        ]);
    }
}
