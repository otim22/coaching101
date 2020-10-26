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
        $user = Factory(User::class)->create([
            'name' => 'Otim student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($studentRole);

        // create a teacher user
        $user = Factory(User::class)->create([
            'name' => 'Otim teacher',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($teacherRole);

        // create an admin user
        $user = Factory(User::class)->create([
            'name' => 'Otim admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($adminRole);

        // create a super admin user
        $user = Factory(User::class)->create([
            'name' => 'Otim deere',
            'email' => 'super@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($superRole);
    }
}
