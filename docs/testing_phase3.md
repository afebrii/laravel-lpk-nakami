# 🧪 Skenario Testing — Phase 3 (Program Pelatihan & Layanan Salon)

> **Cakupan:** Halaman Program Listing, Program Detail, Layanan Salon
> **Tanggal:** 11 Maret 2026

---

## T3.1 — Halaman Program Listing `/program`

### TC-3.1.1: Page Load & Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/program` | Halaman tampil tanpa error, HTTP 200 | ☐ |
| 2 | Cek title browser | Title = "Program Pelatihan — LKP/LPK Yuwita" | ☐ |
| 3 | Inspect `<head>` | Meta description terisi sesuai | ☐ |
| 4 | Lihat breadcrumb | Tampil "Beranda > Program Pelatihan" | ☐ |
| 5 | Klik "Beranda" di breadcrumb | Redirect ke halaman home `/` | ☐ |

### TC-3.1.2: Hero & Category Explanation
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat hero section | Judul "Program Pelatihan" + deskripsi tampil | ☐ |
| 2 | Lihat di bawah hero | Tampil 2 card penjelasan: "Kelas Reguler" dan "Kelas Khusus" | ☐ |
| 3 | Card Kelas Reguler | Deskripsi dan icon/gambar tampil | ☐ |
| 4 | Card Kelas Khusus | Deskripsi dan icon/gambar tampil | ☐ |

### TC-3.1.3: Filter Tab (Alpine.js)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat tab filter | Tab "Semua" aktif (highlight rose-gold), semua program tampil | ☐ |
| 2 | Klik tab "Kelas Reguler" | Hanya program dengan badge "Kelas Reguler" yang tampil | ☐ |
| 3 | Klik tab "Kelas Khusus" | Hanya program dengan badge "Kelas Khusus" yang tampil | ☐ |
| 4 | Klik tab "Semua" | Semua program tampil kembali | ☐ |
| 5 | Amati transisi filter | Animasi fade/scale saat card muncul/hilang | ☐ |

### TC-3.1.4: Search
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Ketik "MUA" di search bar | Hanya program yang mengandung "MUA" yang tampil | ☐ |
| 2 | Hapus teks di search bar | Semua program tampil kembali | ☐ |
| 3 | Pilih tab "Kelas Reguler" lalu ketik nama program | Filter bekerja bersamaan (kategori + search) | ☐ |

### TC-3.1.5: Program Card
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat program card | Tampil: thumbnail/placeholder, badge kategori, nama, deskripsi | ☐ |
| 2 | Cek info card | Durasi, kuota, harga terlihat | ☐ |
| 3 | Jika program gratis | Harga tampil "GRATIS" warna hijau | ☐ |
| 4 | Hover pada card | Card naik (-translate-y-1), shadow muncul | ☐ |
| 5 | Klik "Detail >" pada card | Redirect ke halaman detail `/program/{slug}` | ☐ |

### TC-3.1.6: CTA Banner
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke bawah | Banner "Bingung Memilih Program?" tampil | ☐ |
| 2 | Klik "Konsultasi Gratis via WhatsApp" | Buka WhatsApp dengan pesan terisi otomatis | ☐ |

### TC-3.1.7: Responsive
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka di viewport 375px (mobile) | Layout 1 kolom, tab bisa scroll horizontal | ☐ |
| 2 | Buka di viewport 768px (tablet) | Grid jadi 2 kolom | ☐ |
| 3 | Buka di viewport 1280px (desktop) | Grid 3 kolom, layout penuh | ☐ |

---

## T3.2 — Halaman Detail Program `/program/{slug}`

### TC-3.2.1: Page Load & Header
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/program/mua-reguler` | Halaman tampil tanpa error, HTTP 200 | ☐ |
| 2 | Lihat breadcrumb | Tampil "Beranda > Program Pelatihan > [Nama Program]" | ☐ |
| 3 | Klik "Program Pelatihan" di breadcrumb | Redirect ke `/program` | ☐ |
| 4 | Lihat hero section | Badge kategori, nama program, deskripsi singkat tampil | ☐ |
| 5 | Cek info di header | Durasi, kuota, harga terlihat | ☐ |
| 6 | Jika status coming_soon | Badge "Segera Hadir" warna amber tampil | ☐ |

### TC-3.2.2: Konten Utama
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke section deskripsi | HTML description ter-render dengan benar | ☐ |
| 2 | Jika program punya thumbnail | Gambar tampil dengan aspect 16:9 | ☐ |
| 3 | Jika program punya fasilitas | Section "Fasilitas" tampil dengan konten HTML | ☐ |
| 4 | Jika program punya requirements | Section "Persyaratan Pendaftaran" tampil | ☐ |

### TC-3.2.3: Kurikulum Accordion
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik salah satu modul kurikulum | Accordion terbuka dengan animasi smooth | ☐ |
| 2 | Klik modul yang sudah terbuka | Accordion tertutup | ☐ |
| 3 | Klik modul lain saat satu terbuka | Modul sebelumnya tertutup, modul baru terbuka | ☐ |
| 4 | Lihat icon chevron | Rotate 180° saat accordion terbuka | ☐ |

### TC-3.2.4: Sidebar
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat sidebar kanan (desktop) | Card "Informasi Program" tampil | ☐ |
| 2 | Cek info sidebar | Durasi, jadwal, kuota, kategori, biaya terlihat | ☐ |
| 3 | Scroll halaman ke bawah | Sidebar tetap mengikuti (sticky top-24) | ☐ |
| 4 | Klik "Daftar Sekarang" | Redirect ke `/daftar` | ☐ |
| 5 | Klik "Tanya via WhatsApp" | Buka WA dengan pesan berisi nama program | ☐ |

### TC-3.2.5: Testimoni & Related
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Jika ada testimonial | Card testimoni tampil: rating bintang, kutipan, nama, foto | ☐ |
| 2 | Scroll ke "Program Terkait" | Max 3 card program lain tampil | ☐ |
| 3 | Klik card program terkait | Redirect ke halaman detail program tersebut | ☐ |

### TC-3.2.6: Share & Social
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik tombol share WhatsApp | WhatsApp share link terbuka | ☐ |
| 2 | Klik tombol share Facebook | Facebook sharer terbuka dengan URL halaman | ☐ |
| 3 | Klik "Salin" | URL ter-copy, teks berubah "Tersalin!" lalu kembali | ☐ |

### TC-3.2.7: Mobile CTA & Edge Case
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka di mobile viewport | Fixed bar di bawah: harga + tombol "Daftar Sekarang" | ☐ |
| 2 | Buka di desktop viewport | Sticky CTA tidak tampil (hidden lg:) | ☐ |
| 3 | Buka `/program/tidak-ada` | Halaman 404 atau error handling yang sesuai | ☐ |
| 4 | Inspect `<head>` | Title = meta_title program, description = meta_description | ☐ |

---

## T3.3 — Halaman Layanan Salon `/layanan`

### TC-3.3.1: Page Load & Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/layanan` | Halaman tampil tanpa error, HTTP 200 | ☐ |
| 2 | Cek title browser | Title = "Layanan Salon — LKP/LPK Yuwita" | ☐ |
| 3 | Lihat breadcrumb | "Beranda > Layanan Salon" | ☐ |

### TC-3.3.2: Filter Tab
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat tab filter | Tab "Semua" aktif, semua kategori tampil | ☐ |
| 2 | Klik tab "Rambut" | Hanya kategori Rambut yang tampil | ☐ |
| 3 | Klik tab "Wajah & Tubuh" | Hanya kategori Wajah & Tubuh yang tampil | ☐ |

### TC-3.3.3: Service Card
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat tiap section kategori | Icon, nama kategori, dan jumlah layanan tampil | ☐ |
| 2 | Lihat card layanan | Tampil: nama layanan, deskripsi, harga (format Rp) | ☐ |
| 3 | Hover pada card layanan | Border berubah, shadow muncul | ☐ |

### TC-3.3.4: Galeri & Reservasi
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke "Hasil Layanan Kami" | Grid 6 foto (atau placeholder) tampil | ☐ |
| 2 | Hover pada foto galeri | Zoom in + overlay gelap + icon zoom + title | ☐ |
| 3 | Scroll ke "Informasi Reservasi" | 3 card: Cara Reservasi, Jam Operasional, Lokasi | ☐ |
| 4 | Klik "Reservasi via WhatsApp" | Buka WA dengan pesan reservasi | ☐ |
| 5 | Klik "Buka di Google Maps" | Link Google Maps terbuka di tab baru | ☐ |

### TC-3.3.5: CTA & Responsive
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke bawah | Banner "Ingin Belajar Kecantikan Profesional?" tampil | ☐ |
| 2 | Klik "Lihat Program Pelatihan" | Redirect ke `/program` | ☐ |
| 3 | Buka di mobile viewport | Card layanan 1 kolom, galeri 2 kolom | ☐ |

---

> **Total Test Cases Phase 3:** 62
> **Metode:** Manual via browser
> **Prioritas tinggi:** Page load, filter, navigasi, CTA link, responsive
> **Prioritas sedang:** Animasi, hover effect, accordion
> **Prioritas rendah:** SEO meta, edge cases (404)
