<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            ['question' => 'Bagaimana cara mendaftar program pelatihan?', 'answer' => 'Anda bisa mendaftar secara online melalui halaman Pendaftaran di website ini, atau datang langsung ke kantor kami di Jl. Leuwianyar No. 107, Kota Tasikmalaya. Anda juga bisa menghubungi admin via WhatsApp untuk konsultasi terlebih dahulu.', 'category' => 'Pendaftaran', 'order' => 1],
            ['question' => 'Apa saja dokumen yang diperlukan untuk mendaftar?', 'answer' => 'Dokumen yang diperlukan: KTP, Kartu Keluarga, Pas Foto 3x4, Email aktif, dan Nomor HP Ibu Kandung. Untuk program tertentu mungkin ada persyaratan tambahan seperti ijazah terakhir.', 'category' => 'Pendaftaran', 'order' => 2],
            ['question' => 'Apakah ada batasan usia untuk mengikuti pelatihan?', 'answer' => 'Secara umum tidak ada batasan usia khusus, namun peserta minimal berusia 17 tahun. Untuk program tertentu mungkin ada ketentuan usia yang berbeda.', 'category' => 'Pendaftaran', 'order' => 3],
            ['question' => 'Apakah pelatihan ini bersertifikat resmi?', 'answer' => 'Ya, semua program pelatihan kami memberikan sertifikat resmi yang diakui secara nasional. Sertifikat diberikan setelah peserta menyelesaikan seluruh materi dan lulus ujian akhir.', 'category' => 'Sertifikasi', 'order' => 4],
            ['question' => 'Berapa lama durasi masing-masing program?', 'answer' => 'Durasi bervariasi tergantung program. Kelas Reguler umumnya 2-3 bulan, sedangkan Kelas Khusus 6 bulan. Detail durasi bisa dilihat di halaman masing-masing program.', 'category' => 'Program Pelatihan', 'order' => 5],
            ['question' => 'Apakah bisa dicicil atau ada beasiswa?', 'answer' => 'Untuk informasi cicilan dan beasiswa, silakan hubungi admin kami via WhatsApp. Kami juga memiliki program pelatihan gratis untuk masyarakat kurang mampu melalui kerjasama dengan pemerintah.', 'category' => 'Biaya', 'order' => 6],
            ['question' => 'Apakah ada program gratis?', 'answer' => 'Ya, kami memiliki program pelatihan gratis yang diselenggarakan melalui kerjasama dengan pemerintah dan dinas terkait. Informasi program gratis diumumkan secara berkala di website dan media sosial kami.', 'category' => 'Biaya', 'order' => 7],
            ['question' => 'Setelah lulus apakah langsung bisa kerja?', 'answer' => 'Kami memiliki jaringan mitra perusahaan lokal dan nasional yang siap menyerap lulusan kami. Selain itu, kami juga memberikan bimbingan untuk memulai usaha mandiri di bidang kecantikan.', 'category' => 'Program Pelatihan', 'order' => 8],
            ['question' => 'Apakah ada magang setelah pelatihan?', 'answer' => 'Ya, beberapa program menyediakan kesempatan magang di salon mitra kami. Magang ini menjadi bagian dari proses pembelajaran untuk mempersiapkan peserta memasuki dunia kerja.', 'category' => 'Program Pelatihan', 'order' => 9],
            ['question' => 'Bagaimana cara reservasi layanan salon?', 'answer' => 'Anda bisa melakukan reservasi melalui WhatsApp atau datang langsung ke salon kami. Jam operasional salon: Senin - Sabtu, 08.00 - 17.00 WIB.', 'category' => 'Layanan Salon', 'order' => 10],
            ['question' => 'Apakah bisa daftar lebih dari satu program?', 'answer' => 'Ya, Anda bisa mendaftar lebih dari satu program sekaligus atau secara bertahap. Silakan konsultasikan dengan admin kami untuk mendapatkan jadwal yang sesuai.', 'category' => 'Pendaftaran', 'order' => 11],
        ];

        foreach ($faqs as $faq) {
            Faq::create(array_merge($faq, ['is_active' => true]));
        }
    }
}
