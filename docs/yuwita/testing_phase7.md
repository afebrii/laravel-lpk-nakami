# 🧪 Skenario Testing — Phase 7 (Admin Auth & Dashboard)

> **Cakupan:** Login `/admin/login`, Dashboard `/admin/dashboard`, Middleware, Layout Admin
> **Tanggal:** 11 Maret 2026

---

## T7.1 — Halaman Login `/admin/login`

### TC-7.1.1: Page Load & Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/admin/login` | Halaman login tampil tanpa error, HTTP 200 | ☐ |
| 2 | Cek title browser | Title = "Login Admin — LKP/LPK Yuwita" | ☐ |
| 3 | Inspect layout | Background gradient charcoal → rose-gold-dark | ☐ |
| 4 | Lihat header card | Icon shield + "Admin Panel" + nama site | ☐ |
| 5 | Lihat form | Field Email + Password + Remember Me + tombol "Masuk" | ☐ |
| 6 | Lihat link bawah | "Kembali ke Website" tampil di bawah card | ☐ |
| 7 | Klik "Kembali ke Website" | Redirect ke halaman home `/` | ☐ |

### TC-7.1.2: Login Sukses
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Isi Email: "admin@lkp-yuwita.com" | Field terisi | ☐ |
| 2 | Isi Password: "password" | Field terisi (masked) | ☐ |
| 3 | Klik ikon mata pada password | Password visible (toggle show/hide) | ☐ |
| 4 | Klik "Masuk" | Redirect ke `/admin/dashboard` | ☐ |
| 5 | Cek database (tinker) | `last_login_at` terupdate dg timestamp terbaru | ☐ |

### TC-7.1.3: Login dengan Remember Me
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Centang "Ingat saya" lalu login | Login berhasil, cookie remember_token terisi | ☐ |
| 2 | Tutup browser, buka lagi | Session tetap aktif | ☐ |

### TC-7.1.4: Login Gagal
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Submit form kosong | Validasi browser mencegah submit | ☐ |
| 2 | Isi email salah + password benar | Error "Email atau password salah." muncul | ☐ |
| 3 | Isi email benar + password salah | Error "Email atau password salah." muncul | ☐ |
| 4 | Isi email format invalid | Validasi browser "format email tidak valid" | ☐ |
| 5 | Login dg akun is_active=false | Error "Akun Anda telah dinonaktifkan." | ☐ |
| 6 | Cek field email setelah error | Email sebelumnya masih terisi (onlyInput) | ☐ |

### TC-7.1.5: Login Staff
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Login: "staff@lkp-yuwita.com" / "password" | Login berhasil, redirect ke dashboard | ☐ |
| 2 | Cek sidebar | Menu "Users" dan "Settings" TIDAK tampil | ☐ |

---

## T7.2 — Middleware & Proteksi

### TC-7.2.1: AdminMiddleware
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Logout, buka `/admin/dashboard` | Redirect ke `/admin/login` | ☐ |
| 2 | Logout, buka `/admin/programs` | Redirect ke `/admin/login` | ☐ |
| 3 | Login, buka `/admin/dashboard` | Halaman tampil normal | ☐ |
| 4 | Login, buka `/admin/login` | Redirect ke `/admin/dashboard` (sudah login) | ☐ |

### TC-7.2.2: Logout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik dropdown user di topbar | Dropdown muncul (nama, role, tombol Logout) | ☐ |
| 2 | Klik "Logout" | Redirect ke `/admin/login` dg flash "Berhasil logout" | ☐ |
| 3 | Tekan tombol Back browser | Tidak bisa kembali ke dashboard (session invalid) | ☐ |

---

## T7.3 — Layout Admin

### TC-7.3.1: Sidebar
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Login sebagai superadmin | Sidebar tampil di kiri, lebar 256px | ☐ |
| 2 | Cek logo | "LKP Yuwita" + "Admin Panel" tampil | ☐ |
| 3 | Cek menu utama | "Dashboard" link aktif (highlight rose-gold) | ☐ |
| 4 | Cek section Konten | Menu: Program, Kategori Program, Pendaftaran, Galeri, Blog, Testimoni, FAQ, Layanan, Pesan Kontak | ☐ |
| 5 | Cek section Pengaturan (superadmin) | Menu: Users, Settings tampil | ☐ |
| 6 | Login sebagai staff | Section Pengaturan TIDAK tampil | ☐ |
| 7 | Navigasi ke Program | Menu "Program" berubah aktif (rose-gold), Dashboard tidak aktif lagi | ☐ |
| 8 | Cek user info bawah | Nama user + role tampil di bottom sidebar | ☐ |

### TC-7.3.2: Topbar
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat topbar | Page title "Dashboard" tampil | ☐ |
| 2 | Navigasi ke Program | Page title berubah jadi "Kelola Program" | ☐ |
| 3 | Lihat kanan topbar | Link "Lihat Website" + avatar + nama user tampil | ☐ |
| 4 | Klik "Lihat Website" | Buka homepage di tab baru | ☐ |
| 5 | Klik dropdown user | Dropdown nama, role, tombol Logout muncul | ☐ |
| 6 | Klik di luar dropdown | Dropdown tertutup | ☐ |

### TC-7.3.3: Responsive Sidebar (Mobile)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Resize browser ke < 1024px | Sidebar tersembunyi (off-screen) | ☐ |
| 2 | Klik hamburger di topbar | Sidebar slide in dari kiri | ☐ |
| 3 | Klik overlay (area gelap) | Sidebar slide out, overlay hilang | ☐ |
| 4 | Resize ke > 1024px | Sidebar tampil permanen tanpa hamburger | ☐ |

### TC-7.3.4: Flash Messages
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Login (munculkan flash success) | Toast hijau muncul, auto-hilang setelah 4 detik | ☐ |
| 2 | Trigger flash error | Toast merah muncul, auto-hilang setelah 4 detik | ☐ |

---

## T7.4 — Dashboard `/admin/dashboard`

### TC-7.4.1: Welcome & Stat Widgets
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat welcome message | "Selamat datang kembali, [nama] 👋" tampil | ☐ |
| 2 | Cek widget "Total Pendaftar" | Angka sesuai jumlah data di DB, icon biru | ☐ |
| 3 | Cek widget "Pendaftar Bulan Ini" | Angka sesuai data bulan berjalan, icon hijau | ☐ |
| 4 | Cek widget "Menunggu Konfirmasi" | Angka sesuai status=pending, icon kuning | ☐ |
| 5 | Cek widget "Program Aktif" | Angka sesuai program status=active, icon ungu | ☐ |
| 6 | Cek widget "Artikel Terbit" | Angka sesuai post is_published, icon rose | ☐ |
| 7 | Cek widget "Foto Galeri" | Angka sesuai jumlah gallery, icon cyan | ☐ |
| 8 | Hover widget | Shadow muncul (transisi halus) | ☐ |

### TC-7.4.2: Chart — Pendaftaran 6 Bulan
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat line chart | Chart tampil dengan 6 label bulan | ☐ |
| 2 | Cek data point | Titik data sesuai jumlah pendaftar per bulan | ☐ |
| 3 | Hover data point | Tooltip muncul dg angka pendaftaran | ☐ |
| 4 | Cek warna | Garis rose-gold, area fill transparan | ☐ |

### TC-7.4.3: Chart — Distribusi per Program
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat doughnut chart | Chart tampil jika ada data registrasi | ☐ |
| 2 | Jika tidak ada data | Teks "Belum ada data" tampil | ☐ |
| 3 | Cek legend | Nama program tampil di bawah chart | ☐ |
| 4 | Hover segment | Tooltip muncul dg nama program + angka | ☐ |

### TC-7.4.4: Tabel Pendaftaran Terbaru
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat tabel | Header: Nama, Ref Code, Program, Tipe, Tanggal, Status | ☐ |
| 2 | Cek isi tabel | Maksimal 5 data terbaru tampil | ☐ |
| 3 | Cek badge tipe | "Konsultasi" = biru, "Pelatihan" = ungu | ☐ |
| 4 | Cek badge status | Pending = kuning, Confirmed = hijau, Rejected = merah | ☐ |
| 5 | Jika tidak ada data | Teks "Belum ada data pendaftaran." tampil | ☐ |

---

## T7.5 — Responsive Dashboard

### TC-7.5.1: Responsive Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Dashboard di mobile (375px) | Widget 1 kolom, chart full-width | ☐ |
| 2 | Dashboard di tablet (768px) | Widget 2 kolom, chart stack | ☐ |
| 3 | Dashboard di desktop (1280px) | Widget 3 kolom, chart 2:1 ratio | ☐ |
| 4 | Tabel di mobile | Horizontal scroll aktif | ☐ |

---

> **Total Test Cases Phase 7:** 75
> **Metode:** Manual via browser
> **Prioritas tinggi:** Login/logout, middleware redirect, widget data akurasi
> **Prioritas sedang:** Sidebar responsive, chart, dropdown
> **Prioritas rendah:** Animasi, flash message timing, remember me
