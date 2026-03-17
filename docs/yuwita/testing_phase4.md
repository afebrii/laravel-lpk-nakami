# 🧪 Skenario Testing — Phase 4 (Galeri, Tentang Kami, FAQ, Testimoni)

> **Cakupan:** Halaman Galeri, Tentang Kami, FAQ, Testimoni
> **Tanggal:** 11 Maret 2026

---

## T4.1 — Halaman Galeri `/galeri`

### TC-4.1.1: Page Load & Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/galeri` | Halaman tampil tanpa error, HTTP 200 | ☐ |
| 2 | Cek title browser | Title = "Galeri — LKP/LPK Yuwita" | ☐ |
| 3 | Lihat breadcrumb | "Beranda > Galeri" | ☐ |
| 4 | Klik "Beranda" di breadcrumb | Redirect ke halaman home `/` | ☐ |

### TC-4.1.2: Filter Kategori
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat tab filter | Tab "Semua" aktif, semua foto tampil | ☐ |
| 2 | Klik tab kategori tertentu | Hanya foto dari kategori tersebut yang tampil | ☐ |
| 3 | Klik kembali tab "Semua" | Semua foto tampil kembali | ☐ |
| 4 | Amati transisi filter | Foto muncul dengan animasi fade + scale | ☐ |

### TC-4.1.3: Grid & Hover
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat grid foto (desktop) | 4 kolom, aspect-square, rounded | ☐ |
| 2 | Lihat grid foto (tablet 768px) | 3 kolom | ☐ |
| 3 | Lihat grid foto (mobile 375px) | 2 kolom | ☐ |
| 4 | Cek atribut `<img>` | Atribut `loading="lazy"` ada | ☐ |
| 5 | Hover pada foto | Zoom in + overlay gelap + icon zoom + title | ☐ |

### TC-4.1.4: Lightbox
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik foto | Modal lightbox terbuka dengan gambar besar | ☐ |
| 2 | Lihat di bawah gambar | Title foto tampil | ☐ |
| 3 | Klik tombol X di pojok kanan atas | Lightbox tertutup | ☐ |
| 4 | Buka lightbox lagi, klik area luar gambar | Lightbox tertutup | ☐ |
| 5 | Buka lightbox lagi, tekan Escape | Lightbox tertutup | ☐ |

### TC-4.1.5: Pagination & Empty State
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Jika data > 12 item | Link pagination tampil dan berfungsi | ☐ |
| 2 | Jika tidak ada data galeri | Placeholder grid + teks "Galeri foto akan segera ditambahkan" | ☐ |

---

## T4.2 — Halaman Tentang Kami `/tentang`

### TC-4.2.1: Page Load & Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/tentang` | Halaman tampil tanpa error, HTTP 200 | ☐ |
| 2 | Cek title browser | Title = "Tentang Kami — LKP/LPK Yuwita" | ☐ |
| 3 | Lihat breadcrumb | "Beranda > Tentang Kami" | ☐ |

### TC-4.2.2: Sejarah & Profil
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke "Sejarah & Profil Lembaga" | Section tampil dengan layout 2 kolom (image + text) | ☐ |
| 2 | Lihat foto area | Placeholder gambar + badge "18+ Tahun Berdiri" | ☐ |
| 3 | Lihat narasi | Deskripsi dari setting tampil + 2 paragraf tambahan | ☐ |
| 4 | Lihat timeline | 5 milestone (2006, 2010, 2015, 2020, 2024) tampil | ☐ |
| 5 | Cek timeline visual | Dot merah + garis border tampil tiap milestone | ☐ |

### TC-4.2.3: Visi & Misi
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke "Visi & Misi Kami" | Section tampil dengan 2 card | ☐ |
| 2 | Card Visi | Background gradient rose-gold, isi visi lembaga | ☐ |
| 3 | Card Misi | Background soft-cream, 5 checklist item dengan icon centang | ☐ |

### TC-4.2.4: Keunggulan Lembaga
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke "Keunggulan Lembaga Kami" | 6 card tampil dalam grid 3 kolom (desktop) | ☐ |
| 2 | Cek isi card | Pengajar, Fasilitas, Sertifikat, Kerja, Alumni, Bimbingan | ☐ |
| 3 | Hover pada card | Card naik, shadow muncul, icon bg berubah rose-gold | ☐ |
| 4 | Responsive mobile | Grid berubah jadi 1 kolom | ☐ |

### TC-4.2.5: Struktur Organisasi
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke "Struktur Organisasi" | Section tampil | ☐ |
| 2 | Lihat pimpinan | "Hj. Yuyun Yunengsih — Pimpinan / Direktur" di atas | ☐ |
| 3 | Lihat divisi | 3 card: Instruktur MUA, Instruktur Rambut, Admin & Keuangan | ☐ |

### TC-4.2.6: Legalitas & CTA
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke "Legalitas & Izin Operasional" | 3 card: Izin Operasional, NPSN, Akta Notaris | ☐ |
| 2 | Hover pada card legalitas | Shadow muncul | ☐ |
| 3 | Scroll ke CTA banner | "Bergabung Bersama Kami" + tombol "Daftar Sekarang" tampil | ☐ |
| 4 | Klik "Daftar Sekarang" | Redirect ke `/daftar` | ☐ |
| 5 | Klik "Kebijakan Privasi" | Redirect ke `/kebijakan-privasi` | ☐ |

---

## T4.3 — Halaman FAQ `/faq`

### TC-4.3.1: Page Load & Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/faq` | Halaman tampil tanpa error, 11 FAQ dari seeder | ☐ |
| 2 | Cek title browser | Title = "FAQ — LKP/LPK Yuwita" | ☐ |
| 3 | Lihat breadcrumb | "Beranda > FAQ" | ☐ |

### TC-4.3.2: Hero Search
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat hero section | Input search dengan placeholder "Cari pertanyaan..." | ☐ |
| 2 | Ketik "sertifikat" di search | Hanya FAQ yang mengandung "sertifikat" yang tampil | ☐ |
| 3 | Ketik "beasiswa" di search | Hanya FAQ yang mengandung "beasiswa" yang tampil | ☐ |
| 4 | Hapus teks search | Semua FAQ tampil kembali | ☐ |

### TC-4.3.3: Filter Tab Kategori
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat tab filter | Tab "Semua" aktif, semua FAQ tampil | ☐ |
| 2 | Klik tab "Pendaftaran" | Hanya FAQ kategori Pendaftaran yang tampil | ☐ |
| 3 | Klik tab "Sertifikasi" | Hanya FAQ kategori Sertifikasi yang tampil | ☐ |
| 4 | Klik tab "Biaya" | Hanya FAQ kategori Biaya yang tampil | ☐ |
| 5 | Klik tab "Program Pelatihan" | Hanya FAQ kategori Program Pelatihan yang tampil | ☐ |
| 6 | Klik tab "Layanan Salon" | Hanya FAQ kategori Layanan Salon yang tampil | ☐ |
| 7 | Klik tab "Semua" | Semua FAQ tampil kembali | ☐ |

### TC-4.3.4: Kombinasi Filter
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Pilih tab "Pendaftaran" lalu ketik di search | Kedua filter bekerja bersamaan | ☐ |
| 2 | Ganti tab ke "Semua" | Filter tab reset, search masih aktif | ☐ |
| 3 | Hapus search | Semua FAQ kembali tampil | ☐ |

### TC-4.3.5: Accordion FAQ
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat FAQ item | Badge kategori (warna rose-gold) + pertanyaan + chevron | ☐ |
| 2 | Klik pertanyaan FAQ | Jawaban muncul dengan animasi slide down | ☐ |
| 3 | Klik pertanyaan yang sudah terbuka | Jawaban tertutup dengan animasi | ☐ |
| 4 | Klik pertanyaan lain saat satu terbuka | Yang lama tertutup, yang baru terbuka | ☐ |
| 5 | Perhatikan icon chevron | Rotate 180° saat accordion terbuka, kembali saat tutup | ☐ |

### TC-4.3.6: CTA & Link
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke CTA | "Pertanyaanmu Belum Terjawab?" tampil | ☐ |
| 2 | Klik "Tanya via WhatsApp" | Buka WA dengan pesan default | ☐ |
| 3 | Klik "Halaman Kontak" | Redirect ke `/kontak` | ☐ |

### TC-4.3.7: Responsive
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka di mobile viewport | Tab bisa wrap, accordion full width | ☐ |
| 2 | Buka di tablet viewport | Layout tetap rapi, search bar responsif | ☐ |

---

## T4.4 — Halaman Testimoni `/testimoni`

### TC-4.4.1: Page Load & Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/testimoni` | Halaman tampil tanpa error, HTTP 200 | ☐ |
| 2 | Cek title browser | Title = "Testimoni — LKP/LPK Yuwita" | ☐ |
| 3 | Lihat breadcrumb | "Beranda > Testimoni" | ☐ |

### TC-4.4.2: Hero & Average Rating
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat hero section | Judul "Testimoni" + deskripsi tampil | ☐ |
| 2 | Jika ada data rating | Rating rata-rata tampil: bintang + angka (x.x / 5.0) | ☐ |
| 3 | Jika tidak ada data rating | Tidak ada badge rating tampil | ☐ |

### TC-4.4.3: Filter Type Tab
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat tab filter | Tab "Semua" aktif | ☐ |
| 2 | Klik tab "Alumni" | Hanya testimoni type=alumni yang tampil | ☐ |
| 3 | Klik tab "Pelanggan" | Hanya testimoni type=pelanggan yang tampil | ☐ |
| 4 | Klik tab "Semua" | Semua testimoni tampil kembali | ☐ |

### TC-4.4.4: Filter Dropdown Program
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat dropdown | Default "Semua Program" terpilih | ☐ |
| 2 | Pilih program dari dropdown | Hanya testimoni dari program tersebut yang tampil | ☐ |
| 3 | Pilih kembali "Semua Program" | Semua testimoni tampil kembali | ☐ |
| 4 | Kombinasi tab Alumni + pilih program | Kedua filter bekerja bersamaan | ☐ |

### TC-4.4.5: Testimonial Card
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat card testimoni | Rating bintang (kuning), kutipan italic, profil | ☐ |
| 2 | Cek profil card | Foto/avatar, nama, "Alumni" atau "Pelanggan", nama program | ☐ |
| 3 | Jika tidak ada foto | Avatar placeholder: inisial nama, bg rose-gold/20 | ☐ |
| 4 | Hover pada card | Shadow muncul | ☐ |
| 5 | Amati transisi filter | Card muncul dengan animasi fade + scale | ☐ |

### TC-4.4.6: Grid & Pagination
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Grid desktop (1280px) | 3 kolom | ☐ |
| 2 | Grid tablet (768px) | 2 kolom | ☐ |
| 3 | Grid mobile (375px) | 1 kolom | ☐ |
| 4 | Jika data > 12 item | Link pagination tampil dan berfungsi | ☐ |

### TC-4.4.7: Empty State & CTA
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Jika tidak ada data | 3 placeholder card: "Testimoni akan tampil di sini" | ☐ |
| 2 | Scroll ke CTA | "Ingin Jadi Bagian dari Cerita Sukses?" tampil | ☐ |
| 3 | Klik "Daftar Sekarang" | Redirect ke `/daftar` | ☐ |

---

## T4.X — Cross-Page Testing Phase 4

### TC-4.X.1: Navigasi & Global
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/galeri` — cek navbar | Link "Galeri" aktif/highlight | ☐ |
| 2 | Buka `/tentang` — cek navbar | Link "Tentang Kami" aktif/highlight | ☐ |
| 3 | Buka `/faq` — cek navbar | Link "FAQ" aktif/highlight | ☐ |
| 4 | Buka `/testimoni` — cek navbar | Link "Testimoni" aktif (jika ada di navbar) | ☐ |
| 5 | Cek footer links di semua halaman | Link navigasi footer berfungsi | ☐ |
| 6 | Cek floating WA di semua halaman | Tombol WhatsApp floating di pojok kanan bawah | ☐ |
| 7 | Buka mobile, klik hamburger | Menu dropdown tampil dengan semua link | ☐ |
| 8 | Direct URL akses | Semua 4 halaman bisa diakses langsung via URL | ☐ |

---

> **Total Test Cases Phase 4:** 76
> **Metode:** Manual via browser
> **Prioritas tinggi:** Page load, filter bekerja, navigasi, CTA link, responsive
> **Prioritas sedang:** Animasi, hover effect, accordion, lightbox
> **Prioritas rendah:** SEO meta, edge cases (empty state)
