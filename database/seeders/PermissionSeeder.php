<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
        ];

        foreach ($permissions as $permission) {
            if (Permission::where('name', '=', $permission)->count() == 0) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
