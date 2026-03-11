<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $programMua = Program::where('name', 'like', '%MUA%')->first();
        $programRambut = Program::where('name', 'like', '%Rambut%')->first();

        $testimonials = [
            [
                'name' => 'Kartika Putri',
                'type' => 'alumni',
                'program_id' => $programMua?->id,
                'content' => 'Belajar di LKP Yuwita sangat menyenangkan. Instrukturnya sabar dan telaten sehingga saya yang tadinya tidak mengerti makeup sama sekali sekarang bisa buka jasa MUA sendiri. Terima kasih Yuwita!',
                'photo' => null,
                'rating' => 5,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Rina Nose',
                'type' => 'pelanggan',
                'program_id' => null,
                'content' => 'Sering perawatan wajah dan rambut di salon Yuwita. Pelayanannya sangat memuaskan, tempatnya bersih dan nyaman. Terapisnya juga ramah-ramah.',
                'photo' => null,
                'rating' => 5,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Sinta Nuriyah',
                'type' => 'alumni',
                'program_id' => $programRambut?->id,
                'content' => 'Program Tata Kecantikan Rambut di sini benar-benar komprehensif. Mulai dari gunting dasar sampai pewarnaan advance diajarkan semua. Alhamdulillah lulus langsung diterima kerja di salon ternama.',
                'photo' => null,
                'rating' => 4,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Risa Saraswati',
                'type' => 'pelanggan',
                'program_id' => null,
                'content' => 'Langganan lulur dan spa di LKP Yuwita. Hasilnya selalu bikin rileks dan segar kembali. Harga juga sangat terjangkau dibanding salon lain.',
                'photo' => null,
                'rating' => 4,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
