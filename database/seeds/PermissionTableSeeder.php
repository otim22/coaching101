<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
            'view-class',
            'create-class',
            'edit-class',
            'delete-class',
            'publish-class',
            'unpublish-class',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }

        // create roles and assign existing permissions
        $studentRole = Role::create(['name' => 'student']);
        $studentRole->givePermissionTo('view-class');

        $teacherRole = Role::create(['name' => 'teacher']);
        $teacherRole->givePermissionTo('view-class');
        $teacherRole->givePermissionTo('create-class');
        $teacherRole->givePermissionTo('edit-class');
        $teacherRole->givePermissionTo('delete-class');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('publish-class');
        $adminRole->givePermissionTo('unpublish-class');

        // create a demo user
        $user = Factory(App\User::class)->create([
            'name' => 'Otim admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12qwaszx'),
        ]);
        $user->assignRole($adminRole);
    }
}
