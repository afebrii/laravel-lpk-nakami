# Project Brief — Website LPK Nakami Indonesia
> **Versi:** 1.1  
> **Metode pengerjaan:** Clone + Redesign (Laravel)  
> **Base project:** LKP Yuwita  
> **Referensi desain:** [jayantara.org](https://jayantara.org)

---

## 1. Overview Proyek

LPK Nakami Indonesia adalah lembaga pelatihan kerja yang berfokus pada persiapan calon tenaga kerja Indonesia untuk bekerja di Jepang melalui program Ginou Jisshusei, Tokutei Ginou, Engineering, dan Nihongo Gakkou. Website ini menjadi wajah digital pertama LPK Nakami — berfungsi sebagai media promosi, informasi program, pencarian lowongan, dan pintu pendaftaran peserta.

**Pendekatan:** Clone project Laravel LKP Yuwita sebagai fondasi, lalu lakukan full redesign dengan identitas visual baru (merah & hitam), konten yang disesuaikan, dan tambahan fitur khusus Jepang.

---

## 2. Informasi Klien

| Field | Detail |
|---|---|
| Nama Lembaga | LPK Nakami Indonesia |
| Tagline | Japanese Learning Center |
| WhatsApp | +62 819-3164-6314 |
| Email | lpknakamiindonesia@gmail.com |
| Alamat | Citra Graha Residence Blok H26, Tasikmalaya, Indonesia 46153 |
| Logo | ✅ Sudah tersedia |
| Instagram | [@lpknakami.id](https://www.instagram.com/lpknakami.id/) |

---

## 3. Identitas Brand & Visual

### Palet Warna

| Nama | Hex | Penggunaan |
|---|---|---|
| Primary Red | `#C0001E` | Warna utama — CTA, aksen, highlight |
| Red Vibrant | `#E8001F` | Hover state, icon aktif |
| Deep Black | `#111111` | Background dark sections, navbar |
| Charcoal | `#1E1E1E` | Card background, section gelap |
| Off White | `#F9F5F2` | Background terang, card putih |
| Gold Accent | `#FFD700` | Bintang rating, badge premium (opsional) |

### Tipografi

- **Heading:** Plus Jakarta Sans Bold / Noto Serif JP (aksen Jepang)
- **Body:** Inter / Plus Jakarta Sans Regular
- **Aksen:** Noto Serif JP — untuk teks kanji/hiragana dekoratif

### Tone Visual

Tegas, profesional, dan bersemangat. Dominasi hitam & merah mencerminkan kesiapan dan keberanian. Nuansa Jepang ditambah melalui elemen tipografi kanji dekoratif dan pattern halus (asanoha/seigaiha opsional).

---

## 4. Target Audiens

| Segmen | Deskripsi |
|---|---|
| **Primer** | Lulusan SMA/SMK usia 18–30 tahun yang ingin bekerja ke Jepang via program pemagangan |
| **Sekunder** | Fresh graduate D3/S1 yang tertarik Tokutei Ginou atau jalur Engineer ke Jepang |
| **Tersier** | Orang tua & keluarga calon peserta yang ingin memvalidasi kredibilitas LPK |

---

## 5. Program yang Ditawarkan

| Program | Kanji | Deskripsi Singkat |
|---|---|---|
| **Ginou Jisshusei** | 技能実習 | Program pemagangan kerja di Jepang, transfer teknologi & keterampilan, durasi 3 tahun |
| **Tokutei Ginou** | 特定技能 | Pekerja bersertifikat keahlian, hak setara pekerja lokal Jepang, 14 sektor industri |
| **Engineering** | エンジニアリング | Pelatihan teknik (Mesin, Listrik, Konstruksi, Otomotif, IT) untuk visa kerja Jepang, min. D3/S1 |
| **Nihongo Gakkou** | 日本語学校 | Kelas bahasa Jepang intensif dari level N5 hingga siap wawancara & kehidupan di Jepang |

---

## 6. Sitemap & Struktur Halaman

| Halaman | URL | Deskripsi Konten |
|---|---|---|
| Beranda | `/` | Hero section, stats counter, about singkat, 4 program highlight, alur proses, testimoni, CTA pendaftaran, footer |
| Tentang Kami | `/tentang` | Profil LPK, visi misi, legalitas (izin, nomor P3MI/sponsor), tim instruktur, mitra perusahaan Jepang |
| Program | `/program` | 4 program lengkap dengan persyaratan, durasi, estimasi gaji, dan CTA daftar per program |
| Info Jepang ✦ | `/jepang-info` | Panduan hidup di Jepang: biaya hidup, aturan kerja, budaya, prefektur populer, level JLPT |
| Materi JLPT ✦ | `/jlpt` | Informasi level JLPT N5–N3, materi yang dipelajari, link sumber belajar, tips lulus ujian |
| Lowongan ✦ | `/lowongan` | List lowongan kerja Jepang: nama job, lokasi/prefektur, syarat, program terkait, status buka/tutup |
| Alumni & Testimoni | `/alumni` | Galeri alumni yang sudah berangkat, video testimoni (YouTube embed), kota & perusahaan penempatan |
| Pendaftaran | `/daftar` | Form pendaftaran online (nama, kontak, program pilihan, background pendidikan) + notif WA/email ke admin |
| Kontak | `/kontak` | Alamat, WhatsApp, email, embed Google Maps, jam operasional |
| Blog/Berita | `/berita` | Artikel info Jepang, update program, keberangkatan peserta terbaru *(opsional)* |
| Dashboard Admin | `/admin` | Login admin, kelola data pendaftar, manajemen konten, **CRUD lowongan** |

> ✦ = Halaman baru khusus LPK Nakami, tidak ada di LKP Yuwita

---

## 7. Fitur yang Dibutuhkan

### Diwarisi dari LKP Yuwita

- **Form Pendaftaran Online** — Input data calon peserta + notifikasi email/WhatsApp ke admin
- **Dashboard Admin** — Manajemen data pendaftar, status seleksi, export data
- **Halaman Program Dinamis** — Konten program bisa dikelola admin tanpa coding
- **Galeri & Testimoni** — Upload foto alumni, embed video YouTube

### ✦ Fitur Baru Khusus Nakami

- **Halaman Info Jepang** — Konten statis + CMS: panduan hidup, budaya, prefektur, biaya hidup
- **Panduan Level JLPT** — Halaman informatif level N5–N3, vocab/grammar per level, resources belajar
- **Manajemen Lowongan (CRUD)** — Admin bisa tambah, edit, hapus lowongan; tampil sebagai list card di frontend
- **Counter Alumni Animasi** — Angka counter: jumlah alumni, tahun berdiri, tingkat keberhasilan
- **Tombol WhatsApp Floating** — CTA konsultasi gratis via WA, muncul di semua halaman

### Struktur Data Lowongan (Database)

| Field | Tipe | Keterangan |
|---|---|---|
| `id` | INT | Primary key |
| `nama_pekerjaan` | VARCHAR | Contoh: Operator Manufaktur, Perawat, dsb |
| `lokasi` | VARCHAR | Prefektur di Jepang (Aichi, Osaka, Tokyo, dll) |
| `program` | ENUM | Ginou Jisshusei / Tokutei Ginou / Engineering |
| `persyaratan` | TEXT | Syarat singkat (usia, pendidikan, fisik, dll) |
| `status` | ENUM | Buka / Tutup |
| `created_at` | TIMESTAMP | — |
| `updated_at` | TIMESTAMP | — |

---

## 8. Referensi Desain

### Referensi Utama

- **[jayantara.org](https://jayantara.org)** — Referensi layout & struktur konten: one-page landing style, hero besar, program cards, alur proses numbered, FAQ accordion
- **[@lpknakami.id (Instagram)](https://www.instagram.com/lpknakami.id/)** — Referensi identitas brand: warna merah & hitam dominan, foto kegiatan pelatihan

### Elemen yang Diadopsi dari Jayantara

- Hero full-screen + stats counter animasi
- Numbered process steps (alur program)
- Program cards dengan daftar persyaratan
- FAQ accordion
- Testimoni grid + video YouTube embed
- Sticky navbar + WA CTA button
- Footer multi-column

### Diferensiasi Visual Nakami vs Jayantara

- Warna merah `#C0001E` & hitam `#111111` (bukan hijau)
- Elemen kanji/hiragana dekoratif sebagai aksen visual
- Pattern Jepang halus pada background section (opsional)
- Halaman khusus JLPT guide & Lowongan Kerja

---

## 9. Tech Stack

| Layer | Teknologi |
|---|---|
| **Backend** | Laravel (PHP) — diwarisi dari LKP Yuwita |
| **Frontend** | Blade templating + Tailwind CSS + Alpine.js / Livewire |
| **Database** | MySQL — environment baru, terpisah dari Yuwita |
| **Email** | SMTP / Mailtrap (notifikasi pendaftar) |
| **Deployment** | Shared hosting / VPS (TBD dari klien) |

> ⚠️ **Penting:** Buat repo Git baru, `.env` baru, database baru. Tidak ada dependensi ke project LKP Yuwita production.

---

## 10. Alur Pengerjaan (Timeline)

| Fase | Deskripsi | Output |
|---|---|---|
| **Fase 1 — Setup & Clone** | Clone repo LKP Yuwita, setup environment baru, konfigurasi `.env`, DB migration, uji coba lokal | Local dev siap |
| **Fase 2 — Redesign UI** | Ganti warna, font, logo, hero section, navbar, footer sesuai brand Nakami | Tampilan baru berjalan |
| **Fase 3 — Konten & Data** | Isi semua konten (4 program, persyaratan, info kontak, galeri, testimoni, alamat) | Website berisi konten nyata |
| **Fase 4 — Fitur Baru** | Halaman Info Jepang, JLPT guide, CRUD lowongan + halaman frontend, counter animasi, WA floating button | Semua halaman lengkap |
| **Fase 5 — Testing & Deploy** | QA responsif (mobile/tablet/desktop), optimasi SEO dasar, deploy ke hosting | Website live |

---

## 11. Hal yang Masih Perlu Dikonfirmasi ke Klien

- [ ] Domain sudah tersedia? Atau perlu rekomendasi registrar?
- [ ] Hosting sudah ada? Atau perlu disetup?
- [ ] Foto kegiatan pelatihan & foto alumni yang sudah berangkat ke Jepang (untuk galeri)
- [ ] Bidang kerja spesifik apa saja yang tersedia di masing-masing program? (manufaktur, perikanan, pertanian, dll)
- [ ] Apakah ada nomor izin resmi LPK / P3MI yang perlu ditampilkan?
- [ ] Video testimoni alumni yang ingin di-embed dari YouTube?
- [ ] Untuk Nihongo Gakkou — apakah ada jadwal kelas atau level yang perlu ditampilkan di website?
- [ ] Apakah ada fitur tambahan di luar list ini? (misal: sistem absensi, jadwal kelas, dll)

---

*Brief ini disusun berdasarkan referensi visual jayantara.org dan identitas brand LPK Nakami Indonesia dari Instagram @lpknakami.id. Dokumen ini bersifat draft dan dapat diperbarui sesuai kebutuhan klien.*
