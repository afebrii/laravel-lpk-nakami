# 📋 Development Todolist — Redesign Website LKP/LPK Yuwita

> **Berdasarkan:** [Project Brief v2.0](./project-brief-lkp-yuwita.md)
> **Tech Stack:** Laravel 12, Blade, Tailwind CSS v4, Alpine.js v3, MySQL 8
> **Estimasi Total:** ~19–22 hari kerja

---

## Phase 1 — Project Setup & Foundation ✅ (1–2 hari)

> Setup project Laravel, konfigurasi database, migrations, seeders, dan helper functions.

- [x] Inisialisasi project Laravel 12
- [x] Konfigurasi environment (`.env`): database, timezone `Asia/Jakarta`, app name
- [x] Setup Tailwind CSS v4 & Alpine.js v3
- [x] Import Google Fonts: Playfair Display, DM Sans / Inter, Italiana
- [x] Konfigurasi color palette di Tailwind config (Rose Gold, Dusty Pink, Soft Cream, dll)
- [x] Buat semua **migration files**:
  - [x] `users` (tambah kolom: role, avatar, is_active, last_login_at)
  - [x] `program_categories`
  - [x] `programs`
  - [x] `registrations`
  - [x] `gallery`
  - [x] `posts`
  - [x] `testimonials`
  - [x] `faqs`
  - [x] `service_categories`
  - [x] `services`
  - [x] `settings`
- [x] Buat semua **Model** dengan relasi:
  - [x] `User`, `Program`, `ProgramCategory`, `Registration`
  - [x] `Gallery`, `Post`, `Testimonial`, `Faq`
  - [x] `Service`, `ServiceCategory`, `Setting`
- [x] Buat **Seeders**:
  - [x] `UserSeeder` (akun superadmin default)
  - [x] `ProgramCategorySeeder` (Reguler & Khusus)
  - [x] `ProgramSeeder` (data program contoh)
  - [x] `ServiceCategorySeeder` & `ServiceSeeder` (data layanan salon)
  - [x] `SettingSeeder` (setting default lembaga)
  - [x] `FaqSeeder` (contoh FAQ)
- [x] Buat `SettingHelper.php` — helper global `setting('key')`
- [x] Jalankan `php artisan storage:link`
- [x] Setup route files: `web.php` (public) & `admin.php` (admin)

---

## Phase 2 — Layout Global & Beranda ✅ (2–3 hari)

> Membangun layout publik (navbar, footer, WA button) dan halaman Beranda lengkap.

### 2.1 Layout Global

- [x] Buat `layouts/app.blade.php` — layout publik utama
- [x] Buat `partials/navbar.blade.php`:
  - [x] Logo kiri, menu navigasi tengah, CTA "Daftar Sekarang" kanan
  - [x] Sticky navbar saat scroll dengan shadow
  - [x] Responsive hamburger menu (Alpine.js)
  - [x] Dropdown menu untuk "Program Pelatihan" & "Tentang Kami"
- [x] Buat `partials/footer.blade.php`:
  - [x] Logo, deskripsi singkat, navigasi cepat, sosmed, copyright
- [x] Buat `partials/whatsapp-button.blade.php` — floating button kanan bawah
- [x] Buat komponen Breadcrumb reusable
- [x] Buat komponen Toast notification (sukses/gagal)

### 2.2 Halaman Beranda `/`

- [x] `HomeController.php` — ambil data program, galeri, testimoni, blog terbaru
- [x] Section 1 — Hero: background gradient, headline, 2 CTA, trust badges
- [x] Section 2 — Statistik: counter animasi (Alpine.js intersect) — Alumni, Tahun, Program, Mitra
- [x] Section 3 — Tentang Singkat: foto placeholder + teks + 3 keunggulan
- [x] Section 4 — Program Unggulan: tab filter (Semua/Reguler/Khusus), grid card 6x
- [x] Section 5 — Layanan Salon: 2 kolom daftar layanan dengan harga
- [x] Section 6 — Mengapa Memilih Kami: 6 kartu fitur dengan hover
- [x] Section 7 — Galeri Preview: grid foto, hover overlay
- [x] Section 8 — Testimoni: card grid dengan rating bintang
- [x] Section 9 — Blog Terbaru: 3 card artikel
- [x] Section 10 — CTA Banner: full-width rose gold gradient
- [x] Section 11 — Mitra/Logo Partner: placeholder logos

---

## Phase 3 — Halaman Program & Layanan Salon ✅ (2 hari)

> Halaman listing program, detail program, dan halaman layanan salon.

### 3.1 Program Pelatihan `/program`

- [x] `Public\ProgramController@index` — listing semua program
- [x] Page Hero + Breadcrumb
- [x] Filter & Pencarian: tab kategori (Alpine.js), search bar, filter harga
- [x] Penjelasan singkat tiap kategori (Reguler vs Khusus)
- [x] Grid card program dengan badge, deskripsi, durasi, harga, tombol detail
- [x] Animasi filter tanpa reload (Alpine.js)
- [x] CTA Konsultasi banner

### 3.2 Detail Program `/program/{slug}`

- [x] `Public\ProgramController@show` — detail satu program
- [x] Header: breadcrumb, banner, nama, badge status, harga, durasi
- [x] Deskripsi program & tujuan pembelajaran
- [x] Kurikulum/Silabus: accordion per modul (Alpine.js)
- [x] Informasi program: tabel durasi, jadwal, metode, kuota, fasilitas, syarat
- [x] Persyaratan pendaftaran (list dokumen)
- [x] Biaya & Pembayaran
- [x] Testimoni alumni program ini (2–3 card)
- [x] Tombol Daftar (sticky di mobile)
- [x] Program Terkait (3 card)

### 3.3 Layanan Salon `/layanan`

- [x] `Public\ServiceController@index` — daftar layanan
- [x] Page Hero + Breadcrumb
- [x] Filter kategori: tab Semua/Rambut/Wajah & Tubuh (Alpine.js)
- [x] Daftar layanan per kategori: ikon, nama, deskripsi, harga, hover effect
- [x] Info reservasi: cara reservasi, jam operasional, alamat, tombol WA
- [x] Galeri hasil layanan (6 foto)

---

## Phase 4 — Galeri, Tentang Kami, FAQ, Testimoni ✅ (2 hari)

> Halaman-halaman informasi dan portofolio.

### 4.1 Galeri `/galeri`

- [x] `Public\GalleryController@index`
- [x] Page Hero + Breadcrumb
- [x] Filter kategori: Semua/Kegiatan Pelatihan/Hasil Karya/Rias Pengantin/Salon/Event
- [x] Grid foto masonry/Pinterest-style dengan lazy loading
- [x] Lightbox saat diklik (Alpine.js)
- [x] Load More / Pagination

### 4.2 Tentang Kami `/tentang`

- [x] `Public\AboutController@index`
- [x] Page Hero + Breadcrumb
- [x] Latar Belakang & Sejarah: foto, narasi, timeline visual
- [x] Visi & Misi: 2 kolom card
- [x] Keunggulan Lembaga: 4–6 kartu icon
- [x] Struktur Organisasi: bagan visual (foto + nama + jabatan)
- [x] Legalitas: daftar izin operasional dengan thumbnail scan
- [x] Penghargaan: grid card penghargaan
- [x] Link Kebijakan Privasi

### 4.3 FAQ `/faq`

- [x] `Public\FaqController@index`
- [x] Page Hero + search bar FAQ
- [x] Filter kategori FAQ: tab (Pendaftaran/Program/Biaya/Sertifikasi/Salon/Lainnya)
- [x] Accordion FAQ (Alpine.js) dengan animasi buka/tutup
- [x] CTA "Pertanyaanmu belum ada?" + tombol WA & form

### 4.4 Testimoni `/testimoni`

- [x] `Public\TestimonialController@index`
- [x] Page Hero + rating rata-rata
- [x] Filter: tab Alumni/Pelanggan + dropdown per program
- [x] Grid 3 kolom card: foto, nama, peran, rating bintang, kutipan
- [x] Pagination / Load more

---

## Phase 5 — Sistem Pendaftaran ✅ (2 hari)

> Form pendaftaran online (konsultasi & pelatihan) dengan validasi dan backend.

### 5.1 Halaman Pendaftaran `/daftar`

- [x] `Public\RegistrationController` — store + show success
- [x] Page Hero + instruksi cara mendaftar
- [x] 2 tab pilihan: Konsultasi Gratis | Daftar Program Pelatihan (Alpine.js)
- [x] **Form Konsultasi (Tab 1):**
  - [x] Field: Nama, WhatsApp, Email (opsional), Program diminati, Pesan
  - [x] Honeypot anti-spam
  - [x] Validasi frontend (Alpine.js) + backend (FormRequest)
  - [x] Toast sukses setelah submit
- [x] **Form Daftar Pelatihan (Tab 2):**
  - [x] Field: Program, Nama, WhatsApp, Email, TTL, Gender, Alamat
  - [x] Field: Pendidikan, Pekerjaan, No HP Ibu, Motivasi
  - [x] Upload Pas Foto 3x4 (max 2MB, jpg/png)
  - [x] Checkbox persetujuan syarat & ketentuan
  - [x] Honeypot anti-spam
  - [x] Validasi frontend + backend (`StoreRegistrationRequest`)
- [x] Buat `StoreRegistrationRequest` dengan validasi lengkap
- [x] Generate nomor referensi: `YWT-YYYYMMDD-XXXXX`
- [x] Redirect ke halaman sukses `/sukses-daftar` dengan nomor referensi

### 5.2 Syarat & Dokumen

- [x] Accordion per program: dokumen yang diperlukan
- [x] Info umum persyaratan

### 5.3 Info Kontak Pendaftaran

- [x] Nomor WA admin, jam layanan, alamat kantor

---

## Phase 6 — Blog, Kontak, Halaman Statis ✅ (1–2 hari)

> Halaman blog, kontak, kebijakan privasi, dan halaman statis lainnya.

### 6.1 Blog `/blog`

- [x] `Public\PostController@index` — listing artikel
- [x] Page Hero + Breadcrumb
- [x] Featured Post (1 artikel unggulan full-width)
- [x] Filter & Search: tab kategori (Tips/Info Program/Berita/Tutorial), search bar
- [x] Grid artikel 3 kolom: thumbnail, badge, judul, excerpt, tanggal, penulis
- [x] Pagination (10 per halaman)

### 6.2 Detail Blog `/blog/{slug}`

- [x] `Public\PostController@show`
- [x] Header: breadcrumb, kategori, judul H1, meta (tanggal, penulis, waktu baca)
- [x] Konten rich text (dari TinyMCE)
- [x] Tombol share: WhatsApp, Facebook, salin link
- [x] Artikel terkait (3 card)

### 6.3 Kontak `/kontak`

- [x] `Public\ContactController@index` + `store`
- [x] Page Hero + Breadcrumb
- [x] 2 kolom: Form kontak (kiri) + Info kontak (kanan)
- [x] Form: Nama, Email, WhatsApp, Subjek, Pesan
- [x] Info: alamat, telepon/WA, email, jam operasional, link sosmed, tombol WA
- [x] Google Maps embed + tombol "Buka di Google Maps"

### 6.4 Halaman Statis

- [x] `/kebijakan-privasi` — halaman kebijakan privasi
- [x] `/404` — halaman not found custom & on-brand
- [x] `/sukses-daftar` — konfirmasi setelah pendaftaran (nomor referensi + instruksi)

---

## Phase 7 — Admin Auth & Dashboard (1–2 hari)

> Sistem autentikasi admin, middleware role, dan dashboard.

### 7.1 Auth System

- [ ] Buat `AdminMiddleware.php` — cek user authenticated & is_active
- [ ] Buat `RoleMiddleware.php` — cek role superadmin/staff
- [ ] Halaman Login `/admin/login` — form email + password
- [ ] Fitur "Lupa Password" (jika SMTP dikonfigurasi)
- [ ] Redirect ke dashboard setelah login
- [ ] Konfigurasi role di `config/roles.php`

### 7.2 Layout Admin

- [ ] Buat `layouts/admin.blade.php` — layout admin panel
- [ ] Sidebar navigasi: Dashboard, Program, Pendaftaran, Galeri, Blog, Testimoni, FAQ, Layanan, Users, Settings
- [ ] Topbar: user info, tombol logout
- [ ] Responsive sidebar (Alpine.js)

### 7.3 Dashboard `/admin/dashboard`

- [ ] `Admin\DashboardController@index`
- [ ] Widget cards: Total Pendaftar, Pendaftar Bulan Ini, Pending, Program Aktif, Artikel, Galeri
- [ ] Grafik: line chart pendaftaran per bulan (6 bulan), pie chart distribusi per program
- [ ] Tabel 5 pendaftaran terbaru (nama, program, tanggal, status)

---

## Phase 8 — Admin CRUD: Program, Pendaftaran, Galeri, Blog (3 hari)

> CRUD admin untuk modul-modul utama.

### 8.1 Kelola Program `/admin/programs`

- [ ] `Admin\ProgramController` — index, create, store, edit, update, destroy
- [ ] Index: tabel + filter kategori/status + search + tombol "Tambah"
- [ ] Form: nama, slug (auto), kategori, thumbnail (upload+preview), deskripsi singkat
- [ ] Form: deskripsi lengkap (rich text), kurikulum (rich text), durasi, jadwal, kuota
- [ ] Form: harga (atau "Gratis"), fasilitas, syarat, meta SEO, status, urutan
- [ ] Drag & drop reorder
- [ ] `StoreProgramRequest` validasi

### 8.2 Kategori Program `/admin/program-categories`

- [ ] `Admin\ProgramCategoryController` — CRUD
- [ ] Tabel: nama, tipe (reguler/khusus), jumlah program
- [ ] Form: nama, slug, tipe, deskripsi
- [ ] Proteksi hapus jika masih ada program terhubung

### 8.3 Kelola Pendaftaran `/admin/registrations`

- [ ] `Admin\RegistrationController` — index, show, updateStatus
- [ ] Index: tabel + filter (jenis/program/status/tanggal) + search + export Excel/CSV
- [ ] Bulk action: ubah status sekaligus
- [ ] Detail: semua data pendaftar, foto, log status, catatan admin
- [ ] Tombol ubah status: Pending → Dikonfirmasi → Selesai / Ditolak
- [ ] Tombol buka WhatsApp pendaftar (link wa.me)

### 8.4 Kelola Galeri `/admin/gallery`

- [ ] `Admin\GalleryController` — CRUD
- [ ] Index: grid thumbnail + filter + drag & drop reorder
- [ ] Form: upload foto (max 5MB), judul, kategori, deskripsi, urutan, status
- [ ] Fitur batch upload multiple foto

### 8.5 Kelola Blog `/admin/posts`

- [ ] `Admin\PostController` — CRUD
- [ ] Index: tabel + filter kategori/status + search
- [ ] Form: judul, slug (auto), kategori, thumbnail, excerpt, konten (TinyMCE)
- [ ] Form: meta SEO, status (Draft/Terbit), tanggal publish (schedulable)

---

## Phase 9 — Admin CRUD: Testimoni, FAQ, Layanan, User, Settings (2 hari)

> CRUD admin untuk modul-modul pendukung.

### 9.1 Kelola Testimoni `/admin/testimonials`

- [ ] `Admin\TestimonialController` — CRUD
- [ ] Index: tabel + filter tipe/status
- [ ] Form: foto, nama, peran (Alumni/Pelanggan), program terkait, rating 1–5, isi, urutan, status

### 9.2 Kelola FAQ `/admin/faqs`

- [ ] `Admin\FaqController` — CRUD
- [ ] Index: tabel + drag & drop reorder per kategori
- [ ] Form: pertanyaan, jawaban (rich text), kategori, urutan, status

### 9.3 Kelola Layanan `/admin/services`

- [ ] `Admin\ServiceController` — CRUD
- [ ] Index: tabel + filter
- [ ] Form: nama, kategori, deskripsi singkat, harga mulai, harga sampai, status, urutan

### 9.4 Kategori Layanan `/admin/service-categories`

- [ ] `Admin\ServiceCategoryController` — CRUD
- [ ] Tabel: nama, ikon, urutan, jumlah layanan
- [ ] Form: nama, slug, pilih ikon, urutan

### 9.5 Kelola User Admin `/admin/users` *(Superadmin only)*

- [ ] `Admin\UserController` — CRUD
- [ ] Index: tabel (avatar, nama, email, role, status, terakhir login)
- [ ] Form: nama, email, role, password, foto profil, status
- [ ] Proteksi: hanya superadmin yang bisa akses

### 9.6 Pengaturan Umum `/admin/settings` *(Superadmin only)*

- [ ] `Admin\SettingController` — index, update
- [ ] Tab Identitas: nama lembaga, tagline, deskripsi, logo, favicon
- [ ] Tab Kontak: alamat, no. telepon/WA, email
- [ ] Tab Media Sosial: link Facebook, Instagram, YouTube, TikTok
- [ ] Tab SEO: meta title/desc default, Google Analytics ID, Google Maps embed URL
- [ ] Tab Konten Beranda: teks hero, angka statistik, CTA banner, toggle section

---

## Phase 10 — SEO, Optimasi & Testing (2 hari)

> Implementasi SEO, optimasi performa, dan bug fixing.

### 10.1 SEO

- [ ] Meta title & description dinamis per halaman
- [ ] Open Graph tags (og:title, og:description, og:image, dll)
- [ ] Setup `spatie/laravel-sitemap` — generate sitemap.xml otomatis
- [ ] Canonical URL di setiap halaman
- [ ] Schema markup JSON-LD (EducationalOrganization)
- [ ] Alt text pada semua gambar
- [ ] Slug SEO-friendly untuk program & blog

### 10.2 Keamanan

- [ ] Rate limiting pada form pendaftaran & kontak
- [ ] Honeypot anti-spam pada semua form publik
- [ ] File upload validation (tipe, ukuran, ekstensi)
- [ ] Verifikasi CSRF protection aktif
- [ ] Admin route dilindungi middleware auth + role

### 10.3 Optimasi Performa

- [ ] Image optimization (kompresi & resize otomatis)
- [ ] Lazy loading gambar
- [ ] Minifikasi CSS & JS (production build)
- [ ] Cache query yang sering dipakai (settings, program list)
- [ ] Cek responsive di semua breakpoint (mobile, tablet, desktop)

### 10.4 Testing & Bug Fix

- [ ] Test semua form publik (pendaftaran, kontak, konsultasi)
- [ ] Test semua CRUD admin
- [ ] Test filter & search (Alpine.js)
- [ ] Cross-browser testing
- [ ] Perbaiki semua bug yang ditemukan

---

## Phase 11 — Deployment & Serah Terima (1 hari)

> Deploy ke server production dan serah terima ke klien.

- [ ] Setup server (VPS/shared hosting)
- [ ] Konfigurasi domain & SSL
- [ ] Konfigurasi environment production (`.env`)
- [ ] Setup database production + jalankan migration & seeder
- [ ] Upload project ke server (Git / manual)
- [ ] Konfigurasi web server (Nginx / Apache)
- [ ] `php artisan storage:link` di server
- [ ] `php artisan config:cache`, `route:cache`, `view:cache`
- [ ] Test seluruh fitur di production
- [ ] Buat akun admin untuk klien
- [ ] Dokumentasi singkat penggunaan admin panel
- [ ] Serah terima project ke klien

---

> **Catatan:**
> - Gunakan `spatie/laravel-permission` atau custom role implementation
> - Semua timestamp gunakan timezone `Asia/Jakarta`
> - Nomor referensi pendaftaran format: `YWT-YYYYMMDD-XXXXX`
> - Rich text editor: TinyMCE untuk admin panel
> - Pagination menggunakan Tailwind CSS preset Laravel
