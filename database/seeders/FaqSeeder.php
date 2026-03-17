<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Apa itu program Ginou Jisshusei?',
                'answer'   => 'Ginou Jisshusei (技能実習) adalah program pemagangan kerja di Jepang selama 3 tahun. Peserta bekerja di perusahaan Jepang sambil mendapatkan transfer teknologi dan keterampilan. Program ini dikelola secara resmi dan diakui oleh pemerintah Jepang dan Indonesia.',
                'category' => 'Program',
                'order'    => 1,
            ],
            [
                'question' => 'Apa perbedaan Ginou Jisshusei dan Tokutei Ginou?',
                'answer'   => 'Ginou Jisshusei adalah program pemagangan (magang kerja) selama 3 tahun dengan tujuan transfer teknologi. Tokutei Ginou adalah program pekerja bersertifikat keahlian yang mendapat hak setara pekerja lokal Jepang, dapat dilanjutkan hingga 5 tahun, dan untuk sektor tertentu bisa membawa keluarga.',
                'category' => 'Program',
                'order'    => 2,
            ],
            [
                'question' => 'Apa persyaratan umum untuk mendaftar program ke Jepang?',
                'answer'   => 'Persyaratan umum: usia 18–30 tahun (tergantung program), pendidikan minimal SMA/SMK, sehat jasmani dan rohani, bebas narkoba, tidak buta warna (untuk beberapa sektor), dan tidak memiliki tato. Persyaratan spesifik berbeda per program, hubungi admin kami untuk detail.',
                'category' => 'Pendaftaran',
                'order'    => 3,
            ],
            [
                'question' => 'Berapa biaya yang dibutuhkan untuk ikut program Ginou Jisshusei?',
                'answer'   => 'Biaya program bervariasi dan mencakup biaya pelatihan, dokumen, dan pengurusan visa. Kami tidak menarik biaya di awal yang tidak wajar. Untuk informasi biaya detail dan transparan, silakan hubungi admin kami melalui WhatsApp atau datang langsung ke kantor.',
                'category' => 'Biaya',
                'order'    => 4,
            ],
            [
                'question' => 'Berapa gaji yang bisa didapat saat bekerja di Jepang?',
                'answer'   => 'Gaji di Jepang mengikuti UMR (Minimum Wage) prefektur setempat. Rata-rata gaji untuk program Ginou Jisshusei sekitar ¥150,000–¥200,000/bulan (±Rp15–20 juta). Untuk Tokutei Ginou dan Engineering bisa lebih tinggi. Gaji sudah mencakup tunjangan dan lembur.',
                'category' => 'Program',
                'order'    => 5,
            ],
            [
                'question' => 'Apakah wajib bisa bahasa Jepang sebelum mendaftar?',
                'answer'   => 'Tidak harus bisa bahasa Jepang terlebih dahulu. Kami menyediakan program Nihongo Gakkou (kelas bahasa Jepang) untuk mempersiapkan peserta dari level N5 hingga siap wawancara. Namun untuk program Tokutei Ginou dan Engineering, kemampuan bahasa Jepang (min. N4/N3) akan sangat membantu.',
                'category' => 'Program',
                'order'    => 6,
            ],
            [
                'question' => 'Bagaimana cara mendaftar di LPK Nakami?',
                'answer'   => 'Anda bisa mendaftar melalui: (1) Form pendaftaran online di halaman Pendaftaran website ini, (2) Menghubungi admin via WhatsApp di +62 819-3164-6314, atau (3) Datang langsung ke kantor kami di Citra Graha Residence Blok H26, Tasikmalaya. Tim kami siap membantu konsultasi gratis.',
                'category' => 'Pendaftaran',
                'order'    => 7,
            ],
            [
                'question' => 'Berapa lama proses seleksi dan keberangkatan?',
                'answer'   => 'Proses dari pendaftaran hingga keberangkatan biasanya memakan waktu 6–12 bulan, meliputi: seleksi awal, pelatihan bahasa Jepang, pelatihan fisik, pengurusan dokumen & visa, serta interview dengan perusahaan Jepang. Waktu bisa berbeda tergantung program dan ketersediaan lowongan.',
                'category' => 'Pendaftaran',
                'order'    => 8,
            ],
            [
                'question' => 'Apakah ada jaminan kerja setelah mengikuti program?',
                'answer'   => 'Kami memiliki jaringan mitra perusahaan di Jepang yang aktif membuka lowongan. Peserta yang lulus seleksi dan pelatihan akan dipertemukan dengan perusahaan mitra melalui proses interview. Tingkat keberhasilan pemberangkatan kami mencapai 95%.',
                'category' => 'Program',
                'order'    => 9,
            ],
            [
                'question' => 'Apa itu program Engineering dan siapa yang bisa mendaftar?',
                'answer'   => 'Program Engineering (エンジニアリング) adalah jalur kerja di Jepang untuk lulusan D3/S1 bidang teknik (mesin, listrik, sipil, IT, otomotif, dll). Visa yang digunakan adalah Tokkou (Engineer/Specialist in Humanities). Peserta bekerja sebagai profesional teknik dengan gaji kompetitif.',
                'category' => 'Program',
                'order'    => 10,
            ],
            [
                'question' => 'Apa saja level kelas Nihongo Gakkou yang tersedia?',
                'answer'   => 'Kami menyediakan kelas bahasa Jepang dari level N5 (pemula) hingga N3. Tersedia kelas intensif N5-N4 untuk pemula, dan kelas persiapan wawancara kerja untuk yang sudah memiliki dasar. Kelas tersedia pagi dan sore hari.',
                'category' => 'Program',
                'order'    => 11,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                array_merge($faq, ['is_active' => true])
            );
        }
    }
}
