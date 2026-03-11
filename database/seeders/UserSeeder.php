<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@lkp-yuwita.com',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Staff Yuwita',
            'email' => 'staff@lkp-yuwita.com',
            'password' => bcrypt('password'),
            'role' => 'staff',
            'is_active' => true,
        ]);
    }
}
