<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $ginou    = ProgramCategory::where('type', 'ginou-jisshusei')->first();
        $tokutei  = ProgramCategory::where('type', 'tokutei-ginou')->first();
        $engineer = ProgramCategory::where('type', 'engineering')->first();
        $nihongo  = ProgramCategory::where('type', 'nihongo-gakkou')->first();

        // === Ginou Jisshusei (技能実習) ===
        $ginouPrograms = [
            [
                'name'              => 'Ginou Jisshusei — Manufaktur',
                'slug'              => 'ginou-manufaktur',
                'short_description' => 'Program pemagangan di sektor manufaktur Jepang. Bekerja di pabrik pengolahan logam, plastik, tekstil, dan elektronik.',
                'description'       => '<p>Program Ginou Jisshusei (技能実習) sektor manufaktur mempersiapkan peserta untuk bekerja di berbagai pabrik di Jepang. Peserta akan mendapatkan pelatihan bahasa Jepang intensif, pelatihan fisik, dan pembekalan budaya kerja Jepang sebelum diberangkatkan.</p><ul><li>Usia: 18–30 tahun</li><li>Pendidikan: min. SMA/SMK</li><li>Bebas buta warna & tidak bertato</li><li>Kesehatan prima (bebas narkoba)</li></ul>',
                'duration'          => '3 Tahun',
                'schedule'          => 'Sesuai jadwal keberangkatan',
                'quota'             => 20,
                'price'             => 0,
                'is_free'           => true,
                'status'            => 'active',
                'order'             => 1,
            ],
            [
                'name'              => 'Ginou Jisshusei — Perikanan',
                'slug'              => 'ginou-perikanan',
                'short_description' => 'Program pemagangan di sektor perikanan dan pengolahan hasil laut di Jepang.',
                'description'       => '<p>Program Ginou Jisshusei (技能実習) sektor perikanan membuka peluang bagi peserta untuk bekerja di industri perikanan tangkap dan pengolahan hasil laut di Jepang. Peserta akan mendapatkan pembekalan bahasa Jepang dan budaya kerja.</p><ul><li>Usia: 18–30 tahun</li><li>Pendidikan: min. SMA/SMK</li><li>Tidak mabuk laut</li><li>Fisik kuat & sehat</li></ul>',
                'duration'          => '3 Tahun',
                'schedule'          => 'Sesuai jadwal keberangkatan',
                'quota'             => 15,
                'price'             => 0,
                'is_free'           => true,
                'status'            => 'active',
                'order'             => 2,
            ],
        ];

        foreach ($ginouPrograms as $program) {
            Program::updateOrCreate(
                ['slug' => $program['slug']],
                array_merge($program, ['category_id' => $ginou?->id])
            );
        }

        // === Tokutei Ginou (特定技能) ===
        $tokuteiPrograms = [
            [
                'name'              => 'Tokutei Ginou — Industri Makanan & Minuman',
                'slug'              => 'tokutei-makanan-minuman',
                'short_description' => 'Bekerja di industri pengolahan makanan dan minuman di Jepang dengan penghasilan setara pekerja lokal.',
                'description'       => '<p>Program Tokutei Ginou (特定技能) sektor makanan & minuman memberikan hak bekerja yang setara dengan pekerja lokal Jepang. Peserta wajib memiliki sertifikat keahlian dan kemampuan bahasa Jepang min. N4.</p><ul><li>Usia: 18–35 tahun</li><li>Pendidikan: min. SMA/SMK</li><li>JLPT min. N4 / lulus tes bahasa Jepang</li><li>Lulus tes keterampilan sektor makanan</li></ul>',
                'duration'          => '5 Tahun (dapat diperpanjang)',
                'schedule'          => 'Sesuai jadwal keberangkatan',
                'quota'             => 15,
                'price'             => 0,
                'is_free'           => true,
                'status'            => 'active',
                'order'             => 3,
            ],
            [
                'name'              => 'Tokutei Ginou — Perawatan Lansia',
                'slug'              => 'tokutei-perawatan-lansia',
                'short_description' => 'Berkarir sebagai caregiver profesional merawat lansia di fasilitas kesehatan Jepang.',
                'description'       => '<p>Program Tokutei Ginou (特定技能) sektor perawatan lansia (介護) sangat diminati di Jepang. Peserta akan dilatih sebagai caregiver profesional dan bekerja di panti jompo atau fasilitas perawatan di Jepang.</p><ul><li>Usia: 18–35 tahun</li><li>Pendidikan: min. SMA/SMK</li><li>JLPT min. N4</li><li>Memiliki empati tinggi & sabar</li></ul>',
                'duration'          => '5 Tahun (dapat diperpanjang)',
                'schedule'          => 'Sesuai jadwal keberangkatan',
                'quota'             => 10,
                'price'             => 0,
                'is_free'           => true,
                'status'            => 'active',
                'order'             => 4,
            ],
        ];

        foreach ($tokuteiPrograms as $program) {
            Program::updateOrCreate(
                ['slug' => $program['slug']],
                array_merge($program, ['category_id' => $tokutei?->id])
            );
        }

        // === Engineering (エンジニアリング) ===
        $engineeringPrograms = [
            [
                'name'              => 'Engineering — Teknik Mesin & Manufaktur',
                'slug'              => 'engineering-mesin',
                'short_description' => 'Jalur visa engineeering (Tokkou) untuk lulusan D3/S1 teknik mesin ke perusahaan manufaktur Jepang.',
                'description'       => '<p>Program Engineer (エンジニアリング) membuka jalur kerja di Jepang untuk lulusan D3/S1 jurusan teknik. Peserta dengan gelar teknik mesin/industri bisa bekerja di perusahaan manufaktur di Jepang dengan visa Tokkou (Engineer/Specialist in Humanities).</p><ul><li>Pendidikan: min. D3/S1 Teknik Mesin/Industri</li><li>JLPT min. N3 (direkomendasikan)</li><li>Usia: maks. 35 tahun</li></ul>',
                'duration'          => 'Kontrak 3–5 Tahun',
                'schedule'          => 'Sesuai jadwal keberangkatan',
                'quota'             => 10,
                'price'             => 0,
                'is_free'           => true,
                'status'            => 'active',
                'order'             => 5,
            ],
            [
                'name'              => 'Engineering — IT & Software',
                'slug'              => 'engineering-it',
                'short_description' => 'Karir sebagai software engineer / IT specialist di perusahaan teknologi Jepang.',
                'description'       => '<p>Program Engineer (エンジニアリング) jalur IT membuka peluang berkarir sebagai developer, programmer, atau IT specialist di perusahaan teknologi Jepang. Permintaan tenaga IT di Jepang terus meningkat setiap tahunnya.</p><ul><li>Pendidikan: min. D3/S1 Informatika/Sistem Informasi/Komputer</li><li>JLPT min. N3 (N2 lebih diutamakan)</li><li>Kemampuan coding: Python, Java, atau web dev</li></ul>',
                'duration'          => 'Kontrak 3–5 Tahun',
                'schedule'          => 'Sesuai jadwal keberangkatan',
                'quota'             => 10,
                'price'             => 0,
                'is_free'           => true,
                'status'            => 'active',
                'order'             => 6,
            ],
        ];

        foreach ($engineeringPrograms as $program) {
            Program::updateOrCreate(
                ['slug' => $program['slug']],
                array_merge($program, ['category_id' => $engineer?->id])
            );
        }

        // === Nihongo Gakkou (日本語学校) ===
        $nihongoPrograms = [
            [
                'name'              => 'Nihongo Gakkou — Kelas Intensif N5–N4',
                'slug'              => 'nihongo-n5-n4',
                'short_description' => 'Belajar bahasa Jepang dari nol hingga level N4. Cocok untuk pemula yang ingin mempersiapkan diri ke Jepang.',
                'description'       => '<p>Kelas Nihongo Gakkou (日本語学校) level N5–N4 adalah kelas bahasa Jepang intensif untuk pemula. Materi mencakup huruf hiragana, katakana, kosakata dasar, tata bahasa dasar, dan percakapan sehari-hari. Target lulusan siap ikut ujian JLPT N4.</p><ul><li>Tidak ada persyaratan bahasa sebelumnya</li><li>Usia: min. 17 tahun</li><li>Kelas pagi dan sore tersedia</li></ul>',
                'duration'          => '6 Bulan',
                'schedule'          => 'Senin – Jumat, 08.00–11.00 / 13.00–16.00 WIB',
                'quota'             => 25,
                'price'             => 2500000,
                'is_free'           => false,
                'status'            => 'active',
                'order'             => 7,
            ],
            [
                'name'              => 'Nihongo Gakkou — Kelas Persiapan Wawancara',
                'slug'              => 'nihongo-wawancara',
                'short_description' => 'Kelas khusus bahasa Jepang fokus persiapan wawancara kerja dan kehidupan di Jepang.',
                'description'       => '<p>Kelas persiapan wawancara dirancang untuk peserta yang sudah memiliki dasar bahasa Jepang dan ingin mempersiapkan diri menghadapi wawancara kerja dengan perusahaan Jepang. Materi mencakup simulasi wawancara, etika kerja Jepang, dan kehidupan sehari-hari di Jepang.</p><ul><li>Sudah memiliki dasar bahasa Jepang (N5)</li><li>Usia: min. 17 tahun</li></ul>',
                'duration'          => '3 Bulan',
                'schedule'          => 'Senin – Jumat, 09.00–12.00 WIB',
                'quota'             => 20,
                'price'             => 1500000,
                'is_free'           => false,
                'status'            => 'active',
                'order'             => 8,
            ],
        ];

        foreach ($nihongoPrograms as $program) {
            Program::updateOrCreate(
                ['slug' => $program['slug']],
                array_merge($program, ['category_id' => $nihongo?->id])
            );
        }
    }
}
