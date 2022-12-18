<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('roles')->where('name', '=', 'Admin')->count() == 0) {
            $id = DB::table('roles')->insertGetId(
                [
                    'name' => 'Admin',
                    'guard_name' => 'web',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            );
            $data = [];
            $permissions = DB::table('permissions')->get();
            foreach ($permissions as $permission) {
                $data[] = [
                    'permission_id' => $permission->id,
                    'role_id' => $id
                ];
            }
            DB::table('role_has_permissions')->insert($data);
            DB::table('model_has_roles')->insert(
                [
                    'role_id' => $id,
                    'model_id' => $id,
                    'model_type' => 'App\User'
                ]
            );
        } else {
            $role = DB::table('roles')->where('name', '=', 'Admin')->first();
            if ($role != null) {
                $data = [];
                $permissions = DB::table('permissions')->get();
                foreach ($permissions as $permission) {
                    if (DB::table('role_has_permissions')->where('role_id', $role->id)->where('permission_id', $permission->id)->first() == null) {
                        $data[] = [
                            'permission_id' => $permission->id,
                            'role_id' => $role->id
                        ];
                    }
                }
                DB::table('role_has_permissions')->insert($data);
            }
        }
    }
}
