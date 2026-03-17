<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $ginou   = Program::where('slug', 'ginou-manufaktur')->first();
        $tokutei = Program::where('slug', 'tokutei-makanan-minuman')->first();
        $nihongo = Program::where('slug', 'nihongo-n5-n4')->first();

        $testimonials = [
            [
                'name'       => 'Dimas Prasetyo',
                'type'       => 'alumni',
                'program_id' => $ginou?->id,
                'content'    => 'Alhamdulillah, berkat LPK Nakami saya berhasil berangkat ke Jepang dan bekerja di pabrik otomotif di Aichi. Pelatihannya sangat intensif dan instrukturnya benar-benar mempersiapkan kita dari mental sampai kemampuan bahasa. Terima kasih LPK Nakami!',
                'photo'      => null,
                'rating'     => 5,
                'order'      => 1,
                'is_active'  => true,
            ],
            [
                'name'       => 'Siti Rahmawati',
                'type'       => 'alumni',
                'program_id' => $tokutei?->id,
                'content'    => 'Saya ikut program Tokutei Ginou dan sekarang sudah satu tahun bekerja di industri pengolahan makanan di Osaka. Gajinya cukup untuk menabung dan kirim ke orang tua. Prosesnya transparan dan tidak ada biaya dadakan seperti yang saya khawatirkan.',
                'photo'      => null,
                'rating'     => 5,
                'order'      => 2,
                'is_active'  => true,
            ],
            [
                'name'       => 'Rizky Firmansyah',
                'type'       => 'alumni',
                'program_id' => $ginou?->id,
                'content'    => 'Awalnya ragu karena tidak bisa bahasa Jepang sama sekali. Tapi kelas Nihongo di Nakami benar-benar efektif. Dalam 6 bulan saya sudah bisa lulus tes dan berangkat ke Jepang. Sekarang kerja di pabrik elektronik di Kanagawa.',
                'photo'      => null,
                'rating'     => 5,
                'order'      => 3,
                'is_active'  => true,
            ],
            [
                'name'       => 'Nia Kurniasari',
                'type'       => 'alumni',
                'program_id' => $nihongo?->id,
                'content'    => 'Kelas bahasa Jepang di sini beda dari kursus biasa. Gurunya sangat sabar dan metode belajarnya menyenangkan. Sekarang saya sudah lulus N3 dan sedang proses berangkat program Tokutei Ginou.',
                'photo'      => null,
                'rating'     => 5,
                'order'      => 4,
                'is_active'  => true,
            ],
            [
                'name'       => 'Bagas Wicaksono',
                'type'       => 'alumni',
                'program_id' => $ginou?->id,
                'content'    => 'Tiga tahun di Jepang program Ginou Jisshusei adalah pengalaman yang tidak terlupakan. Saya belajar banyak tentang kedisiplinan dan etos kerja. Kini sudah pulang dan buka usaha sendiri dari tabungan selama di Jepang. LPK Nakami top!',
                'photo'      => null,
                'rating'     => 5,
                'order'      => 5,
                'is_active'  => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['name' => $testimonial['name'], 'type' => $testimonial['type']],
                $testimonial
            );
        }
    }
}
