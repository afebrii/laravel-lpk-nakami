# Development Todolist — Website LPK Nakami Indonesia
> **Versi:** 1.0  
> **Dibuat:** 2026-03-17  
> **Berdasarkan:** Project Brief v1.1  
> **Base Project:** Laravel LKP Yuwita (Clone + Redesign)

---

## Status Legend
- `[ ]` Belum dikerjakan  
- `[/]` Sedang dikerjakan  
- `[x]` Selesai  
- `[!]` Butuh konfirmasi klien  

---

## FASE 1 — Setup & Environment

### 1.1 Repository & Environment
- [x] Buat repo Git baru `laravel-lpk-nakami` (terpisah dari LKP Yuwita)
- [x] Clone project LKP Yuwita sebagai base
- [x] Setup `.env` baru (APP_NAME, APP_URL, DB, SMTP)
- [x] Buat database MySQL baru `db_lpk_nakami`
- [x] Update konfigurasi `.env`:
  - [x] `APP_NAME=LPK Nakami Indonesia`
  - [ ] `APP_URL=` (sesuai domain klien)
  - [x] DB credentials baru
  - [ ] SMTP/mail credentials
- [x] Jalankan `php artisan migrate` pada database baru
- [x] Jalankan `php artisan db:seed` untuk data awal
- [ ] Uji coba aplikasi berjalan di lokal tanpa error

### 1.2 Aset & Brand
- [x] Siapkan logo LPK Nakami (tersedia dari klien)
- [x] Simpan logo di `public/images/logo-nakami.png`
- [x] Siapkan favicon dari logo *(tunda)*
- [x] Download font dari Google Fonts:
  - [x] Plus Jakarta Sans (Heading & Body)
  - [x] Noto Serif JP (aksen Jepang/kanji)
  - [x] Inter (Body Fallback)
- [x] Daftarkan font di `resources/css/app.css`
- [x] Update CSS Variables (`rose-gold` -> `nakami-red #C0001E`, dsb)
- [x] Pastikan hanya versi light-mode yang aktif

---

## FASE 2 — Redesign UI

### 2.1 Design System & Global Styles
- [x] Update `resources/css/app.css`:
  - [x] Definisikan CSS custom properties (variabel warna):
    - [x] `--color-primary: #C0001E` (Primary Red)
    - [x] `--color-primary-hover: #E8001F` (Red Vibrant)
    - [x] `--color-dark: #111111` (Deep Black)
    - [x] `--color-charcoal: #1E1E1E` (Charcoal)
    - [x] `--color-light: #F9F5F2` (Off White)
    - [x] `--color-gold: #FFD700` (Gold Accent)
  - [x] Import font Plus Jakarta Sans, Noto Serif JP, Inter
  - [x] Set typography system (heading/body/accent)
  - [x] Base global styles
- [x] Update `tailwind.config.js` / `vite.config.js` dengan color tokens baru
- [x] Jalankan `npm install && npm run dev` untuk kompilasi ulang assets

### 2.2 Layout & Komponen Global
- [x] Update `resources/views/layouts/app.blade.php`:
  - [x] Ganti `<title>` dan meta description ke LPK Nakami Indonesia
  - [x] Import font baru
  - [x] Load CSS/JS yang diperbarui
- [x] **Navbar** (`resources/views/components/navbar.blade.php`):
  - [x] Ganti logo LKP Yuwita → logo LPK Nakami
  - [x] Update warna: background `#111111`, aksen merah `#C0001E`
  - [x] Update menu navigasi sesuai sitemap Nakami:
    - [x] Beranda, Tentang Kami, Program, Info Jepang, Materi JLPT, Lowongan, Alumni, Pendaftaran, Kontak
  - [x] Tombol CTA "Daftar Sekarang" dengan warna merah
  - [x] Sticky navbar dengan scroll effect
- [x] **Footer** (`resources/views/components/footer.blade.php`):
  - [x] Update brand name, tagline "Japanese Learning Center"
  - [x] Update alamat: Citra Graha Residence Blok H26, Tasikmalaya 46153
  - [x] Update WhatsApp: +62 819-3164-6314
  - [x] Update email: lpknakamiindonesia@gmail.com
  - [x] Update Instagram: @lpknakami.id
  - [x] Multi-column footer: Logo & deskripsi | Menu | Program | Kontak
  - [x] Warna: background `#111111`, teks putih, aksen merah
- [x] **Tombol WhatsApp Floating**:
  - [x] Buat komponen `resources/views/components/wa-floating.blade.php`
  - [x] Icon WA + label "Konsultasi Gratis"
  - [x] Posisi: fixed bottom-right, z-index tinggi
  - [x] Link ke `https://wa.me/6281931646314`
  - [x] Include di layout utama agar muncul di semua halaman

### 2.3 Halaman Beranda (`/`)
- [x] Update `resources/views/pages/home.blade.php`:
  - [x] **Hero Section**:
    - [x] Background: gambar kegiatan pelatihan + overlay gelap `#111111`
    - [x] Headline utama: "Wujudkan Impianmu Bekerja di Jepang"
    - [x] Subheadline + tagline LPK Nakami
    - [x] CTA button: "Daftar Sekarang" (merah) + "Pelajari Program" (outline)
    - [x] Elemen dekoratif kanji/hiragana sebagai background aksen
  - [x] **Stats Counter Section**:
    - [x] Counter animasi: Jumlah Alumni, Tahun Berdiri, Tingkat Keberhasilan %, Mitra Perusahaan
    - [x] Background gelap charcoal `#1E1E1E`
    - [x] Implementasi animasi counter dengan Alpine.js / Intersection Observer
  - [x] **About Singkat Section**:
    - [x] Paragraf singkat tentang LPK Nakami
    - [x] Link "Selengkapnya →" ke `/tentang`
  - [x] **4 Program Highlight Section**:
    - [x] Card untuk: Ginou Jisshusei (技能実習), Tokutei Ginou (特定技能), Engineering (エンジニアリング), Nihongo Gakkou (日本語学校)
    - [x] Tampilkan kanji sebagai aksen card
    - [x] CTA per card: "Lihat Detail"
  - [x] **Alur Proses Section**:
    - [x] Numbered steps: Pendaftaran → Seleksi → Pelatihan → Keberangkatan
    - [x] Desain numbered process ala jayantara.org
  - [x] **Testimoni Section**:
    - [x] Grid card testimoni alumni
    - [x] Embed video YouTube (opsional)
    - [x] Rating bintang dengan warna gold `#FFD700`
  - [x] **FAQ Accordion Section**:
    - [x] Pertanyaan umum seputar program kerja Jepang
    - [x] Alpine.js accordion
  - [x] **CTA Pendaftaran Section**:
    - [x] Banner merah dengan CTA besar "Daftar Sekarang"
    - [x] Link ke `/daftar`

### 2.4 Halaman Tentang Kami (`/tentang`)
- [x] Update `resources/views/pages/tentang/`:
  - [x] Profil LPK Nakami Indonesia
  - [x] Visi & Misi
  - [x] Legalitas & izin resmi (nomor izin, P3MI/sponsor) `[!] Konfirmasi klien`
  - [x] Tim instruktur
### 2.4 Halaman Dalam (Inner Pages)
- [x] **Halaman Program (`/program` & `/program/{slug}`):**
  - [x] Desain ulang header image banner
  - [x] Card program style Nakami
  - [x] Di detail program, tampilkan rincian biaya, durasi, dll dari text-editor
- [x] **Halaman Tentang Kami (`/tentang`):**
  - [x] Profil LPK Nakami, Sejarah, Visi Misi
  - [x] Tampilkan keunggulan lembaga dengan bahasa yang meyakinkan
- [x] **Halaman Galeri (`/galeri`):**
  - [x] Masonry atau grid biasa untuk dokumentasi pelatihan dan kegiatan di Jepang
- [x] **Halaman Artikel/Blog (`/blog`):**
  - [x] Desain minimalis list artikel (Thumbnail, Judul, Kategori, Tanggal)
  - [x] Halaman baca yang rapi (Tipografi jelas, Share button)

### 2.7 Halaman Kontak & FAQ (`/kontak`, `/faq`)
- [x] **Halaman Kontak (`/kontak`):**
  - [x] Formulir: Nama, Email, WhatsApp, Tujuan (Informasi/Pendaftaran)
  - [x] Info kontak dan peta dengan warna abu-merah gelap
- [x] **Halaman FAQ (`/faq`):**
  - [x] Update Accordion gaya Jepang minimalis
  - [x] Konten FAQ difokuskan ke: "Syarat Kerja di Jepang", "Biaya Berapa", "Sistem LPK Bagaimana"

### 2.8 Halaman Pendaftaran (`/daftar`)
- [x] **Halaman Formulir (`/daftar`):**
  - [x] Pisahkan form "Pendaftaran Program" dan "Konsultasi Cepat"
  - [x] UI form lebih clean (fokus pada input NIK, Nama, TL, Usia, TB/BB, Pendidikan)
  - [x] Notifikasi pesan sukses setelah submit (sudah ada di layout, tinggal styling) form
  - [x] Pesan sukses setelah submit
  - [x] Embed Google Maps (koordinat alamat Tasikmalaya)
  - [x] Jam operasional

### 2.6 Halaman Testimoni (`/testimoni`)
- [x] **Halaman Daftar Testimoni:**
  - [x] Ubah style UI ke hitam-merah Nakami.
  - [x] Ubah filter teks dari Pelanggan/Alumni menjadi Kohai/Senpai.
  - [x] Ganti banner CTA.

### 2.9 Halaman Blog/Berita (`/berita`)
- [x] Update styling halaman blog ke identitas Nakami
- [x] Update category/tag sesuai topik Nakami (info Jepang, keberangkatan, update program)

---

## FASE 3 — Konten & Data

### 3.1 Database Seeders
- [x] Buat seeder `ProgramCategorySeeder` (4 kategori: Ginou Jisshusei, Tokutei Ginou, Engineering, Nihongo Gakkou)
- [x] Buat/update `ProgramSeeder` dengan konten 4 program Nakami (8 program total)
- [x] Buat `TestimonialSeeder` (5 testimoni alumni)
- [x] Buat `FaqSeeder` (11 FAQ seputar program kerja Jepang)
- [x] Buat `SettingSeeder` (konfigurasi site: nama, logo, kontak, WA number)
- [x] Buat `UserSeeder` (admin default Nakami)

### 3.2 Konten Statis
- [x] Tulis teks profil LPK Nakami untuk halaman Tentang Kami
- [x] Tulis deskripsi lengkap 4 program
- [x] Tulis FAQ umum (min. 8 pertanyaan)
- [x] Upload foto-foto aset branding (jika ada dari klien)

---

## FASE 4 — Fitur Baru Khusus Nakami

### 4.1 Model & Migration: Lowongan
- [x] Buat migration `create_lowongan_table.php`:
  ```
  - id (PK)
  - nama_pekerjaan (VARCHAR)
  - lokasi / prefektur (VARCHAR)
  - program (ENUM: Ginou Jisshusei, Tokutei Ginou, Engineering)
  - persyaratan (TEXT)
  - status (ENUM: Buka, Tutup)
  - timestamps
  ```
- [x] Buat model `Lowongan.php` dengan fillable, casts, scopes
- [x] Jalankan migration

### 4.2 Backend: CRUD Lowongan
- [x] Buat `LowonganController.php` (resource controller)
- [x] Buat routes:
  - [x] `GET /lowongan` → frontend list
  - [x] `GET /admin/lowongan` → admin index
  - [x] `POST /admin/lowongan` → store
  - [x] `GET /admin/lowongan/{id}/edit` → edit view
  - [x] `PUT /admin/lowongan/{id}` → update
  - [x] `DELETE /admin/lowongan/{id}` → destroy
- [x] Buat Form Request `LowonganRequest.php` untuk validasi
- [x] Update `routes/web.php`

### 4.3 Frontend: Halaman Lowongan (`/lowongan`) ✦
- [x] Buat `resources/views/pages/lowongan/index.blade.php`:
  - [x] List card lowongan kerja
  - [x] Filter: by program, by status (Buka/Tutup), by prefektur
  - [x] Info per card: nama pekerjaan, lokasi/prefektur, program, status badge, persyaratan singkat
  - [x] CTA per lowongan: "Daftar via WhatsApp"
  - [x] Status badge: Buka (hijau) / Tutup (abu-abu)
  - [x] Empty state jika tidak ada lowongan

### 4.4 Admin: Manajemen Lowongan
- [x] Buat `resources/views/admin/lowongan/`:
  - [x] `index.blade.php` — tabel daftar lowongan + tombol aksi
  - [x] `create.blade.php` — form tambah lowongan
  - [x] `edit.blade.php` — form edit lowongan
  - [x] Konfirmasi hapus (modal)
- [x] Tambahkan menu "Lowongan" di sidebar admin

### 4.5 Halaman Info Jepang (`/jepang-info`) ✦
- [x] Buat controller `JepangInfoController.php`
- [x] Buat view `resources/views/pages/jepang-info/index.blade.php`:
  - [x] Panduan hidup di Jepang
  - [x] Biaya hidup per kota/prefektur
  - [x] Aturan kerja (hak pekerja, jam kerja, overtime)
  - [x] Budaya & etika kerja di Jepang
  - [x] Prefektur populer (Aichi, Osaka, Tokyo, Kanagawa, dll)
  - [x] Section CTA: "Konsultasikan dengan Kami"
- [x] Tambahkan route `GET /jepang-info`

### 4.6 Halaman Materi JLPT (`/jlpt`) ✦
- [x] Buat controller `JlptController.php`
- [x] Buat view `resources/views/pages/jlpt/index.blade.php`:
  - [x] Penjelasan level JLPT N5, N4, N3
  - [x] Materi yang dipelajari per level (hiragana, katakana, kanji, grammar, vocab)
  - [x] Tips lulus ujian JLPT
  - [x] Link sumber belajar (NHK World, JLPT Sensei, dll)
  - [x] CTA: "Daftar Kelas Nihongo Gakkou"
- [x] Tambahkan route `GET /jlpt`

### 4.7 Counter Alumni Animasi
- [x] Implementasi counter animasi di beranda:
  - [x] Gunakan Alpine.js dengan Intersection Observer
  - [x] Counter: alumni berangkat, tahun berdiri, tingkat keberhasilan, mitra Jepang
  - [x] Animasi angka menghitung dari 0 ke target saat section terlihat
  - [x] Update angka counter di seeder/setting admin

### 4.8 WhatsApp Floating Button
- [x] Buat komponen `resources/views/components/wa-floating.blade.php`
- [x] Styling: bulat, animasi pulse, icon WA hijau
- [x] Nomor WA dari `Setting` (dinamis dari admin)
- [x] Include di `layouts/app.blade.php`

---

## FASE 5 — Admin Panel Update
- [x] **Dashboard Admin**:
  - [x] Update stat cards dashboard: jumlah pendaftar, lowongan aktif, testimoni, pesan masuk
  - [x] Update warna sidebar/navbar admin ke tema Nakami (merah & hitam)
  - [x] Tambahkan menu navigasi Lowongan (CRUD baru)
- [x] **Manajemen Pengaturan Situs**:
  - [x] Update `SettingController` untuk field baru (WA, Sosmed, Counter Alumni)
  - [x] Update form Pengaturan Admin
- [x] **Manajemen Pendaftaran**:
  - [x] Pastikan program pilihan = 4 program Nakami
  - [x] Update template notifikasi (UI & WhatsApp link)

---

## FASE 6 — Testing & QA

### 6.1 Responsiveness
- [x] Test mobile (320px - 480px)
- [x] Test tablet (768px - 1024px)
- [x] Test desktop (1280px+)
- [x] Fix semua layout issue

### 6.2 Browser Compatibility
- [x] Chrome (latest)
- [x] Firefox (latest)
- [x] Safari (latest)
- [x] Edge (latest)

### 6.3 Fungsionalitas
- [x] Form pendaftaran: submit, validasi, notifikasi
- [x] CRUD lowongan: create, read, update, delete
- [x] Filter lowongan
- [x] Counter animasi berjalan
- [x] WA floating button (link benar)
- [x] Embed Google Maps tampil
- [x] Gambar/galeri tampil dengan benar
- [x] Semua link navigasi benar

### 6.4 SEO Dasar
- [x] Meta title & description per halaman
- [x] Open Graph tags (untuk share medsos)
- [x] Sitemap XML
- [x] Alt text gambar
- [x] Heading hierarchy (H1 → H2 → H3)
- [x] Kecepatan loading (optimasi gambar)

### 6.5 Keamanan
- [x] CSRF protection pada semua form
- [x] Middleware auth pada semua route admin
- [x] Validasi input server-side
- [x] Rate limiting pada form pendaftaran

---

## FASE 7 — Deployment

### 7.1 Persiapan Hosting
- [!] Konfirmasi hosting dari klien
- [!] Konfirmasi domain dari klien
- [/] Setup hosting shared / VPS (Menunggu detail)
- [/] Upload file project (FTP/Git deploy)
- [ ] Setup database di hosting
- [/] Konfigurasi `.env` production (Template siap)
- [ ] Jalankan `php artisan migrate --force`
- [ ] Jalankan `php artisan db:seed --force`
- [ ] Setup symbolic link storage: `php artisan storage:link`
- [x] Optimasi aset produksi: `npm run build`
- [ ] `php artisan config:cache && php artisan route:cache`

### 7.2 Post-Deploy
- [ ] Test semua halaman di live URL
- [ ] Test form pendaftaran (email terkirim)
- [ ] Test upload gambar admin
- [ ] Cek SSL (HTTPS)
- [ ] Submit ke Google Search Console
- [ ] Monitor error log (storage/logs/laravel.log)

---

## Konfirmasi Klien yang Diperlukan

| Item | Status |
|---|---|
| Domain sudah tersedia? | `[!] Belum dikonfirmasi` |
| Hosting sudah ada? | `[!] Belum dikonfirmasi` |
| Foto kegiatan pelatihan & alumni | `[!] Belum dikonfirmasi` |
| Bidang kerja per program (manufaktur, perikanan, dll) | `[!] Belum dikonfirmasi` |
| Nomor izin resmi LPK / P3MI | `[!] Belum dikonfirmasi` |
| Video testimoni alumni (YouTube) | `[!] Belum dikonfirmasi` |
| Jadwal kelas Nihongo Gakkou | `[!] Belum dikonfirmasi` |
| Angka counter alumni (berapa alumni total?) | `[!] Belum dikonfirmasi` |
| Tahun berdiri LPK Nakami | `[!] Belum dikonfirmasi` |
| Mitra perusahaan Jepang (nama & logo) | `[!] Belum dikonfirmasi` |

---

## Ringkasan Halaman Baru vs Diwarisi

| Halaman | URL | Status |
|---|---|---|
| Beranda | `/` | ♻️ Redesign total |
| Tentang Kami | `/tentang` | ♻️ Update konten & styling |
| Program | `/program` | ♻️ Update konten 4 program Nakami |
| Alumni & Testimoni | `/alumni` | ♻️ Update konten & styling |
| Pendaftaran | `/daftar` | ♻️ Update konten & notifikasi |
| Kontak | `/kontak` | ♻️ Update info kontak |
| Blog/Berita | `/berita` | ♻️ Update styling |
| **Info Jepang** | `/jepang-info` | ✦ **BARU** |
| **Materi JLPT** | `/jlpt` | ✦ **BARU** |
| **Lowongan** | `/lowongan` | ✦ **BARU** |
| Dashboard Admin | `/admin` | ♻️ Update + tambah CRUD Lowongan |

---

*Dokumen ini bersifat living document dan akan diperbarui seiring perkembangan pengerjaan.*
