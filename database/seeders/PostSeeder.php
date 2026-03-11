<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'superadmin')->first();

        $posts = [
            [
                'title' => '10 Tips Makeup Natural untuk Pemula',
                'slug' => '10-tips-makeup-natural-untuk-pemula',
                'excerpt' => 'Pelajari teknik dasar makeup natural yang cocok untuk sehari-hari. Panduan lengkap dari instruktur berpengalaman LKP Yuwita.',
                'content' => '<p>Makeup natural adalah teknik tata rias yang memberikan tampilan wajah segar dan alami. Berikut 10 tips yang bisa kamu praktikkan:</p><h2>1. Persiapkan Kulit dengan Skincare</h2><p>Sebelum mengaplikasikan makeup, pastikan kulit wajah sudah bersih dan terhidrasi. Gunakan moisturizer yang sesuai dengan jenis kulit Anda.</p><h2>2. Gunakan Primer</h2><p>Primer membantu makeup lebih tahan lama dan meratakan tekstur kulit. Aplikasikan tipis-tipis ke seluruh wajah.</p><h2>3. Pilih Foundation yang Sesuai</h2><p>Gunakan foundation dengan tekstur ringan dan warna yang sesuai dengan warna kulit Anda. Untuk tampilan natural, cukup gunakan di area yang memerlukan coverage.</p><h2>4. Concealer untuk Area Mata</h2><p>Aplikasikan concealer di bawah mata dengan gerakan menepuk menggunakan beauty sponge untuk hasil yang halus.</p><h2>5. Setting dengan Bedak Ringan</h2><p>Gunakan bedak tabur tipis-tipis untuk mengunci foundation tanpa membuat tampilan terlihat cakey.</p><h2>6. Alis Natural</h2><p>Isi alis dengan pensil alis berwarna senada dengan serabut alis menggunakan gerakan pendek-pendek.</p><h2>7. Eyeshadow Netral</h2><p>Pilih warna eyeshadow netral seperti cokelat muda, peach, atau champagne untuk tampilan mata yang hangat.</p><h2>8. Maskara Tipis</h2><p>Aplikasikan satu lapis maskara dari pangkal hingga ujung bulu mata. Cukup satu kali oles untuk tampilan natural.</p><h2>9. Blush On Cream</h2><p>Blush on cream memberikan efek natural dibandingkan blush on powder. Aplikasikan di apple of cheeks.</p><h2>10. Lip Tint atau Lip Balm</h2><p>Untuk finishing, gunakan lip tint warna nude atau lip balm berwarna untuk tampilan bibir sehat dan natural.</p><p>Dengan mengikuti tips di atas, Anda bisa tampil cantik natural sehari-hari. Ingin belajar lebih dalam? Bergabunglah di program pelatihan MUA di LKP Yuwita!</p>',
                'category' => 'Tips Kecantikan',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'LKP Yuwita Buka Pendaftaran Angkatan Baru 2026',
                'slug' => 'pendaftaran-angkatan-baru-2026',
                'excerpt' => 'Pendaftaran angkatan baru 2026 telah dibuka! Tersedia program kelas reguler dan kelas khusus dengan kuota terbatas.',
                'content' => '<p>LKP/LPK Yuwita dengan bangga membuka pendaftaran untuk angkatan baru tahun 2026. Kami menyediakan berbagai program pelatihan kecantikan yang dirancang untuk menghasilkan tenaga profesional berkompeten.</p><h2>Program yang Tersedia</h2><p>Kami menawarkan 8 program pelatihan yang terbagi dalam dua kategori:</p><h3>Kelas Reguler</h3><ul><li>Make Up Artist (MUA) - 3 Bulan</li><li>Tata Kecantikan Rambut - 3 Bulan</li><li>Kecantikan Kulit - 2 Bulan</li><li>Hand Bouquet & Corsage - 1 Bulan</li></ul><h3>Kelas Khusus</h3><ul><li>MUA Profesional - 6 Bulan</li><li>Rias Pengantin - 6 Bulan</li><li>Tata Rambut Profesional - 6 Bulan</li><li>Kecantikan Kulit Profesional - 4 Bulan</li></ul><h2>Keunggulan LKP Yuwita</h2><p>Dengan pengalaman lebih dari 18 tahun, LKP Yuwita telah meluluskan ribuan alumni yang sukses berkarir di industri kecantikan. Sertifikat yang kami berikan diakui secara nasional.</p><h2>Cara Mendaftar</h2><p>Kunjungi halaman pendaftaran kami atau hubungi admin melalui WhatsApp untuk informasi lebih lanjut.</p>',
                'category' => 'Berita',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Tutorial Sanggul Modern untuk Acara Formal',
                'slug' => 'tutorial-sanggul-modern-acara-formal',
                'excerpt' => 'Pelajari cara membuat sanggul modern yang elegan untuk acara formal. Step-by-step tutorial dari instruktur rambut LKP Yuwita.',
                'content' => '<p>Sanggul modern adalah salah satu gaya rambut yang paling diminati untuk acara formal seperti pernikahan, wisuda, atau pesta gala. Berikut tutorial lengkapnya:</p><h2>Alat dan Bahan yang Diperlukan</h2><ul><li>Sisir sasak</li><li>Jepit rambut (bobby pin) 20-30 buah</li><li>Bando invisible</li><li>Hair spray strong hold</li><li>Serum rambut</li><li>Hair donut atau padding</li></ul><h2>Langkah-Langkah</h2><h3>Step 1: Persiapan Rambut</h3><p>Keringkan rambut hingga 90%. Aplikasikan serum anti kusut untuk memberikan kilau sehat pada rambut.</p><h3>Step 2: Bagi Rambut</h3><p>Bagi rambut menjadi 3 section: bagian atas (crown), samping kiri, dan samping kanan.</p><h3>Step 3: Sasak Bagian Crown</h3><p>Ambil section rambut di bagian crown, sasak secara perlahan dari akar. Ini akan memberikan volume pada sanggul.</p><h3>Step 4: Bentuk Base Sanggul</h3><p>Satukan semua rambut di bagian belakang, buat ekor kuda rendah. Gunakan hair donut sebagai base sanggul.</p><h3>Step 5: Rapikan dan Semprot</h3><p>Rapikan rambut menutupi hair donut, jepit dengan bobby pin. Semprot dengan hair spray untuk ketahanan.</p><p>Jika ingin belajar lebih banyak teknik sanggul dan styling rambut, bergabunglah di program Tata Kecantikan Rambut di LKP Yuwita!</p>',
                'category' => 'Tutorial',
                'is_published' => true,
                'published_at' => now()->subDays(8),
            ],
            [
                'title' => 'Mengenal Sertifikasi BNSP untuk Profesi Kecantikan',
                'slug' => 'mengenal-sertifikasi-bnsp-profesi-kecantikan',
                'excerpt' => 'Apa itu sertifikasi BNSP? Mengapa penting bagi profesional kecantikan? Simak penjelasan lengkapnya di artikel ini.',
                'content' => '<p>Badan Nasional Sertifikasi Profesi (BNSP) adalah lembaga pemerintah yang bertanggung jawab atas sertifikasi kompetensi kerja di Indonesia. Bagi para profesional di bidang kecantikan, memiliki sertifikasi BNSP adalah keunggulan kompetitif yang signifikan.</p><h2>Apa Itu Sertifikasi BNSP?</h2><p>Sertifikasi BNSP adalah pengakuan formal terhadap kompetensi seseorang dalam bidang tertentu. Sertifikasi ini diberikan setelah seseorang lulus uji kompetensi yang dilakukan oleh Lembaga Sertifikasi Profesi (LSP) yang telah diakreditasi oleh BNSP.</p><h2>Manfaat Sertifikasi BNSP</h2><ul><li><strong>Pengakuan Nasional</strong> - Sertifikasi berlaku di seluruh Indonesia</li><li><strong>Kredibilitas</strong> - Meningkatkan kepercayaan klien</li><li><strong>Peluang Karir</strong> - Memperluas kesempatan kerja</li><li><strong>Standar Kompetensi</strong> - Menjamin kualitas layanan</li></ul><h2>Program di LKP Yuwita</h2><p>LKP Yuwita bekerja sama dengan LSP terkait untuk memfasilitasi sertifikasi BNSP bagi lulusannya. Alumni kami mendapatkan bimbingan persiapan ujian kompetensi.</p>',
                'category' => 'Info Program',
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Tren Makeup Pengantin 2026: Glowing & Natural',
                'slug' => 'tren-makeup-pengantin-2026',
                'excerpt' => 'Apa saja tren makeup pengantin di tahun 2026? Dari glass skin hingga bold lips, simak prediksi tren terbaru.',
                'content' => '<p>Dunia makeup pengantin terus berkembang setiap tahunnya. Di tahun 2026, tren mengarah pada tampilan yang lebih natural namun tetap glowing dan memukau. Berikut beberapa tren yang diprediksi akan mendominasi:</p><h2>1. Glass Skin Foundation</h2><p>Teknik glass skin yang populer dari Korea tetap menjadi favorit. Foundation dewwy dengan efek kaca memberikan tampilan kulit yang sehat dan bercahaya.</p><h2>2. Soft Glam Eyes</h2><p>Eyeshadow dengan shimmer halus dan warna-warna warm tone seperti rose gold, champagne, dan bronze. Efek smoked out yang lembut menggantikan cut crease yang dramatis.</p><h2>3. Bold Lips Comeback</h2><p>Setelah era lip tint dan nude lips, warna bibir berani seperti red berries dan deep rose kembali diminati, terutama untuk pengantin yang menginginkan tampilan statement.</p><h2>4. Fluffy Brows</h2><p>Alis tebal dan natural ala laminated brows menjadi pilihan utama. Teknik ini memberikan dimensi dan framing wajah yang sempurna.</p><h2>5. Minimal Contouring</h2><p>Contouring heavy mulai ditinggalkan. Pengantin lebih memilih teknik strobing dan highlighting ringan untuk memberikan dimensi alami pada wajah.</p><p>Ingin menguasai teknik-teknik di atas? Ikuti Program Rias Pengantin Profesional di LKP Yuwita!</p>',
                'category' => 'Tips Kecantikan',
                'is_published' => true,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Alumni LKP Yuwita Raih Penghargaan di Kompetisi MUA Nasional',
                'slug' => 'alumni-raih-penghargaan-kompetisi-mua-nasional',
                'excerpt' => 'Kabar membanggakan! Alumni LKP Yuwita berhasil meraih juara di kompetisi Make Up Artist tingkat nasional.',
                'content' => '<p>Kami dengan bangga mengumumkan bahwa alumni LKP Yuwita, Siti Nurhaliza (angkatan 2024), telah berhasil meraih penghargaan di Kompetisi MUA Nasional 2026 yang diselenggarakan di Jakarta Convention Center.</p><h2>Prestasi yang Diraih</h2><p>Siti berhasil meraih posisi Runner-Up 1 dalam kategori Bridal Makeup dengan tema "Modern Elegance". Penilaian dilakukan oleh panel juri dari berbagai background profesional kecantikan, termasuk makeup artist internasional.</p><h2>Perjalanan Siti di LKP Yuwita</h2><p>Siti bergabung di LKP Yuwita pada tahun 2024 melalui program MUA Profesional (Kelas Khusus). Selama 6 bulan pelatihan, ia menunjukkan dedikasi dan bakat luar biasa dalam bidang tata rias.</p><blockquote><p>"Ilmu yang saya dapatkan di LKP Yuwita menjadi modal utama saya dalam berkompetisi. Para instruktur sangat sabar dan berpengalaman dalam mengajarkan teknik-teknik profesional." - Siti Nurhaliza</p></blockquote><h2>Dukungan LKP Yuwita</h2><p>LKP Yuwita terus berkomitmen untuk menghasilkan alumni yang tidak hanya terampil tetapi juga mampu bersaing di tingkat nasional. Kami menyediakan bimbingan dan dukungan bagi alumni yang ingin mengikuti kompetisi.</p><p>Tertarik mengikuti jejak Siti? Daftar sekarang di program pelatihan LKP Yuwita!</p>',
                'category' => 'Berita',
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
        ];

        foreach ($posts as $post) {
            Post::create(array_merge($post, ['user_id' => $admin->id]));
        }
    }
}
