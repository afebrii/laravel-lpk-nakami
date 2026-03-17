# 🧪 Skenario Testing — Phase 2 (Layout Global & Beranda)

> **Cakupan:** Layout publik (navbar, footer, WA button, toast, breadcrumb) dan halaman Beranda dengan 11 section
> **Tanggal:** 11 Maret 2026

---

## T1.1 — Layout: Navbar

### TC-1.1.1: Tampilan Desktop (≥1024px)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka halaman utama di desktop | Navbar tampil fixed di atas | ☐ |
| 2 | Cek logo / nama lembaga | `LKP/LPK Yuwita` tampil di kiri | ☐ |
| 3 | Cek menu navigasi | Beranda, Program Pelatihan, Layanan Salon, Galeri, Tentang Kami, FAQ, Kontak | ☐ |
| 4 | Cek CTA button | Tombol "Daftar Sekarang" di kanan (rose gold, rounded) | ☐ |
| 5 | Cek hamburger menu | Tidak tampil di desktop | ☐ |

### TC-1.1.2: Sticky Scroll Effect
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Posisi di atas halaman | Navbar tanpa shadow | ☐ |
| 2 | Scroll ke bawah > 20px | Navbar mendapat shadow dan efek `backdrop-blur` | ☐ |
| 3 | Scroll kembali ke atas | Shadow hilang kembali | ☐ |

### TC-1.1.3: Dropdown Menu
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Hover "Program Pelatihan" | Dropdown muncul dengan animasi fade | ☐ |
| 2 | Cek isi dropdown Program | Ada section "Kelas Reguler" (4 item) dan "Kelas Khusus" (4 item) | ☐ |
| 3 | Mouse keluar dari dropdown | Dropdown hilang | ☐ |
| 4 | Hover "Tentang Kami" | Dropdown muncul: Profil & Sejarah, Visi & Misi, Legalitas, Testimoni, Blog | ☐ |

### TC-1.1.4: Active State
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Di halaman Beranda | Menu "Beranda" berwarna rose gold | ☐ |
| 2 | Navigasi ke halaman lain (jika ada) | Menu yang sesuai aktif | ☐ |

### TC-1.1.5: Mobile Responsive (< 1024px)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Resize browser ke < 1024px | Menu desktop hilang, hamburger icon muncul | ☐ |
| 2 | Klik hamburger icon | Mobile menu slide down dengan animasi | ☐ |
| 3 | Cek isi mobile menu | Semua link navigasi + CTA "Daftar Sekarang" | ☐ |
| 4 | Klik hamburger lagi (X icon) | Mobile menu closes | ☐ |
| 5 | Klik link di mobile menu | Navigasi berfungsi | ☐ |

---

## T1.2 — Layout: Footer

### TC-1.2.1: Struktur Footer
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll ke bawah halaman | Footer tampil dengan background charcoal | ☐ |
| 2 | Cek kolom 1 | Logo/nama + deskripsi + icon sosial media | ☐ |
| 3 | Cek kolom 2 (Navigasi) | 7 link: Beranda, Program, Layanan, Galeri, Tentang, Blog, FAQ | ☐ |
| 4 | Cek kolom 3 (Program) | Link: Kelas Reguler, Kelas Khusus, Pendaftaran, Hubungi Kami | ☐ |
| 5 | Cek kolom 4 (Kontak) | Alamat, telepon, email, jam operasional (dengan icon) | ☐ |
| 6 | Cek bottom bar | Copyright `© 2026 LKP/LPK Yuwita` + link Kebijakan Privasi | ☐ |

### TC-1.2.2: Footer Links
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik link navigasi di footer | Mengarah ke URL yang benar | ☐ |
| 2 | Hover link | Warna berubah ke `rose-gold-light` | ☐ |
| 3 | Hover icon sosmed | Background berubah ke `rose-gold` | ☐ |

---

## T1.3 — Layout: WhatsApp Floating Button

### TC-1.3.1: Tampilan & Interaksi
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka halaman mana saja | Button WA muncul di kanan bawah (fixed) | ☐ |
| 2 | Hover button (desktop) | Tooltip "Chat via WhatsApp" muncul + button scale up | ☐ |
| 3 | Klik button | Buka `wa.me/6285223506611` di tab baru | ☐ |
| 4 | Cek pre-filled message | Pesan terisi: "Halo, saya ingin bertanya tentang LKP/LPK Yuwita." | ☐ |
| 5 | Jika `contact_wa_admin` kosong di settings | Button TIDAK tampil | ☐ |

---

## T1.4 — Layout: Toast Notification

### TC-1.4.1: Tampilan Toast
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Set session `success` → refresh halaman | Toast hijau muncul dengan icon ✓ dan pesan | ☐ |
| 2 | Set session `error` → refresh halaman | Toast merah muncul dengan icon ✕ dan pesan | ☐ |
| 3 | Set session `info` → refresh halaman | Toast biru muncul dengan icon ℹ dan pesan | ☐ |
| 4 | Tunggu 5 detik | Toast hilang otomatis dengan animasi | ☐ |
| 5 | Klik tombol close (X) sebelum 5 detik | Toast langsung hilang | ☐ |

---

## T1.5 — Beranda: Section 1 (Hero)

### TC-1.5.1: Konten Hero
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka halaman utama | Hero section tampil pertama | ☐ |
| 2 | Cek background | Gradient dari charcoal ke rose-gold-dark | ☐ |
| 3 | Cek trust badges | 3 badge: "Berdiri sejak 2006", "Ribuan Alumni", "Bersertifikat Resmi" | ☐ |
| 4 | Cek headline | Teks dari `setting('home_hero_headline')` | ☐ |
| 5 | Cek subheadline | Teks dari `setting('home_hero_subheadline')` | ☐ |
| 6 | Cek CTA primary | "Lihat Program Pelatihan" → link ke `/program` | ☐ |
| 7 | Cek CTA secondary | "Konsultasi Gratis" → link ke `wa.me/...` | ☐ |

### TC-1.5.2: Responsif
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Mobile (< 640px) | Headline font-size mengecil, CTA buttons stack vertikal | ☐ |
| 2 | Desktop (≥ 1024px) | Headline besar, padding lebih luas | ☐ |

---

## T1.6 — Beranda: Section 2 (Statistik)

### TC-1.6.1: Counter Animasi
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Scroll sampai section statistik terlihat | Counter mulai animasi dari 0 ke target | ☐ |
| 2 | Cek angka Alumni | Animasi ke `5.000+` (dari setting) | ☐ |
| 3 | Cek angka Tahun | Animasi ke `18+` | ☐ |
| 4 | Cek angka Program | Animasi ke `8` | ☐ |
| 5 | Cek angka Mitra | Animasi ke `20+` | ☐ |
| 6 | Scroll up lalu scroll down lagi | Counter TIDAK mengulang (`.once`) | ☐ |

### TC-1.6.2: Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Card statistik | Overlap hero section (-mt-8), bg white, shadow | ☐ |
| 2 | Grid | 2 kolom (mobile), 4 kolom (desktop) | ☐ |

---

## T1.7 — Beranda: Section 3 (Tentang Singkat)

### TC-1.7.1: Konten
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Cek kiri | Placeholder image/gedung dengan gradient background | ☐ |
| 2 | Cek floating card | Badge "Terakreditasi - Resmi & Terpercaya" | ☐ |
| 3 | Cek kanan | Label "Tentang Kami" + heading + deskripsi | ☐ |
| 4 | Cek 3 highlights | Tenaga Pengajar, Fasilitas Modern, Bersertifikat Nasional | ☐ |
| 5 | Klik "Selengkapnya" | Mengarah ke `/tentang` | ☐ |

---

## T1.8 — Beranda: Section 4 (Program Unggulan)

### TC-1.8.1: Tab Filter
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Default state | Tab "Semua" aktif (rose gold), semua program tampil | ☐ |
| 2 | Klik tab "Kelas Reguler" | Hanya 4 program reguler yang tampil | ☐ |
| 3 | Klik tab "Kelas Khusus" | Hanya 4 program khusus yang tampil | ☐ |
| 4 | Klik tab "Semua" lagi | Kembali ke semua 8 program | ☐ |
| 5 | Cek animasi filter | Card muncul/hilang dengan fade + scale transition | ☐ |

### TC-1.8.2: Program Card
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Cek badge | "Kelas Reguler" (hijau) atau "Kelas Khusus" (rose gold) | ☐ |
| 2 | Cek konten card | Nama program, deskripsi singkat (2 baris), harga | ☐ |
| 3 | Cek harga reguler | `Rp 100.000` | ☐ |
| 4 | Hover card | Shadow + translate-y (-1) | ☐ |
| 5 | Klik "Detail" | Mengarah ke `/program/{slug}` | ☐ |
| 6 | Cek tombol bawah | "Lihat Semua Program" → link ke `/program` | ☐ |

---

## T1.9 — Beranda: Section 5 (Layanan Salon)

### TC-1.9.1: Daftar Layanan
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Cek 2 kolom | "Rambut" (kiri) dan "Wajah & Tubuh" (kanan) | ☐ |
| 2 | Cek layanan Rambut | 8 item: Potongan Rambut Rp 20.000, ... | ☐ |
| 3 | Cek layanan Wajah | 8 item: Facial Rp 35.000, ... | ☐ |
| 4 | Cek format harga | Format Indonesia: `Rp XX.XXX` | ☐ |
| 5 | Cek CTA | "Reservasi via WhatsApp" (hijau, link wa.me) | ☐ |

---

## T1.10 — Beranda: Section 6 (Mengapa Memilih Kami)

### TC-1.10.1: Feature Cards
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Cek jumlah card | 6 kartu fitur | ☐ |
| 2 | Cek isi | Pengajar, Fasilitas, Sertifikat, Kerja, Kelas, Bimbingan | ☐ |
| 3 | Hover card | Background berubah ke rose-gold, teks jadi putih | ☐ |
| 4 | Grid | 1 kolom (mobile), 2 kolom (tablet), 3 kolom (desktop) | ☐ |

---

## T1.11 — Beranda: Section 7 (Galeri Preview)

### TC-1.11.1: Grid & Placeholder
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Jika tidak ada data galeri | 6 placeholder card dengan icon gambar | ☐ |
| 2 | Jika ada data galeri | Grid foto 2 kolom (mobile), 3 kolom (desktop) | ☐ |
| 3 | Hover foto (jika ada data) | Overlay gelap + icon zoom + judul | ☐ |
| 4 | Cek tombol bawah | "Lihat Semua Galeri" → link ke `/galeri` | ☐ |

---

## T1.12 — Beranda: Section 8 (Testimoni)

### TC-1.12.1: Display
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Jika tidak ada data testimoni | 3 placeholder card "Testimoni akan tampil di sini" | ☐ |
| 2 | Jika ada data | Card: foto/inisial, nama, peran, program, rating bintang, kutipan | ☐ |
| 3 | Cek bintang rating | Bintang kuning (terisi) dan abu-abu (kosong) | ☐ |
| 4 | Cek link | "Lihat Semua Testimoni" → `/testimoni` | ☐ |

---

## T1.13 — Beranda: Section 9 (Blog Terbaru)

### TC-1.13.1: Artikel Cards
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Jika tidak ada data | 3 placeholder card "Artikel akan segera hadir" | ☐ |
| 2 | Jika ada data | Card: thumbnail, badge kategori, judul, excerpt, tanggal | ☐ |
| 3 | Hover card | Shadow + translate-y | ☐ |
| 4 | Cek link | "Lihat Semua Artikel" → `/blog` | ☐ |

---

## T1.14 — Beranda: Section 10 (CTA Banner)

### TC-1.14.1: CTA Banner
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Cek background | Gradient rose-gold + decorative circles | ☐ |
| 2 | Cek headline | Teks dari `setting('home_cta_text')` | ☐ |
| 3 | Cek subtext | Teks dari `setting('home_cta_subtext')` | ☐ |
| 4 | Cek CTA primary | "Daftar Sekarang" (putih) → `/daftar` | ☐ |
| 5 | Cek CTA secondary | "Hubungi Kami" (outline) → `/kontak` | ☐ |

---

## T1.15 — Beranda: Section 11 (Mitra)

### TC-1.15.1: Logo Partner
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Cek heading | "Telah Bekerja Sama Dengan" | ☐ |
| 2 | Cek placeholder | 5 placeholder logo "Mitra 1–5" | ☐ |
| 3 | Hover logo | Opacity berubah dari 50% ke 100% | ☐ |

---

## T1.16 — SEO & Meta Tags

### TC-1.16.1: Head Tags
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Cek `<title>` | Berisi setting `seo_meta_title` | ☐ |
| 2 | Cek `<meta name="description">` | Berisi setting `seo_meta_description` | ☐ |
| 3 | Cek `<link rel="canonical">` | URL halaman saat ini | ☐ |
| 4 | Cek `og:title` | Sama dengan title | ☐ |
| 5 | Cek `og:description` | Sama dengan meta description | ☐ |
| 6 | Cek `og:url` | URL halaman saat ini | ☐ |
| 7 | Cek CSRF meta | `<meta name="csrf-token">` ada | ☐ |

---

## T1.17 — Cross-Device Responsiveness

### TC-1.17.1: Breakpoints
| # | Device / Width | Yang Dicek | Status |
|---|---|---|---|
| 1 | Mobile (375px) | Navbar hamburger, layout 1 kolom, CTA full-width | ☐ |
| 2 | Tablet (768px) | Grid 2 kolom untuk program, layanan 1 kolom | ☐ |
| 3 | Desktop (1280px) | Grid 3 kolom, navbar horizontal, 4-kolom footer | ☐ |
| 4 | Wide (1536px+) | Max-width container, konten tetap centered | ☐ |

---

> **Total Test Cases:** 80+
> **Metode:** Manual via browser (desktop & responsive mode)
> **Tools:** Chrome DevTools, browser resize, inspect elements
