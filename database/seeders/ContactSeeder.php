<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'phone' => '081234567890',
                'subject' => 'Tanya Jadwal MUA',
                'message' => 'Halo min, untuk kelas MUA Reguler bulan depan jadwalnya hari apa saja ya?',
                'is_read' => false,
                'created_at' => now()->subHours(2),
            ],
            [
                'name' => 'Siti Aisyah',
                'email' => 'siti.aisyah@example.com',
                'phone' => '081987654321',
                'subject' => 'Syarat Pendaftaran',
                'message' => 'Apakah ada batasan usia untuk mendaftar kelas Rias Pengantin Khusus?',
                'is_read' => true,
                'created_at' => now()->subDays(1),
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi.lestari@example.com',
                'phone' => '087711223344',
                'subject' => 'Kerjasama Salon',
                'message' => 'Selamat siang, apakah LKP Yuwita menerima tawaran kerjasama untuk penyaluran lulusan ke salon kami?',
                'is_read' => true,
                'created_at' => now()->subDays(3),
            ],
            [
                'name' => 'Ahmad Reza',
                'email' => 'ahmad.reza@example.com',
                'phone' => '085566778899',
                'subject' => 'Layanan Potong Rambut',
                'message' => 'Apakah besok pagi jam 9 salon buka? Saya ingin booking layanan potong rambut dan cuci catok.',
                'is_read' => false,
                'created_at' => now()->subMinutes(30),
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}
