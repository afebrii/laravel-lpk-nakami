<?php

namespace Database\Seeders;

use App\Models\ProgramCategory;
use Illuminate\Database\Seeder;

class ProgramCategorySeeder extends Seeder
{
    public function run(): void
    {
        ProgramCategory::create([
            'name' => 'Kelas Reguler',
            'slug' => 'kelas-reguler',
            'type' => 'reguler',
            'description' => 'Program pelatihan reguler dengan biaya terjangkau. Cocok untuk pemula yang ingin mempelajari dasar-dasar kecantikan.',
        ]);

        ProgramCategory::create([
            'name' => 'Kelas Khusus',
            'slug' => 'kelas-khusus',
            'type' => 'khusus',
            'description' => 'Program pelatihan intensif dan mendalam, dilengkapi sertifikasi khusus. Untuk yang ingin menjadi profesional di bidang kecantikan.',
        ]);
    }
}
