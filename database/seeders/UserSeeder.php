<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('password123'),
        ];
        if (User::where('email', '=', $data['email'])->count()==0) {
            DB::table('users')->insert(
                $data
            );
        }

        $dataClient = [
            'name' => 'Client',
            'email' => 'client@email.com',
            'password' => bcrypt('password123'),
        ];
        if (User::where('email', '=', $dataClient['email'])->count()==0) {
            DB::table('users')->insert(
                $dataClient
            );
        }
    }
}
