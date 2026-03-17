<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@lpk-nakami.id'],
            [
                'name'      => 'Super Admin',
                'email'     => 'admin@lpk-nakami.id',
                'password'  => bcrypt('password'),
                'role'      => 'superadmin',
                'is_active' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@lpk-nakami.id'],
            [
                'name'      => 'Staff Nakami',
                'email'     => 'staff@lpk-nakami.id',
                'password'  => bcrypt('password'),
                'role'      => 'staff',
                'is_active' => true,
            ]
        );
    }
}
