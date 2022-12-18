<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        $adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'Client']);

        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users'
        ]);

        $editorRole->givePermissionTo([

        ]);

        $userAdmin = User::where('email', '=', 'admin@email.com')->first();
        $userAdmin->assignRole('Admin');

        $userClient = User::where('email', '=', 'client@email.com')->first();
        $userClient->assignRole('Client');
    }
}
