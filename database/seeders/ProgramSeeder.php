<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $reguler = ProgramCategory::where('type', 'reguler')->first();
        $khusus = ProgramCategory::where('type', 'khusus')->first();

        // === Kelas Reguler ===
        $regulerPrograms = [
            [
                'name' => 'Make Up Artist (MUA)',
                'slug' => 'mua-reguler',
                'short_description' => 'Pelajari teknik dasar make up profesional untuk berbagai kebutuhan.',
                'description' => '<p>Program pelatihan Make Up Artist (MUA) reguler dirancang untuk pemula yang ingin menguasai teknik dasar tata rias wajah. Peserta akan belajar dari dasar skincare, penggunaan alat make up, hingga teknik make up natural dan formal.</p>',
                'duration' => '3 Bulan',
                'schedule' => 'Senin - Rabu, 09.00 - 12.00 WIB',
                'quota' => 20,
                'price' => 100000,
                'is_free' => false,
                'status' => 'active',
                'order' => 1,
            ],
            [
                'name' => 'Tata Kecantikan Rambut',
                'slug' => 'kecantikan-rambut-reguler',
                'short_description' => 'Kuasai teknik dasar perawatan dan penataan rambut profesional.',
                'description' => '<p>Program pelatihan tata kecantikan rambut reguler mencakup teknik dasar potong rambut, penataan, pewarnaan, dan perawatan rambut. Cocok untuk pemula yang ingin memulai karir di dunia hair styling.</p>',
                'duration' => '3 Bulan',
                'schedule' => 'Kamis - Sabtu, 09.00 - 12.00 WIB',
                'quota' => 20,
                'price' => 100000,
                'is_free' => false,
                'status' => 'active',
                'order' => 2,
            ],
            [
                'name' => 'Kecantikan Kulit',
                'slug' => 'kecantikan-kulit-reguler',
                'short_description' => 'Pelajari perawatan kulit wajah dan tubuh secara profesional.',
                'description' => '<p>Program pelatihan kecantikan kulit reguler mengajarkan teknik dasar facial, perawatan kulit wajah, dan body treatment. Peserta akan memahami jenis-jenis kulit dan perawatan yang tepat.</p>',
                'duration' => '3 Bulan',
                'schedule' => 'Senin - Rabu, 13.00 - 16.00 WIB',
                'quota' => 20,
                'price' => 100000,
                'is_free' => false,
                'status' => 'active',
                'order' => 3,
            ],
            [
                'name' => 'Hand Bouquet',
                'slug' => 'hand-bouquet-reguler',
                'short_description' => 'Belajar merangkai hand bouquet dan dekorasi bunga profesional.',
                'description' => '<p>Program pelatihan hand bouquet reguler mengajarkan teknik merangkai bunga untuk hand bouquet pernikahan, dekorasi meja, dan berbagai kebutuhan acara. Peserta akan belajar memilih bunga, teknik wrapping, dan desain kreatif.</p>',
                'duration' => '2 Bulan',
                'schedule' => 'Kamis - Sabtu, 13.00 - 16.00 WIB',
                'quota' => 15,
                'price' => 100000,
                'is_free' => false,
                'status' => 'active',
                'order' => 4,
            ],
        ];

        foreach ($regulerPrograms as $program) {
            Program::create(array_merge($program, ['category_id' => $reguler->id]));
        }

        // === Kelas Khusus ===
        $khususPrograms = [
            [
                'name' => 'Make Up Artist (MUA)',
                'slug' => 'mua-khusus',
                'short_description' => 'Pelatihan intensif MUA profesional dengan sertifikasi resmi.',
                'description' => '<p>Program pelatihan MUA khusus adalah program intensif yang dirancang untuk menghasilkan make up artist profesional. Materi mencakup teknik advanced make up, bridal make up, editorial make up, dan special effects. Dilengkapi dengan sertifikat resmi yang diakui nasional.</p>',
                'duration' => '6 Bulan',
                'schedule' => 'Senin - Jumat, 09.00 - 15.00 WIB',
                'quota' => 15,
                'price' => 3500000,
                'is_free' => false,
                'status' => 'active',
                'order' => 5,
            ],
            [
                'name' => 'Rias Pengantin',
                'slug' => 'rias-pengantin-khusus',
                'short_description' => 'Kuasai seni rias pengantin tradisional dan modern.',
                'description' => '<p>Program pelatihan rias pengantin khusus mengajarkan teknik tata rias pengantin tradisional Sunda, Jawa, dan modern. Peserta juga akan belajar penataan sanggul, hantaran, dan dekorasi pelaminan. Sertifikat resmi diberikan setelah lulus.</p>',
                'duration' => '6 Bulan',
                'schedule' => 'Senin - Jumat, 09.00 - 15.00 WIB',
                'quota' => 10,
                'price' => 5000000,
                'is_free' => false,
                'status' => 'active',
                'order' => 6,
            ],
            [
                'name' => 'Tata Kecantikan Rambut',
                'slug' => 'kecantikan-rambut-khusus',
                'short_description' => 'Pelatihan intensif hair styling profesional bersertifikasi.',
                'description' => '<p>Program tata kecantikan rambut khusus adalah pelatihan intensif mencakup teknik advanced cutting, coloring, perming, hair extension, dan bridal hair styling. Dilengkapi praktik langsung dengan klien salon.</p>',
                'duration' => '6 Bulan',
                'schedule' => 'Senin - Jumat, 09.00 - 15.00 WIB',
                'quota' => 15,
                'price' => 3500000,
                'is_free' => false,
                'status' => 'active',
                'order' => 7,
            ],
            [
                'name' => 'Kecantikan Kulit',
                'slug' => 'kecantikan-kulit-khusus',
                'short_description' => 'Pelatihan intensif skin care dan body treatment profesional.',
                'description' => '<p>Program kecantikan kulit khusus mengajarkan teknik advanced facial, chemical peeling, microdermabrasion, body spa, dan aromatherapy. Peserta akan mendapatkan sertifikat resmi dan siap bekerja di salon atau klinik kecantikan.</p>',
                'duration' => '6 Bulan',
                'schedule' => 'Senin - Jumat, 09.00 - 15.00 WIB',
                'quota' => 15,
                'price' => 3500000,
                'is_free' => false,
                'status' => 'active',
                'order' => 8,
            ],
        ];

        foreach ($khususPrograms as $program) {
            Program::create(array_merge($program, ['category_id' => $khusus->id]));
        }
    }
}
