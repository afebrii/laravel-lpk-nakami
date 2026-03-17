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
- [ ] Update `resources/css/app.css`:
  - [ ] Definisikan CSS custom properties (variabel warna):
    - [ ] `--color-primary: #C0001E` (Primary Red)
    - [ ] `--color-primary-hover: #E8001F` (Red Vibrant)
    - [ ] `--color-dark: #111111` (Deep Black)
    - [ ] `--color-charcoal: #1E1E1E` (Charcoal)
    - [ ] `--color-light: #F9F5F2` (Off White)
    - [ ] `--color-gold: #FFD700` (Gold Accent)
  - [ ] Import font Plus Jakarta Sans, Noto Serif JP, Inter
  - [ ] Set typography system (heading/body/accent)
  - [ ] Base global styles
- [ ] Update `tailwind.config.js` / `vite.config.js` dengan color tokens baru
- [ ] Jalankan `npm install && npm run dev` untuk kompilasi ulang assets

### 2.2 Layout & Komponen Global
- [ ] Update `resources/views/layouts/app.blade.php`:
  - [ ] Ganti `<title>` dan meta description ke LPK Nakami Indonesia
  - [ ] Import font baru
  - [ ] Load CSS/JS yang diperbarui
- [ ] **Navbar** (`resources/views/components/navbar.blade.php`):
  - [ ] Ganti logo LKP Yuwita → logo LPK Nakami
  - [ ] Update warna: background `#111111`, aksen merah `#C0001E`
  - [ ] Update menu navigasi sesuai sitemap Nakami:
    - [ ] Beranda, Tentang Kami, Program, Info Jepang, Materi JLPT, Lowongan, Alumni, Pendaftaran, Kontak
  - [ ] Tombol CTA "Daftar Sekarang" dengan warna merah
  - [ ] Sticky navbar dengan scroll effect
- [ ] **Footer** (`resources/views/components/footer.blade.php`):
  - [ ] Update brand name, tagline "Japanese Learning Center"
  - [ ] Update alamat: Citra Graha Residence Blok H26, Tasikmalaya 46153
  - [ ] Update WhatsApp: +62 819-3164-6314
  - [ ] Update email: lpknakamiindonesia@gmail.com
  - [ ] Update Instagram: @lpknakami.id
  - [ ] Multi-column footer: Logo & deskripsi | Menu | Program | Kontak
  - [ ] Warna: background `#111111`, teks putih, aksen merah
- [ ] **Tombol WhatsApp Floating**:
  - [ ] Buat komponen `resources/views/components/wa-floating.blade.php`
  - [ ] Icon WA + label "Konsultasi Gratis"
  - [ ] Posisi: fixed bottom-right, z-index tinggi
  - [ ] Link ke `https://wa.me/6281931646314`
  - [ ] Include di layout utama agar muncul di semua halaman

### 2.3 Halaman Beranda (`/`)
- [ ] Update `resources/views/pages/home.blade.php`:
  - [ ] **Hero Section**:
    - [ ] Background: gambar kegiatan pelatihan + overlay gelap `#111111`
    - [ ] Headline utama: "Wujudkan Impianmu Bekerja di Jepang"
    - [ ] Subheadline + tagline LPK Nakami
    - [ ] CTA button: "Daftar Sekarang" (merah) + "Pelajari Program" (outline)
    - [ ] Elemen dekoratif kanji/hiragana sebagai background aksen
  - [ ] **Stats Counter Section**:
    - [ ] Counter animasi: Jumlah Alumni, Tahun Berdiri, Tingkat Keberhasilan %, Mitra Perusahaan
    - [ ] Background gelap charcoal `#1E1E1E`
    - [ ] Implementasi animasi counter dengan Alpine.js / Intersection Observer
  - [ ] **About Singkat Section**:
    - [ ] Paragraf singkat tentang LPK Nakami
    - [ ] Link "Selengkapnya →" ke `/tentang`
  - [ ] **4 Program Highlight Section**:
    - [ ] Card untuk: Ginou Jisshusei (技能実習), Tokutei Ginou (特定技能), Engineering (エンジニアリング), Nihongo Gakkou (日本語学校)
    - [ ] Tampilkan kanji sebagai aksen card
    - [ ] CTA per card: "Lihat Detail"
  - [ ] **Alur Proses Section**:
    - [ ] Numbered steps: Pendaftaran → Seleksi → Pelatihan → Keberangkatan
    - [ ] Desain numbered process ala jayantara.org
  - [ ] **Testimoni Section**:
    - [ ] Grid card testimoni alumni
    - [ ] Embed video YouTube (opsional)
    - [ ] Rating bintang dengan warna gold `#FFD700`
  - [ ] **FAQ Accordion Section**:
    - [ ] Pertanyaan umum seputar program kerja Jepang
    - [ ] Alpine.js accordion
  - [ ] **CTA Pendaftaran Section**:
    - [ ] Banner merah dengan CTA besar "Daftar Sekarang"
    - [ ] Link ke `/daftar`

### 2.4 Halaman Tentang Kami (`/tentang`)
- [ ] Update `resources/views/pages/tentang/`:
  - [ ] Profil LPK Nakami Indonesia
  - [ ] Visi & Misi
  - [ ] Legalitas & izin resmi (nomor izin, P3MI/sponsor) `[!] Konfirmasi klien`
  - [ ] Tim instruktur
  - [ ] Mitra perusahaan Jepang `[!] Konfirmasi klien`

### 2.5 Halaman Program (`/program`)
- [ ] Update `resources/views/pages/program/`:
  - [ ] 4 program card detail: Ginou Jisshusei, Tokutei Ginou, Engineering, Nihongo Gakkou
  - [ ] Per program: deskripsi, persyaratan, durasi, estimasi gaji/biaya, CTA daftar
  - [ ] Tampilkan kanji masing-masing program sebagai elemen visual
  - [ ] Update konten dari database (seeder data program baru)
  - [ ] Sesuaikan `ProgramCategory` dan `Program` models/seeders

### 2.6 Halaman Alumni & Testimoni (`/alumni`)
- [ ] Update/buat halaman alumni:
  - [ ] Galeri foto alumni yang sudah berangkat ke Jepang `[!] Butuh foto dari klien`
  - [ ] Info: nama, kota penempatan, perusahaan, program
  - [ ] Video testimoni (YouTube embed) `[!] Butuh link video dari klien`
  - [ ] Update komponen galeri dengan identitas visual Nakami

### 2.7 Halaman Pendaftaran (`/daftar`)
- [ ] Update `resources/views/pages/daftar/`:
  - [ ] Form pendaftaran: nama, email, WhatsApp, program pilihan, pendidikan terakhir
  - [ ] Validasi form
  - [ ] Notifikasi ke admin (email + WhatsApp)
  - [ ] Update warna & styling form
  - [ ] Pesan sukses setelah submit

### 2.8 Halaman Kontak (`/kontak`)
- [ ] Update `resources/views/pages/kontak/`:
  - [ ] Alamat: Citra Graha Residence Blok H26, Tasikmalaya 46153
  - [ ] WhatsApp: +62 819-3164-6314
  - [ ] Email: lpknakamiindonesia@gmail.com
  - [ ] Instagram: @lpknakami.id
  - [ ] Embed Google Maps (koordinat alamat Tasikmalaya)
  - [ ] Jam operasional

### 2.9 Halaman Blog/Berita (`/berita`)
- [ ] Update styling halaman blog ke identitas Nakami
- [ ] Update category/tag sesuai topik Nakami (info Jepang, keberangkatan, update program)

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
- [ ] Tulis teks profil LPK Nakami untuk halaman Tentang Kami
- [ ] Tulis deskripsi lengkap 4 program
- [ ] Tulis FAQ umum (min. 8 pertanyaan)
- [ ] Upload foto-foto aset branding (jika ada dari klien)

---

## FASE 4 — Fitur Baru Khusus Nakami

### 4.1 Model & Migration: Lowongan
- [ ] Buat migration `create_lowongan_table.php`:
  ```
  - id (PK)
  - nama_pekerjaan (VARCHAR)
  - lokasi / prefektur (VARCHAR)
  - program (ENUM: Ginou Jisshusei, Tokutei Ginou, Engineering)
  - persyaratan (TEXT)
  - status (ENUM: Buka, Tutup)
  - timestamps
  ```
- [ ] Buat model `Lowongan.php` dengan fillable, casts, scopes
- [ ] Jalankan migration

### 4.2 Backend: CRUD Lowongan
- [ ] Buat `LowonganController.php` (resource controller)
- [ ] Buat routes:
  - [ ] `GET /lowongan` → frontend list
  - [ ] `GET /admin/lowongan` → admin index
  - [ ] `POST /admin/lowongan` → store
  - [ ] `GET /admin/lowongan/{id}/edit` → edit view
  - [ ] `PUT /admin/lowongan/{id}` → update
  - [ ] `DELETE /admin/lowongan/{id}` → destroy
- [ ] Buat Form Request `LowonganRequest.php` untuk validasi
- [ ] Update `routes/web.php`

### 4.3 Frontend: Halaman Lowongan (`/lowongan`) ✦
- [ ] Buat `resources/views/pages/lowongan/index.blade.php`:
  - [ ] List card lowongan kerja
  - [ ] Filter: by program, by status (Buka/Tutup), by prefektur
  - [ ] Info per card: nama pekerjaan, lokasi/prefektur, program, status badge, persyaratan singkat
  - [ ] CTA per lowongan: "Daftar via WhatsApp"
  - [ ] Status badge: Buka (hijau) / Tutup (abu-abu)
  - [ ] Empty state jika tidak ada lowongan

### 4.4 Admin: Manajemen Lowongan
- [ ] Buat `resources/views/admin/lowongan/`:
  - [ ] `index.blade.php` — tabel daftar lowongan + tombol aksi
  - [ ] `create.blade.php` — form tambah lowongan
  - [ ] `edit.blade.php` — form edit lowongan
  - [ ] Konfirmasi hapus (modal)
- [ ] Tambahkan menu "Lowongan" di sidebar admin

### 4.5 Halaman Info Jepang (`/jepang-info`) ✦
- [ ] Buat controller `JepangInfoController.php`
- [ ] Buat view `resources/views/pages/jepang-info/index.blade.php`:
  - [ ] Panduan hidup di Jepang
  - [ ] Biaya hidup per kota/prefektur
  - [ ] Aturan kerja (hak pekerja, jam kerja, overtime)
  - [ ] Budaya & etika kerja di Jepang
  - [ ] Prefektur populer (Aichi, Osaka, Tokyo, Kanagawa, dll)
  - [ ] Section CTA: "Konsultasikan dengan Kami"
- [ ] Tambahkan route `GET /jepang-info`

### 4.6 Halaman Materi JLPT (`/jlpt`) ✦
- [ ] Buat controller `JlptController.php`
- [ ] Buat view `resources/views/pages/jlpt/index.blade.php`:
  - [ ] Penjelasan level JLPT N5, N4, N3
  - [ ] Materi yang dipelajari per level (hiragana, katakana, kanji, grammar, vocab)
  - [ ] Tips lulus ujian JLPT
  - [ ] Link sumber belajar (NHK World, JLPT Sensei, dll)
  - [ ] CTA: "Daftar Kelas Nihongo Gakkou"
- [ ] Tambahkan route `GET /jlpt`

### 4.7 Counter Alumni Animasi
- [ ] Implementasi counter animasi di beranda:
  - [ ] Gunakan Alpine.js dengan Intersection Observer
  - [ ] Counter: alumni berangkat, tahun berdiri, tingkat keberhasilan, mitra Jepang
  - [ ] Animasi angka menghitung dari 0 ke target saat section terlihat
  - [ ] Update angka counter di seeder/setting admin

### 4.8 WhatsApp Floating Button
- [ ] Buat komponen `resources/views/components/wa-floating.blade.php`
- [ ] Styling: bulat, animasi pulse, icon WA hijau
- [ ] Nomor WA dari `Setting` (dinamis dari admin)
- [ ] Include di `layouts/app.blade.php`

---

## FASE 5 — Admin Panel Update

### 5.1 Dashboard Admin
- [ ] Update stat cards dashboard: jumlah pendaftar, lowongan aktif, testimoni, pesan masuk
- [ ] Update warna sidebar/navbar admin ke tema Nakami (merah & hitam)
- [ ] Tambahkan menu navigasi:
  - [ ] Lowongan (CRUD baru)
  - [ ] (Opsional) Manajemen Info Jepang

### 5.2 Manajemen Pengaturan Situs
- [ ] Update `SettingController` untuk field baru:
  - [ ] Nomor WhatsApp admin
  - [ ] Instagram URL
  - [ ] Counter alumni (angka)
  - [ ] Counter tahun berdiri
  - [ ] Counter tingkat keberhasilan

### 5.3 Manajemen Pendaftaran
- [ ] Pastikan semua program pilihan di form = 4 program Nakami
- [ ] Update notifikasi email (template sesuai brand Nakami)
- [ ] Update template pesan WhatsApp ke admin

---

## FASE 6 — Testing & QA

### 6.1 Responsiveness
- [ ] Test mobile (320px - 480px)
- [ ] Test tablet (768px - 1024px)
- [ ] Test desktop (1280px+)
- [ ] Fix semua layout issue

### 6.2 Browser Compatibility
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Edge (latest)

### 6.3 Fungsionalitas
- [ ] Form pendaftaran: submit, validasi, notifikasi
- [ ] CRUD lowongan: create, read, update, delete
- [ ] Filter lowongan
- [ ] Counter animasi berjalan
- [ ] WA floating button (link benar)
- [ ] Embed Google Maps tampil
- [ ] Gambar/galeri tampil dengan benar
- [ ] Semua link navigasi benar

### 6.4 SEO Dasar
- [ ] Meta title & description per halaman
- [ ] Open Graph tags (untuk share medsos)
- [ ] Sitemap XML
- [ ] Alt text gambar
- [ ] Heading hierarchy (H1 → H2 → H3)
- [ ] Kecepatan loading (optimasi gambar)

### 6.5 Keamanan
- [ ] CSRF protection pada semua form
- [ ] Middleware auth pada semua route admin
- [ ] Validasi input server-side
- [ ] Rate limiting pada form pendaftaran

---

## FASE 7 — Deployment

### 7.1 Persiapan Hosting
- [ ] Konfirmasi hosting dari klien `[!]`
- [ ] Konfirmasi domain dari klien `[!]`
- [ ] Setup hosting shared / VPS
- [ ] Upload file project (FTP/Git deploy)
- [ ] Setup database di hosting
- [ ] Konfigurasi `.env` production
- [ ] Jalankan `php artisan migrate --force`
- [ ] Jalankan `php artisan db:seed --force`
- [ ] Setup symbolic link storage: `php artisan storage:link`
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
