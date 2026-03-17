# 🧪 Skenario Testing — Phase 6 (Blog, Kontak, Halaman Statis)

> **Cakupan:** Blog Listing & Detail, Kontak, Kebijakan Privasi, 404 Custom
> **Tanggal:** 11 Maret 2026

---

## T6.1 — Halaman Blog Listing `/blog`

### TC-6.1.1: Page Load & Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/blog` | Halaman tampil tanpa error, HTTP 200 | ☐ |
| 2 | Cek title browser | Title = "Blog — LKP/LPK Yuwita" | ☐ |
| 3 | Inspect `<head>` | Meta description terisi sesuai | ☐ |
| 4 | Lihat breadcrumb | Tampil "Beranda > Blog" | ☐ |
| 5 | Klik "Beranda" di breadcrumb | Redirect ke halaman home `/` | ☐ |

### TC-6.1.2: Hero & Featured Post
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat hero section | Judul "Blog & Artikel" + deskripsi tampil | ☐ |
| 2 | Lihat featured post | Card full-width dengan thumbnail/placeholder, badge, judul, excerpt | ☐ |
| 3 | Cek info featured | Tanggal, penulis, waktu baca tampil | ☐ |
| 4 | Hover featured post | Shadow meningkat, transisi smooth | ☐ |
| 5 | Klik featured post | Redirect ke halaman detail blog | ☐ |

### TC-6.1.3: Filter Kategori (Alpine.js)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat tab filter | Tab "Semua" aktif (highlight rose-gold) | ☐ |
| 2 | Klik tab "Tips Kecantikan" | Hanya artikel kategori Tips Kecantikan yang tampil | ☐ |
| 3 | Klik tab "Berita" | Hanya artikel kategori Berita yang tampil | ☐ |
| 4 | Klik tab "Tutorial" | Hanya artikel kategori Tutorial yang tampil | ☐ |
| 5 | Klik tab "Info Program" | Hanya artikel kategori Info Program yang tampil | ☐ |
| 6 | Klik tab "Semua" | Semua artikel tampil kembali | ☐ |
| 7 | Amati transisi filter | Animasi fade/scale saat card muncul/hilang | ☐ |

### TC-6.1.4: Search
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Ketik "makeup" di search bar | Hanya artikel yang mengandung "makeup" yang tampil | ☐ |
| 2 | Hapus teks di search bar | Semua artikel tampil kembali | ☐ |
| 3 | Pilih tab "Berita" lalu ketik kata kunci | Filter bekerja bersamaan (kategori + search) | ☐ |
| 4 | Ketik teks yang tidak match | Semua card tersembunyi | ☐ |

### TC-6.1.5: Grid Artikel
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat grid artikel | Grid 3 kolom (desktop), card tampil rapi | ☐ |
| 2 | Cek info card | Thumbnail/placeholder, badge kategori, tanggal, waktu baca | ☐ |
| 3 | Cek judul card | Judul dan excerpt tampil, line-clamp 2 baris | ☐ |
| 4 | Hover pada card | Card naik (-translate-y-1), shadow muncul | ☐ |
| 5 | Klik card artikel | Redirect ke halaman detail `/blog/{slug}` | ☐ |

### TC-6.1.6: Pagination
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Jika > 10 artikel | Link pagination tampil di bawah grid | ☐ |
| 2 | Klik halaman 2 | Artikel halaman 2 tampil | ☐ |
| 3 | Jika ≤ 10 artikel | Pagination tidak tampil | ☐ |

### TC-6.1.7: Empty State
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Jika tidak ada artikel | Pesan "Belum ada artikel" + icon tampil | ☐ |

### TC-6.1.8: Responsive
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka di mobile (375px) | Grid 1 kolom, tab bisa scroll horizontal | ☐ |
| 2 | Buka di tablet (768px) | Grid 2 kolom | ☐ |
| 3 | Buka di desktop (1280px) | Grid 3 kolom, featured post 2-col layout | ☐ |

---

## T6.2 — Halaman Detail Blog `/blog/{slug}`

### TC-6.2.1: Page Load & Header
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/blog/10-tips-makeup-natural-untuk-pemula` | Halaman tampil tanpa error, HTTP 200 | ☐ |
| 2 | Cek breadcrumb | "Beranda > Blog > [Judul Artikel]" | ☐ |
| 3 | Klik "Blog" di breadcrumb | Redirect ke `/blog` | ☐ |
| 4 | Lihat header | Badge kategori, judul H1, tanggal, penulis, waktu baca | ☐ |
| 5 | Cek `<title>` | Title = meta_title atau judul artikel | ☐ |
| 6 | Cek meta description | Terisi dari meta_description atau excerpt | ☐ |

### TC-6.2.2: Konten Artikel
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke section konten | Rich text HTML ter-render dengan benar | ☐ |
| 2 | Cek heading | H2, H3 tampil dengan styling prose | ☐ |
| 3 | Cek list | Unordered list dan ordered list tampil rapi | ☐ |
| 4 | Cek paragraph | Spacing dan line-height sesuai | ☐ |
| 5 | Jika ada blockquote | Tampil dengan border kiri rose-gold + background | ☐ |

### TC-6.2.3: Share Buttons
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke "Bagikan Artikel" | 3 tombol share tampil: WhatsApp, Facebook, Salin Link | ☐ |
| 2 | Klik share WhatsApp | Buka WA share link dengan judul + URL | ☐ |
| 3 | Klik share Facebook | Buka Facebook sharer dengan URL | ☐ |
| 4 | Klik "Salin Link" | URL tersalin, teks berubah "Tersalin!" lalu kembali | ☐ |

### TC-6.2.4: Artikel Terkait
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke "Artikel Terkait" | Section tampil jika ada artikel terkait | ☐ |
| 2 | Cek card terkait | Max 3 card dengan kategori yang sama | ☐ |
| 3 | Klik card terkait | Redirect ke halaman detail artikel tersebut | ☐ |
| 4 | Jika tidak ada artikel terkait | Section tidak tampil | ☐ |

### TC-6.2.5: Edge Case
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/blog/slug-tidak-ada` | Halaman 404 tampil | ☐ |
| 2 | Buka artikel yang unpublished | Halaman 404 tampil | ☐ |

---

## T6.3 — Halaman Kontak `/kontak`

### TC-6.3.1: Page Load & Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/kontak` | Halaman tampil tanpa error, HTTP 200 | ☐ |
| 2 | Cek title browser | Title = "Kontak — LKP/LPK Yuwita" | ☐ |
| 3 | Lihat breadcrumb | "Beranda > Kontak" | ☐ |
| 4 | Lihat hero | Judul "Hubungi Kami" + deskripsi tampil | ☐ |
| 5 | Lihat layout | 2 kolom: Form (kiri) + Info (kanan) | ☐ |

### TC-6.3.2: Form Kontak
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Cek field form | 5 field: Nama, Email, WhatsApp, Subjek, Pesan | ☐ |
| 2 | Cek Nama | Label "Nama Lengkap" dengan tanda * | ☐ |
| 3 | Cek Email | Label "Email" dengan tanda * | ☐ |
| 4 | Cek WhatsApp | Label "WhatsApp" dengan keterangan (opsional) | ☐ |
| 5 | Cek Subjek | Dropdown dengan pilihan: Informasi Program, Pendaftaran, dll | ☐ |
| 6 | Cek Pesan | Textarea 5 baris | ☐ |

### TC-6.3.3: Submit Kontak (Happy Path)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Isi Nama: "Tes Kontak" | Field terisi | ☐ |
| 2 | Isi Email: "test@email.com" | Field terisi | ☐ |
| 3 | Pilih Subjek: "Informasi Program" | Terpilih | ☐ |
| 4 | Isi Pesan: "Ingin tanya tentang program pelatihan" | Field terisi | ☐ |
| 5 | Klik "Kirim Pesan" | Button loading spinner | ☐ |
| 6 | Tunggu proses | Toast sukses "Pesan Anda telah terkirim..." | ☐ |
| 7 | Cek database (tinker) | Data tersimpan di tabel `contacts`, is_read=false | ☐ |

### TC-6.3.4: Validasi Form Kontak
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Submit form kosong | Validasi browser mencegah submit | ☐ |
| 2 | Isi email invalid | Error "Format email tidak valid." | ☐ |
| 3 | Submit tanpa subjek | Error "Subjek wajib diisi." | ☐ |
| 4 | Isi pesan > 2000 karakter | Error validasi panjang | ☐ |
| 5 | Isi field honeypot | Form ditolak | ☐ |

### TC-6.3.5: Info Kontak (Kanan)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat card Informasi Kontak | Alamat, telepon, email, jam operasional tampil | ☐ |
| 2 | Cek nomor telepon | Tampil "+62 822-1679-6892" | ☐ |
| 3 | Klik "Chat WhatsApp Langsung" | Buka WA ke nomor 082216796892 | ☐ |
| 4 | Lihat Media Sosial | 4 icon: Facebook, Instagram, YouTube, TikTok | ☐ |
| 5 | Klik icon sosmed | Masing-masing link terbuka di tab baru | ☐ |

### TC-6.3.6: Google Maps
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat section peta | Embed maps atau placeholder tampil | ☐ |
| 2 | Klik "Buka di Google Maps" | Google Maps terbuka di tab baru dengan alamat | ☐ |

### TC-6.3.7: Responsive
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka di mobile (375px) | Layout 1 kolom, form di atas, info di bawah | ☐ |
| 2 | Buka di desktop (1280px) | Layout 2 kolom: 3/5 form + 2/5 info | ☐ |

---

## T6.4 — Halaman Kebijakan Privasi `/kebijakan-privasi`

### TC-6.4.1: Page Load
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/kebijakan-privasi` | Halaman tampil tanpa error, HTTP 200 | ☐ |
| 2 | Cek title browser | Title = "Kebijakan Privasi — LKP/LPK Yuwita" | ☐ |
| 3 | Lihat breadcrumb | "Beranda > Kebijakan Privasi" | ☐ |

### TC-6.4.2: Konten
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat konten | 9 section kebijakan privasi tampil | ☐ |
| 2 | Cek heading | H2 untuk setiap section, styling prose | ☐ |
| 3 | Cek info kontak | Email, telepon, alamat dari settings tampil | ☐ |
| 4 | Cek tanggal update | "Terakhir diperbarui: [tanggal hari ini]" | ☐ |

---

## T6.5 — Halaman 404 Custom

### TC-6.5.1: 404 Page
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/halaman-tidak-ada` | Halaman 404 custom tampil (bukan default Laravel) | ☐ |
| 2 | Lihat visual | Angka "404" besar + icon sad face | ☐ |
| 3 | Lihat pesan | "Halaman Tidak Ditemukan" + deskripsi | ☐ |
| 4 | Klik "Kembali ke Beranda" | Redirect ke `/` | ☐ |
| 5 | Klik "Hubungi Kami" | Redirect ke `/kontak` | ☐ |
| 6 | Cek branding | Desain konsisten dengan tema website (rose-gold palette) | ☐ |

---

## T6.6 — Navigasi & Link

### TC-6.6.1: Footer Links
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke footer | Link "Blog" tampil di navigasi footer | ☐ |
| 2 | Klik "Blog" di footer | Redirect ke `/blog` | ☐ |
| 3 | Klik "Hubungi Kami" di footer | Redirect ke `/kontak` | ☐ |
| 4 | Klik "Kebijakan Privasi" di footer | Redirect ke `/kebijakan-privasi` | ☐ |

### TC-6.6.2: Navbar
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat navbar | Link "Kontak" ada di menu utama | ☐ |
| 2 | Klik "Kontak" di navbar | Redirect ke `/kontak`, menu item active/highlight | ☐ |

---

> **Total Test Cases Phase 6:** 85
> **Metode:** Manual via browser + database check (tinker)
> **Prioritas tinggi:** Page load, form submit, validasi, navigasi link, share button
> **Prioritas sedang:** Filter, search, pagination, related posts, responsive
> **Prioritas rendah:** Animasi, hover, SEO meta, empty state, edge case
