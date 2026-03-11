<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Praktek Tata Rias Pengantin Sunda Siger',
                'category' => 'Kegiatan Kelas',
                'image' => 'default.png', // Placeholder image or assume null
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Hasil Karya Siswa Kelas Reguler MUA',
                'category' => 'Hasil Karya',
                'image' => 'default.png',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Lomba Tata Rias Tingkat Provinsi 2025',
                'category' => 'Prestasi',
                'image' => 'default.png',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Suasana Kelas Tata Kecantikan Rambut',
                'category' => 'Kegiatan Kelas',
                'image' => 'default.png',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Ujian Kompetensi Bersama BNSP',
                'category' => 'Kegiatan Kelas',
                'image' => 'default.png',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Kunjungan Industri ke Pabrik Kosmetik',
                'category' => 'Lainnya',
                'image' => 'default.png',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
