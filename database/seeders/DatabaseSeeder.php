<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProgramCategorySeeder::class,
            ProgramSeeder::class,
            ServiceSeeder::class,
            SettingSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
