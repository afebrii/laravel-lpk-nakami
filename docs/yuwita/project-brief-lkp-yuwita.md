# 📋 Project Brief — Redesign Website LKP/LPK Yuwita

> **Versi Dokumen:** 2.0
> **Tanggal:** 11 Maret 2026
> **Status:** Final Draft

---

## 1. Gambaran Umum

| Item | Detail |
|---|---|
| **Nama Project** | Redesign Website LKP/LPK Yuwita |
| **Klien** | LKP/LPK Yuwita, Tasikmalaya |
| **Website Lama** | https://www.lkp-yuwita.com |
| **Tipe Project** | Redesign & Pengembangan Web Baru |
| **Sifat** | Profil Lembaga + Sistem Pendaftaran + Admin Panel |

### Deskripsi Singkat

LKP/LPK Yuwita adalah lembaga kursus dan pelatihan kecantikan yang berdiri sejak 20 November 2006 di Jalan Leuwianyar No. 107, Kota Tasikmalaya, Jawa Barat. Lembaga ini menyelenggarakan pelatihan tata kecantikan (kulit, rambut, rias pengantin, hantaran) sekaligus membuka layanan salon profesional untuk masyarakat umum.

Website lama dibangun menggunakan Google Sites (masih berstatus BETA), sehingga perlu dimigrasi ke platform yang lebih profesional, scalable, dan dapat dikelola secara mandiri.

---

## 2. Tujuan Project

- Meningkatkan citra profesional lembaga melalui tampilan website yang modern dan elegan
- Memberikan informasi program pelatihan yang lengkap, terstruktur, dan mudah dipahami calon peserta
- Menyediakan sistem pendaftaran online yang terintegrasi dan mudah digunakan
- Memudahkan admin mengelola seluruh konten website secara mandiri tanpa perlu developer
- Meningkatkan konversi calon pendaftar melalui UX dan alur informasi yang lebih baik
- Membangun kepercayaan calon peserta melalui tampilan testimoni, galeri, dan legalitas yang jelas

---

## 3. Tech Stack

| Layer | Teknologi | Versi |
|---|---|---|
| **Framework Backend** | Laravel | 12.x |
| **Template Engine** | Blade | — |
| **CSS Framework** | Tailwind CSS | v4 |
| **JS Framework** | Alpine.js | v3 |
| **Database** | MySQL | 8.x |
| **PHP** | PHP | 8.2+ |
| **Rich Text Editor** | TinyMCE / Quill | — |
| **File Storage** | Laravel Storage (local/S3) | — |

---

## 4. Desain & Branding

### Konsep Visual
- **Tema:** Elegan, feminin, modern, dan profesional
- **Mood:** Premium beauty salon — bersih, lembut, terpercaya

### Color Palette

| Nama | Hex | Penggunaan |
|---|---|---|
| Rose Gold | `#B76E79` | Primary, CTA button, link aktif |
| Dusty Pink | `#E8B4BC` | Accent, hover state, badge |
| Soft Cream | `#FDF6F0` | Background halaman |
| Pure White | `#FFFFFF` | Card, surface, form input |
| Charcoal | `#2D2D2D` | Heading, teks utama |
| Dark Gray | `#555555` | Body text, label |
| Light Gray | `#F5F5F5` | Border, divider, disabled state |

### Typography

| Jenis | Font | Penggunaan |
|---|---|---|
| Heading | Playfair Display (serif) | H1–H3, nama program, hero title |
| Body | DM Sans / Inter (sans-serif) | Paragraf, label, navigasi |
| Accent | Italiana (serif) | Tagline, quote section |

### Komponen UI Global
- Navbar: logo kiri, menu tengah, CTA button kanan ("Daftar Sekarang")
- Sticky navbar saat scroll dengan shadow tipis
- Footer: logo, deskripsi singkat, navigasi cepat, sosmed, copyright
- Floating WhatsApp button (kanan bawah)
- Breadcrumb di semua halaman dalam (kecuali beranda)
- Page transition halus (Alpine.js)
- Loading state pada form submit
- Toast notification (sukses / gagal)

---

## 5. Struktur Navigasi

```
Beranda
Program Pelatihan
  ├── Kelas Reguler
  │   ├── Make Up Artist (MUA)
  │   ├── Tata Kecantikan Rambut
  │   ├── Kecantikan Kulit
  │   └── Hand Bouquet
  └── Kelas Khusus
      ├── Make Up Artist (MUA)
      ├── Rias Pengantin
      ├── Tata Kecantikan Rambut
      └── Kecantikan Kulit
Layanan Salon
Galeri
Tentang Kami
  ├── Profil & Sejarah
  ├── Visi & Misi
  ├── Struktur Organisasi
  ├── Legalitas
  ├── Penghargaan
  ├── Testimoni
  └── Blog
FAQ
Kontak
Pendaftaran (CTA utama)
```

---

## 6. Detail Halaman — Public Pages

---

### 6.1 Beranda `/`

**Tujuan:** Halaman utama sebagai pintu masuk, memperkenalkan lembaga dan mendorong pengunjung untuk mendaftar atau menjelajahi program.

**Sections (urutan dari atas ke bawah):**

#### Section 1 — Hero
- Background: gambar/video kegiatan pelatihan atau foto salon
- Headline utama: "Asah Keahlian Kecantikan & Nikmati Layanan Salon Profesional"
- Subheadline: deskripsi singkat lembaga (1–2 kalimat)
- 2 tombol CTA: **"Lihat Program Pelatihan"** (primary) dan **"Konsultasi Gratis"** (outline/secondary)
- Badge kepercayaan (trust badges): "Berdiri sejak 2006", "Ribuan Alumni", "Bersertifikat Resmi"

#### Section 2 — Statistik / Angka
- Counter animasi (Alpine.js):
  - Jumlah Alumni (contoh: 5.000+)
  - Tahun Berdiri (contoh: 18+ Tahun)
  - Program Pelatihan (contoh: 8 Program)
  - Mitra Perusahaan (contoh: 20+ Mitra)

#### Section 3 — Tentang Singkat
- Foto gedung / kegiatan (kiri)
- Teks ringkas latar belakang lembaga (kanan)
- Tombol "Selengkapnya" menuju `/tentang`
- Highlight 3 poin keunggulan (ikon + teks): Tenaga Pengajar Berpengalaman, Fasilitas Modern, Bersertifikat Nasional

#### Section 4 — Program Unggulan
- Heading: "Program Pelatihan Kami"
- Tab filter: **Semua / Kelas Reguler / Kelas Khusus** (Alpine.js)
- Grid card program (3 kolom desktop, 1 kolom mobile), maksimal 6 card di beranda
- Setiap card berisi: thumbnail, nama program, kategori (badge), deskripsi singkat, harga, tombol "Detail Program"
- Tombol "Lihat Semua Program" di bawah grid

#### Section 5 — Layanan Salon
- Heading: "Layanan Salon Kami"
- 2 kolom: **Rambut** dan **Wajah & Tubuh**
- List layanan dengan harga (icon + nama + harga)
- Tombol CTA: "Reservasi via WhatsApp"

#### Section 6 — Mengapa Memilih Kami
- 4–6 kartu fitur (icon besar + judul + deskripsi):
  - Pengajar dari kalangan dosen & praktisi
  - Fasilitas praktek lengkap & up to date
  - Sertifikat resmi & diakui nasional
  - Tersalurkan ke perusahaan lokal & nasional
  - Kelas reguler & khusus tersedia
  - Bimbingan hingga siap kerja / wirausaha

#### Section 7 — Galeri Preview
- Heading: "Galeri Kegiatan"
- Grid foto masonry / 3 kolom (6–9 foto terbaru)
- Hover: overlay dengan icon zoom
- Tombol "Lihat Semua Galeri"

#### Section 8 — Testimoni
- Heading: "Kata Alumni & Pelanggan Kami"
- Slider / carousel testimoni (Alpine.js)
- Setiap card: foto, nama, peran (Alumni / Pelanggan), program (jika alumni), bintang rating, kutipan testimoni
- Tombol "Lihat Semua Testimoni"

#### Section 9 — Blog / Artikel Terbaru
- Heading: "Tips & Informasi Terbaru"
- 3 card artikel terbaru: thumbnail, kategori, judul, tanggal, excerpt, tombol "Baca Selengkapnya"
- Tombol "Lihat Semua Artikel"

#### Section 10 — CTA Banner
- Banner full-width warna rose gold
- Teks: "Siap Memulai Karir di Dunia Kecantikan?"
- Subtext: singkat tentang program gratis / promo yang sedang berjalan
- Tombol: "Daftar Sekarang" dan "Hubungi Kami"

#### Section 11 — Mitra / Logo Partner
- Heading: "Telah Bekerja Sama Dengan"
- Baris logo mitra (grayscale, hover berwarna)

---

### 6.2 Program Pelatihan `/program`

**Tujuan:** Menampilkan semua program secara terstruktur agar calon peserta mudah membandingkan dan memilih.

**Sections:**

#### Section 1 — Page Hero / Banner
- Judul halaman: "Program Pelatihan"
- Breadcrumb: Beranda > Program Pelatihan
- Subjudul singkat

#### Section 2 — Filter & Pencarian
- Tab kategori: **Semua | Kelas Reguler | Kelas Khusus**
- Search bar: cari nama program
- Filter harga: Gratis / Berbayar
- Jumlah program yang tampil (contoh: "Menampilkan 8 program")

#### Section 3 — Penjelasan Singkat Tiap Kategori
- **Kelas Reguler (Rp 100.000):** Cocok untuk pemula, mempelajari dasar-dasar kecantikan
- **Kelas Khusus:** Intensif, mendalam, dilengkapi sertifikasi, untuk yang ingin jadi profesional

#### Section 4 — Grid Program
- Setiap card berisi:
  - Thumbnail program
  - Badge kategori (Reguler / Khusus) + warna berbeda
  - Nama program
  - Deskripsi singkat (2–3 baris)
  - Durasi pelatihan
  - Harga (atau badge "GRATIS" jika promo)
  - Tombol "Lihat Detail"
- Animasi filter dengan Alpine.js (tanpa reload)

#### Section 5 — CTA Konsultasi
- Banner kecil: "Bingung memilih program? Konsultasikan dengan kami secara gratis."
- Tombol WhatsApp + Tombol Form Konsultasi

---

### 6.3 Detail Program `/program/{slug}`

**Tujuan:** Memberikan informasi lengkap satu program agar calon peserta yakin untuk mendaftar.

**Sections:**

#### Section 1 — Header Program
- Breadcrumb: Beranda > Program Pelatihan > [Nama Program]
- Thumbnail / banner program (full width)
- Nama program (H1)
- Badge: kategori, status (Tersedia / Penuh / Segera Hadir)
- Harga + info singkat (durasi, sertifikasi)

#### Section 2 — Deskripsi Program
- Paragraf deskripsi lengkap program
- Tujuan pembelajaran (bullet list):
  - Apa yang akan dipelajari
  - Kompetensi yang dikuasai setelah lulus

#### Section 3 — Kurikulum / Silabus
- Accordion per modul/pertemuan (Alpine.js):
  - Nama modul
  - Topik yang dibahas
  - Metode (teori / praktek)

#### Section 4 — Informasi Program
- Tabel / card info:
  - Durasi total
  - Jadwal (hari/jam)
  - Metode pembelajaran (tatap muka / praktek)
  - Kuota peserta
  - Fasilitas yang didapat (modul, alat praktek, sertifikat, dsb)
  - Syarat pendaftaran

#### Section 5 — Persyaratan Pendaftaran
- List dokumen yang diperlukan:
  - KTP
  - Kartu Keluarga
  - Pas Foto 3x4
  - Email & No HP Ibu Kandung
  - (untuk program tertentu: usia min/max, ijazah terakhir, dsb)

#### Section 6 — Biaya & Pembayaran
- Rincian biaya
- Info transfer / pembayaran manual
- Keterangan promo (jika ada)

#### Section 7 — Testimoni Alumni Program Ini
- 2–3 card testimoni dari alumni program yang sama

#### Section 8 — Tombol Daftar (Sticky di mobile)
- Tombol besar: "Daftar Program Ini"
- Tombol sekunder: "Konsultasi Dulu via WhatsApp"

#### Section 9 — Program Terkait
- 3 card program lainnya yang mungkin relevan

---

### 6.4 Layanan Salon `/layanan`

**Tujuan:** Menampilkan daftar layanan salon beserta harga agar pelanggan bisa memilih sebelum datang.

**Sections:**

#### Section 1 — Page Hero
- Judul: "Layanan Salon Profesional"
- Breadcrumb + subjudul singkat

#### Section 2 — Filter Kategori
- Tab: **Semua | Rambut | Wajah & Tubuh**
- Animasi filter Alpine.js

#### Section 3 — Daftar Layanan Per Kategori

**Kategori Rambut:**
| Layanan | Harga |
|---|---|
| Potongan Rambut | Rp 20.000 |
| Cuci Catok | Rp 20.000 |
| Cream Bath | Rp 25.000 |
| Hair Mask | Rp 30.000 |
| Hair Spa | Rp 30.000 |
| Pewarnaan Rambut | Rp 50.000 |
| Rebonding / Smoothing | Mulai Rp 100.000 |
| Variasi Rambut | Rp 50.000 |

**Kategori Wajah & Tubuh:**
| Layanan | Harga |
|---|---|
| Facial | Rp 35.000 |
| Totok Wajah | Rp 25.000 |
| Kriting Bulu Mata | Rp 40.000 |
| Sauna | Rp 25.000 |
| Lulur | Rp 50.000 |
| Baby List | Rp 40.000 |
| Make Up | Rp 75.000 |
| Variasi Kerudung | Rp 50.000 |

- Setiap layanan: ikon kategori, nama, deskripsi singkat (1 baris), harga
- Hover card: efek lift ringan

#### Section 4 — Info Reservasi
- Cara reservasi: datang langsung / via WhatsApp
- Jam operasional
- Alamat lengkap
- Tombol: "Reservasi via WhatsApp"

#### Section 5 — Galeri Hasil Layanan
- 6 foto hasil layanan (before/after atau portofolio)

---

### 6.5 Galeri `/galeri`

**Tujuan:** Menampilkan portofolio kegiatan, hasil kerja siswa, dan suasana lembaga untuk membangun kepercayaan.

**Sections:**

#### Section 1 — Page Hero
- Judul: "Galeri Yuwita"
- Breadcrumb + subjudul

#### Section 2 — Filter Kategori
- Tab: **Semua | Kegiatan Pelatihan | Hasil Karya | Rias Pengantin | Salon | Acara / Event**
- Filter Alpine.js tanpa reload

#### Section 3 — Grid Foto
- Masonry grid (Pinterest-style) atau grid 3 kolom
- Setiap foto: thumbnail, overlay hover (ikon zoom + judul foto)
- Lightbox saat diklik (Alpine.js + pure CSS atau library ringan)
- Lazy loading gambar

#### Section 4 — Load More / Pagination
- Tombol "Muat Lebih Banyak" (infinite scroll atau pagination)

---

### 6.6 Tentang Kami `/tentang`

**Tujuan:** Memperkenalkan lembaga secara mendalam — sejarah, visi misi, tim, legalitas, dan penghargaan — untuk membangun kepercayaan.

**Sections:**

#### Section 1 — Page Hero
- Judul: "Tentang LKP/LPK Yuwita"
- Breadcrumb

#### Section 2 — Latar Belakang & Sejarah
- Foto gedung / pendiri
- Narasi sejarah lengkap:
  - Berdiri 20 November 2006
  - Terinspirasi dari tingginya pengangguran di era reformasi
  - Awal mula pelatihan gratis untuk peserta kurang mampu & anak putus sekolah
  - Perkembangan dari tahun ke tahun
- Timeline visual perkembangan lembaga (dengan Alpine.js accordion atau CSS timeline)

#### Section 3 — Visi & Misi
- Visi: "Terwujudnya Masyarakat Yang Berakhlak Mulia, Terampil, Kreatif, Inovatif, Mandiri dan Memiliki Daya Saing Yang Tinggi."
- Misi (list):
  1. Mewujudkan Program Pendidikan Luar Sekolah yang Mapan, Unggul dan Berguna
  2. Membantu Pemerintah Mencerdaskan Kehidupan Bermasyarakat
  3. Memberikan Pelatihan dan Keterampilan Melalui Program Pelatihan Kerja
- Desain: 2 kolom card besar (Visi kiri, Misi kanan)

#### Section 4 — Keunggulan Lembaga
- 4–6 kartu keunggulan dengan icon:
  - Fasilitas Praktek Lengkap & Up to Date
  - Tenaga Pengajar Profesional (Dosen & Praktisi)
  - Tersalurkan ke Perusahaan Lokal & Nasional
  - Bersertifikat Resmi
  - Program Gratis untuk Masyarakat Kurang Mampu
  - Kerjasama dengan Berbagai Industri Kecantikan

#### Section 5 — Struktur Organisasi
- Heading: "Struktur Organisasi"
- Bagan organisasi visual (foto + nama + jabatan):
  - Ketua / Pimpinan Lembaga
  - Sekretaris
  - Bendahara
  - Instruktur / Pengajar (per bidang)
  - Staff Administrasi
- Desain: tree/chart dengan CSS atau gambar yang dapat di-zoom

#### Section 6 — Legalitas
- Heading: "Legalitas & Izin Operasional"
- Daftar dokumen legalitas dengan status & nomor izin:
  - Akta Pendirian
  - Izin Operasional Dinas Pendidikan
  - NPWP Lembaga
  - Sertifikat Akreditasi (jika ada)
  - Nomor Induk Berusaha (NIB)
- Setiap item: ikon dokumen, nama dokumen, nomor, tahun terbit, thumbnail scan (bisa diklik untuk zoom)

#### Section 7 — Penghargaan
- Heading: "Penghargaan & Prestasi"
- Grid card penghargaan:
  - Foto piala / sertifikat penghargaan
  - Nama penghargaan
  - Pemberi penghargaan
  - Tahun
- Diurutkan dari terbaru

#### Section 8 — Kebijakan Privasi
- Link menuju `/kebijakan-privasi` (halaman terpisah)

---

### 6.7 Pendaftaran `/daftar`

**Tujuan:** Memudahkan calon peserta mendaftar konsultasi atau langsung mendaftar program pelatihan.

**Sections:**

#### Section 1 — Page Hero
- Judul: "Pendaftaran Online"
- Breadcrumb + instruksi singkat cara mendaftar

#### Section 2 — Pilihan Jenis Pendaftaran
- 2 tab besar / card pilihan:
  - **Konsultasi Gratis** — untuk yang ingin bertanya dulu sebelum mendaftar
  - **Daftar Program Pelatihan** — langsung mendaftar ke program yang dipilih
- Aktif tab yang dipilih (Alpine.js)

#### Section 3A — Form Konsultasi (Tab Konsultasi)
**Field:**
- Nama Lengkap (required)
- Nomor WhatsApp (required)
- Email (opsional)
- Program yang diminati (dropdown, opsional)
- Pesan / Pertanyaan (textarea, required)
- Captcha / Honeypot (anti-spam)
- Tombol: "Kirim Pesan Konsultasi"

**After submit:**
- Halaman sukses / toast: "Terima kasih! Admin akan menghubungi Anda via WhatsApp dalam 1x24 jam."

#### Section 3B — Form Daftar Pelatihan (Tab Pelatihan)
**Field:**
- Pilih Program (dropdown, required)
- Nama Lengkap (required)
- Nomor WhatsApp (required)
- Email (required)
- Tempat, Tanggal Lahir (required)
- Jenis Kelamin (radio: L/P)
- Alamat Lengkap (textarea, required)
- Pendidikan Terakhir (dropdown: SD / SMP / SMA / D3 / S1 / Lainnya)
- Pekerjaan Saat Ini (text, opsional)
- No HP Ibu Kandung (required, untuk beberapa program)
- Motivasi Mengikuti Program (textarea, required)
- Upload Pas Foto 3x4 (file upload, max 2MB, jpg/png)
- Pernyataan persetujuan (checkbox): "Saya menyetujui syarat & ketentuan pendaftaran"
- Captcha / Honeypot
- Tombol: "Kirim Formulir Pendaftaran"

**After submit:**
- Halaman sukses: nomor referensi pendaftaran, instruksi selanjutnya (bawa dokumen fisik ke kantor, dll)

#### Section 4 — Syarat & Dokumen
- Accordion per program yang menampilkan dokumen yang diperlukan
- Info umum: usia minimal, status (tidak sedang bekerja/sekolah untuk program tertentu)

#### Section 5 — Info Kontak Pendaftaran
- Nomor WhatsApp admin
- Jam layanan pendaftaran
- Alamat kantor

---

### 6.8 Blog `/blog`

**Tujuan:** Menyediakan konten edukatif seputar kecantikan untuk meningkatkan SEO dan engagement.

**Sections:**

#### Section 1 — Page Hero
- Judul: "Blog & Artikel"
- Breadcrumb + subjudul: "Tips kecantikan, info program, dan berita terbaru dari Yuwita"

#### Section 2 — Featured Post
- 1 artikel unggulan (full-width card):
  - Thumbnail besar
  - Kategori badge
  - Judul (besar)
  - Excerpt
  - Tanggal + penulis
  - Tombol "Baca Selengkapnya"

#### Section 3 — Filter & Search
- Kategori tab: **Semua | Tips Kecantikan | Info Program | Berita Lembaga | Tutorial**
- Search bar: cari judul artikel

#### Section 4 — Grid Artikel
- Grid 3 kolom (desktop), 2 kolom (tablet), 1 kolom (mobile)
- Setiap card: thumbnail, kategori badge, judul, excerpt, tanggal, penulis, tombol baca
- Pagination di bagian bawah (10 artikel per halaman)

---

### 6.9 Detail Blog `/blog/{slug}`

**Sections:**

#### Section 1 — Header Artikel
- Breadcrumb: Beranda > Blog > [Judul Artikel]
- Kategori badge
- Judul artikel (H1, besar)
- Meta: tanggal publish, nama penulis, estimasi waktu baca

#### Section 2 — Konten Artikel
- Thumbnail utama (full width)
- Konten rich text (hasil dari TinyMCE): paragraf, heading, gambar inline, list, blockquote
- Tombol share: WhatsApp, Facebook, salin link

#### Section 3 — Artikel Terkait
- 3 card artikel dari kategori yang sama

---

### 6.10 FAQ `/faq`

**Tujuan:** Menjawab pertanyaan umum calon peserta dan pelanggan untuk mengurangi beban admin.

**Sections:**

#### Section 1 — Page Hero
- Judul: "Pertanyaan yang Sering Diajukan"
- Breadcrumb + search bar FAQ

#### Section 2 — Filter Kategori FAQ
- Tab: **Semua | Pendaftaran | Program Pelatihan | Biaya | Sertifikasi | Layanan Salon | Lainnya**

#### Section 3 — Accordion FAQ
- Setiap item: pertanyaan (klik untuk buka) + jawaban
- Animasi buka/tutup dengan Alpine.js
- Contoh pertanyaan yang perlu dijawab:
  - Bagaimana cara mendaftar program pelatihan?
  - Apa saja dokumen yang diperlukan untuk mendaftar?
  - Apakah ada batasan usia untuk mengikuti pelatihan?
  - Apakah pelatihan ini bersertifikat resmi?
  - Berapa lama durasi masing-masing program?
  - Apakah bisa dicicil atau ada beasiswa?
  - Apakah ada program gratis?
  - Setelah lulus apakah langsung bisa kerja?
  - Apakah ada magang setelah pelatihan?
  - Bagaimana cara reservasi layanan salon?
  - Apakah bisa daftar lebih dari satu program?

#### Section 4 — CTA Belum Terjawab
- "Pertanyaanmu belum ada di sini?"
- Tombol: "Hubungi Admin via WhatsApp" + "Kirim Pertanyaan via Form"

---

### 6.11 Testimoni `/testimoni`

**Tujuan:** Menampilkan bukti sosial dari alumni dan pelanggan untuk membangun kepercayaan.

**Sections:**

#### Section 1 — Page Hero
- Judul: "Kata Mereka Tentang Yuwita"
- Breadcrumb + rangkuman rating (bintang rata-rata)

#### Section 2 — Filter
- Tab: **Semua | Alumni Pelatihan | Pelanggan Salon**
- Filter per program (dropdown)

#### Section 3 — Grid Testimoni
- Grid 3 kolom card:
  - Foto profil (atau inisial jika tidak ada foto)
  - Nama
  - Peran: "Alumni Program [Nama Program]" / "Pelanggan Setia"
  - Rating bintang (1–5)
  - Kutipan testimoni
  - Tahun / bulan
- Pagination atau load more

---

### 6.12 Kontak `/kontak`

**Tujuan:** Memberikan semua informasi kontak dan memudahkan pengunjung menghubungi lembaga.

**Sections:**

#### Section 1 — Page Hero
- Judul: "Hubungi Kami"
- Breadcrumb

#### Section 2 — Info Kontak (2 kolom)
**Kolom Kiri — Form Kontak:**
- Nama Lengkap (required)
- Email (required)
- Nomor WhatsApp (opsional)
- Subjek (required)
- Pesan (textarea, required)
- Tombol: "Kirim Pesan"

**Kolom Kanan — Info:**
- Alamat: Jl. Leuwianyar No. 107, Kota Tasikmalaya, Jawa Barat
- Telepon / WhatsApp: +62 852-2350-6611
- Email: lpkyuwita1@gmail.com
- Jam Operasional:
  - Senin–Sabtu: 08.00–17.00 WIB
  - Minggu: Tutup
- Link media sosial: Facebook, Instagram, YouTube
- Tombol: "Chat via WhatsApp"

#### Section 3 — Google Maps Embed
- Peta interaktif lokasi Jl. Leuwianyar No. 107 Tasikmalaya
- Tombol: "Buka di Google Maps"

---

### 6.13 Halaman Tambahan

#### `/kebijakan-privasi`
- Judul + konten kebijakan privasi (full rich text)
- Breadcrumb

#### `/404`
- Halaman not found yang custom dan on-brand
- Ilustrasi menarik + pesan ramah
- Tombol: "Kembali ke Beranda"

#### `/sukses-daftar`
- Halaman konfirmasi setelah submit formulir
- Nomor referensi pendaftaran
- Instruksi langkah selanjutnya
- Tombol: "Kembali ke Beranda"

---

## 7. Admin Panel — Detail Per Modul

Base URL: `/admin` | Auth: session-based (Laravel)

---

### 7.1 Login Admin `/admin/login`
- Form: email + password
- Tombol "Lupa Password" (reset via email jika SMTP dikonfigurasi)
- Redirect ke dashboard setelah login

---

### 7.2 Dashboard `/admin/dashboard`

**Widget / Cards:**
- Total Pendaftar (all time)
- Pendaftar Bulan Ini
- Pendaftar Pending (perlu dikonfirmasi)
- Total Program Aktif
- Total Artikel Terbit
- Total Galeri

**Grafik:**
- Line chart pendaftaran per bulan (6 bulan terakhir)
- Pie chart distribusi per program

**Tabel Terbaru:**
- 5 pendaftaran terbaru (nama, program, tanggal, status)
- Tombol "Lihat Semua"

---

### 7.3 Kelola Program `/admin/programs`

**Index (list):**
- Tabel: thumbnail kecil, nama program, kategori, harga, status (aktif/nonaktif), urutan, aksi
- Filter: kategori, status
- Search: nama program
- Tombol "Tambah Program"
- Drag & drop reorder (urutan tampil di frontend)

**Form Tambah/Edit:**
- Nama Program
- Slug (auto-generate dari nama, bisa diedit)
- Kategori (dropdown → pilih dari `program_categories`)
- Thumbnail (upload + preview)
- Deskripsi Singkat (textarea, untuk card di listing)
- Deskripsi Lengkap (rich text editor)
- Kurikulum / Silabus (rich text editor)
- Durasi Pelatihan
- Jadwal
- Kuota Peserta
- Harga (angka, atau centang "Gratis")
- Fasilitas yang Didapat (rich text / list builder)
- Syarat Pendaftaran (rich text / list)
- Meta Title & Meta Description (SEO)
- Status: Aktif / Nonaktif / Segera Hadir
- Urutan tampil

---

### 7.4 Kategori Program `/admin/program-categories`
- Tabel: nama, tipe (reguler/khusus), jumlah program, aksi
- Form: nama, slug, tipe, deskripsi
- Hapus hanya jika tidak ada program terhubung

---

### 7.5 Kelola Pendaftaran `/admin/registrations`

**Index (list):**
- Tabel: no. referensi, nama, program/jenis, tanggal daftar, status (badge warna), aksi
- Filter: jenis (konsultasi/pelatihan), program, status, tanggal
- Search: nama, email, nomor WA
- Export: tombol export ke Excel/CSV
- Bulk action: ubah status sekaligus

**Detail Pendaftaran:**
- Semua data yang diisi pendaftar
- Foto yang diupload (pas foto)
- Riwayat perubahan status (log)
- Field catatan admin (textarea internal)
- Tombol ubah status: Pending → Dikonfirmasi → Selesai / Ditolak
- Tombol: buka WhatsApp pendaftar langsung (via link `wa.me`)

---

### 7.6 Kelola Galeri `/admin/gallery`

**Index:**
- Grid thumbnail foto + judul + kategori + status + aksi
- Filter kategori, status
- Drag & drop reorder

**Form Tambah/Edit:**
- Upload foto (max 5MB, jpg/png/webp)
- Judul foto
- Kategori (dropdown)
- Deskripsi (opsional)
- Urutan
- Status aktif/nonaktif

**Fitur:**
- Upload multiple foto sekaligus (batch upload)

---

### 7.7 Kelola Blog `/admin/posts`

**Index:**
- Tabel: thumbnail, judul, kategori, penulis, status, tanggal publish, aksi
- Filter: kategori, status (draft/terbit)
- Search judul

**Form Tambah/Edit:**
- Judul
- Slug (auto-generate)
- Kategori
- Thumbnail (upload + preview)
- Excerpt / Ringkasan
- Konten (rich text editor — TinyMCE)
- Meta Title & Description (SEO)
- Status: Draft / Terbit
- Tanggal Publish (bisa dijadwalkan)

---

### 7.8 Kelola Testimoni `/admin/testimonials`

**Index:**
- Tabel: foto, nama, peran, program, rating, status, urutan, aksi
- Filter: tipe (alumni/pelanggan), status

**Form Tambah/Edit:**
- Foto (upload, opsional)
- Nama
- Peran: Alumni / Pelanggan Salon
- Program terkait (dropdown, jika alumni)
- Rating (1–5 bintang)
- Isi testimoni (textarea)
- Urutan
- Status aktif/nonaktif

---

### 7.9 Kelola FAQ `/admin/faqs`

**Index:**
- Tabel: pertanyaan (singkat), kategori, urutan, status, aksi
- Drag & drop reorder per kategori

**Form Tambah/Edit:**
- Pertanyaan
- Jawaban (textarea / rich text)
- Kategori FAQ
- Urutan
- Status

---

### 7.10 Kelola Layanan `/admin/services`

**Index:**
- Tabel: nama layanan, kategori, harga awal, harga akhir, status, urutan, aksi

**Form Tambah/Edit:**
- Nama Layanan
- Kategori (dropdown → dari `service_categories`)
- Deskripsi singkat
- Harga Mulai (angka)
- Harga Sampai (angka, opsional — untuk range harga)
- Status aktif/nonaktif
- Urutan

---

### 7.11 Kategori Layanan `/admin/service-categories`
- Tabel: nama, ikon, urutan, jumlah layanan, aksi
- Form: nama, slug, pilih ikon (dari set icon), urutan

---

### 7.12 Kelola User Admin `/admin/users` *(Superadmin only)*

**Index:**
- Tabel: avatar, nama, email, role, status aktif, terakhir login, aksi

**Form Tambah/Edit:**
- Nama
- Email
- Role: Superadmin / Staff
- Password (baru atau reset)
- Foto profil (upload)
- Status aktif/nonaktif

---

### 7.13 Pengaturan Umum `/admin/settings` *(Superadmin only)*

**Tab Identitas Lembaga:**
- Nama Lembaga
- Tagline
- Deskripsi Singkat (untuk meta description & footer)
- Logo (upload)
- Favicon (upload)

**Tab Kontak:**
- Alamat Lengkap
- Nomor Telepon / WhatsApp Utama
- Nomor WhatsApp Admin / Chat
- Email

**Tab Media Sosial:**
- Link Facebook
- Link Instagram
- Link YouTube
- Link TikTok (opsional)

**Tab SEO:**
- Meta Title Default
- Meta Description Default
- Google Analytics ID (opsional)
- Google Maps Embed URL

**Tab Konten Beranda:**
- Teks hero (headline & subheadline)
- Angka statistik (alumni, tahun berdiri, program, mitra) — editable
- Teks CTA banner
- Status tampil section (aktifkan/nonaktifkan section beranda)

---

## 8. Database Schema Lengkap

```sql
-- Users (admin)
users: id, name, email, password, role ENUM('superadmin','staff'),
       avatar, is_active BOOLEAN, last_login_at, remember_token, timestamps

-- Program Categories
program_categories: id, name, slug, type ENUM('reguler','khusus'),
                    description, timestamps

-- Programs
programs: id, category_id FK, name, slug, short_description, description LONGTEXT,
          curriculum LONGTEXT, duration, schedule, quota INT, price DECIMAL(10,2),
          is_free BOOLEAN, thumbnail, facilities LONGTEXT, requirements LONGTEXT,
          meta_title, meta_description, status ENUM('active','inactive','coming_soon'),
          order INT, timestamps

-- Registrations
registrations: id, ref_code VARCHAR(20) UNIQUE, type ENUM('konsultasi','pelatihan'),
               program_id FK NULLABLE, name, phone, email, address TEXT,
               gender ENUM('L','P') NULLABLE, dob DATE NULLABLE,
               last_education VARCHAR(50) NULLABLE, occupation VARCHAR(100) NULLABLE,
               mother_phone VARCHAR(20) NULLABLE, motivation TEXT NULLABLE,
               photo VARCHAR(255) NULLABLE, message TEXT NULLABLE,
               status ENUM('pending','confirmed','done','rejected'),
               admin_notes TEXT, confirmed_at, timestamps

-- Gallery
gallery: id, title, image, category VARCHAR(50), description,
         order INT, is_active BOOLEAN, timestamps

-- Posts (Blog)
posts: id, user_id FK, title, slug, excerpt TEXT, content LONGTEXT,
       thumbnail, category VARCHAR(50), meta_title, meta_description,
       is_published BOOLEAN, published_at, timestamps

-- Testimonials
testimonials: id, name, type ENUM('alumni','pelanggan'), program_id FK NULLABLE,
              content TEXT, photo, rating TINYINT(1), order INT,
              is_active BOOLEAN, timestamps

-- FAQs
faqs: id, question, answer TEXT, category VARCHAR(50),
      order INT, is_active BOOLEAN, timestamps

-- Service Categories
service_categories: id, name, slug, icon VARCHAR(50), order INT, timestamps

-- Services
services: id, category_id FK, name, short_description,
          price_start DECIMAL(10,2), price_end DECIMAL(10,2) NULLABLE,
          is_active BOOLEAN, order INT, timestamps

-- Settings
settings: id, key VARCHAR(100) UNIQUE, value LONGTEXT,
          type ENUM('text','textarea','image','boolean','number'),
          label VARCHAR(150), group VARCHAR(50), timestamps
```

---

## 9. Struktur Folder Laravel

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Public/
│   │   │   ├── HomeController.php
│   │   │   ├── ProgramController.php
│   │   │   ├── ServiceController.php
│   │   │   ├── GalleryController.php
│   │   │   ├── AboutController.php
│   │   │   ├── RegistrationController.php
│   │   │   ├── PostController.php
│   │   │   ├── FaqController.php
│   │   │   ├── TestimonialController.php
│   │   │   └── ContactController.php
│   │   └── Admin/
│   │       ├── DashboardController.php
│   │       ├── ProgramController.php
│   │       ├── ProgramCategoryController.php
│   │       ├── RegistrationController.php
│   │       ├── GalleryController.php
│   │       ├── PostController.php
│   │       ├── TestimonialController.php
│   │       ├── FaqController.php
│   │       ├── ServiceController.php
│   │       ├── ServiceCategoryController.php
│   │       ├── UserController.php
│   │       └── SettingController.php
│   ├── Middleware/
│   │   ├── AdminMiddleware.php
│   │   └── RoleMiddleware.php
│   └── Requests/
│       ├── StoreRegistrationRequest.php
│       ├── StoreProgramRequest.php
│       └── ... (per form)
├── Models/
│   ├── User.php
│   ├── Program.php
│   ├── ProgramCategory.php
│   ├── Registration.php
│   ├── Gallery.php
│   ├── Post.php
│   ├── Testimonial.php
│   ├── Faq.php
│   ├── Service.php
│   ├── ServiceCategory.php
│   └── Setting.php
├── Helpers/
│   └── SettingHelper.php    ← helper: setting('key')
resources/
├── views/
│   ├── layouts/
│   │   ├── app.blade.php        ← layout publik
│   │   ├── admin.blade.php      ← layout admin
│   │   └── partials/
│   │       ├── navbar.blade.php
│   │       ├── footer.blade.php
│   │       └── whatsapp-button.blade.php
│   ├── pages/                   ← halaman publik
│   │   ├── home.blade.php
│   │   ├── programs/
│   │   │   ├── index.blade.php
│   │   │   └── show.blade.php
│   │   ├── services/index.blade.php
│   │   ├── gallery/index.blade.php
│   │   ├── about/index.blade.php
│   │   ├── register/index.blade.php
│   │   ├── blog/
│   │   │   ├── index.blade.php
│   │   │   └── show.blade.php
│   │   ├── faq/index.blade.php
│   │   ├── testimonials/index.blade.php
│   │   ├── contact/index.blade.php
│   │   └── success.blade.php
│   └── admin/
│       ├── dashboard.blade.php
│       ├── programs/
│       ├── registrations/
│       ├── gallery/
│       ├── posts/
│       ├── testimonials/
│       ├── faqs/
│       ├── services/
│       ├── users/
│       └── settings/
routes/
├── web.php          ← public routes
└── admin.php        ← admin routes (prefix: /admin, middleware: auth + admin)
database/
├── migrations/      ← satu file per tabel
└── seeders/
    ├── DatabaseSeeder.php
    ├── UserSeeder.php
    ├── ProgramSeeder.php
    ├── ServiceSeeder.php
    └── SettingSeeder.php
```

---

## 10. Fitur SEO

- Meta title & description dinamis per halaman
- Open Graph tags (untuk share di sosmed)
- Sitemap XML otomatis (via `spatie/laravel-sitemap`)
- Slug SEO-friendly untuk program dan blog
- Alt text pada semua gambar
- Canonical URL
- Schema markup untuk lembaga pendidikan (JSON-LD)

---

## 11. Keamanan

- CSRF protection (bawaan Laravel)
- Rate limiting pada form pendaftaran & kontak
- Honeypot anti-spam pada semua form publik
- File upload validation (tipe, ukuran, ekstensi)
- XSS protection melalui Blade `{{ }}`
- SQL injection protection (Eloquent / Query Builder)
- Admin route dilindungi middleware auth + role
- Password hashing (bcrypt)

---

## 12. Milestone & Estimasi Pengerjaan

| Fase | Pekerjaan | Estimasi |
|---|---|---|
| **Fase 1** | Setup project Laravel 12, konfigurasi DB, migrations, seeders, helper | 1–2 hari |
| **Fase 2** | Layout global (navbar, footer, WA button), halaman Beranda | 2–3 hari |
| **Fase 3** | Halaman Program (list + detail), Layanan Salon | 2 hari |
| **Fase 4** | Halaman Galeri, Tentang Kami, FAQ, Testimoni | 2 hari |
| **Fase 5** | Sistem Pendaftaran (form + validasi + backend) | 2 hari |
| **Fase 6** | Halaman Blog (list + detail), Kontak, halaman statis | 1–2 hari |
| **Fase 7** | Admin Auth (login, middleware, role), Dashboard | 1–2 hari |
| **Fase 8** | Admin CRUD: Program, Pendaftaran, Galeri, Blog | 3 hari |
| **Fase 9** | Admin CRUD: Testimoni, FAQ, Layanan, User, Settings | 2 hari |
| **Fase 10** | SEO, optimasi performa, testing, bug fix | 2 hari |
| **Fase 11** | Deployment, konfigurasi server, serah terima | 1 hari |
| **Total** | | **~19–22 hari kerja** |

---

## 13. Catatan Teknis

- Gambar disimpan di `storage/app/public` via `storage:link`
- Helper global `setting('key')` untuk mengambil nilai dari tabel `settings`
- Nomor referensi pendaftaran: format `YWT-YYYYMMDD-XXXXX` (auto-generate)
- Konfigurasi role disimpan di `config/roles.php`
- Semua admin route di `routes/admin.php` di-include di `web.php`
- Gunakan `spatie/laravel-permission` atau implementasi custom role
- Pagination menggunakan Tailwind pagination preset Laravel
- Semua timestamp menggunakan timezone `Asia/Jakarta`

---

*Dokumen ini bersifat living document dan dapat diperbarui sesuai perkembangan diskusi dengan klien.*
*Versi 2.0 — Lebih lengkap dengan detail setiap section halaman publik dan modul admin.*
