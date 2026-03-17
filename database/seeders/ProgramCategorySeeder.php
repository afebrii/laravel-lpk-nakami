<?php

namespace Database\Seeders;

use App\Models\ProgramCategory;
use Illuminate\Database\Seeder;

class ProgramCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'        => 'Ginou Jisshusei',
                'slug'        => 'ginou-jisshusei',
                'type'        => 'ginou-jisshusei',
                'description' => 'Program pemagangan kerja di Jepang dengan transfer teknologi dan keterampilan. Durasi 3 tahun.',
            ],
            [
                'name'        => 'Tokutei Ginou',
                'slug'        => 'tokutei-ginou',
                'type'        => 'tokutei-ginou',
                'description' => 'Program pekerja bersertifikat keahlian dengan hak setara pekerja lokal Jepang. Tersedia di 14 sektor industri.',
            ],
            [
                'name'        => 'Engineering',
                'slug'        => 'engineering',
                'type'        => 'engineering',
                'description' => 'Pelatihan teknik (Mesin, Listrik, Konstruksi, Otomotif, IT) untuk visa kerja Jepang. Minimal D3/S1.',
            ],
            [
                'name'        => 'Nihongo Gakkou',
                'slug'        => 'nihongo-gakkou',
                'type'        => 'nihongo-gakkou',
                'description' => 'Kelas bahasa Jepang intensif dari level N5 hingga siap wawancara dan kehidupan di Jepang.',
            ],
        ];

        foreach ($categories as $category) {
            ProgramCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
