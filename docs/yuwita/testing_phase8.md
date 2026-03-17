# 🧪 Skenario Testing — Phase 8 (Admin CRUD)

> **Cakupan:** Kelola Program, Kategori, Pendaftaran, Galeri, Blog (Admin Panel)
> **Tanggal:** 11 Maret 2026

---

## T8.1 — Kelola Program `/admin/programs`

### TC-8.1.1: Index & Filter
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/admin/programs` | Tabel program tampil, total "8 program" | ☐ |
| 2 | Cek kolom tabel | Program (thumbnail+nama), Kategori, Harga, Pendaftar, Status, Aksi | ☐ |
| 3 | Cek badge kategori | "Kelas Reguler" biru, "Kelas Khusus" ungu | ☐ |
| 4 | Cek badge status | Aktif=hijau, Nonaktif=abu, Segera Hadir=kuning | ☐ |
| 5 | Cek harga | Format "Rp 100.000" atau "GRATIS" | ☐ |
| 6 | Cek tombol aksi | Ikon edit (biru) + hapus (merah) per baris | ☐ |
| 7 | Isi search "Make Up" lalu klik Filter | Hanya program dengan "Make Up" di nama tampil | ☐ |
| 8 | Pilih kategori "Kelas Reguler" + Filter | Hanya program reguler tampil | ☐ |
| 9 | Pilih status "Aktif" + Filter | Hanya program aktif tampil | ☐ |
| 10 | Klik "Reset" | Semua filter direset, semua program tampil | ☐ |

### TC-8.1.2: Tambah Program
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik tombol "+ Tambah Program" | Redirect ke form baru, title "Tambah Program" | ☐ |
| 2 | Cek layout form | 2 kolom: kiri (info, konten, SEO), kanan (thumbnail, detail) | ☐ |
| 3 | Cek field wajib | Nama, Kategori, Deskripsi Singkat, Status bertanda * | ☐ |
| 4 | Cek dropdown kategori | Semua kategori dari DB tampil dg tipe | ☐ |
| 5 | Cek rich text editor | TinyMCE muncul untuk Deskripsi, Kurikulum, Fasilitas, Syarat | ☐ |
| 6 | Cek field upload | File input untuk thumbnail, keterangan "maks 2MB" | ☐ |
| 7 | Isi Nama: "Program Tes" | Field terisi | ☐ |
| 8 | Pilih kategori, status=Aktif | Dropdown terpilih | ☐ |
| 9 | Isi Deskripsi Singkat | Field terisi | ☐ |
| 10 | Upload thumbnail JPG < 2MB | File terpilih | ☐ |
| 11 | Isi harga: 500000 | Field terisi | ☐ |
| 12 | Klik "Tambah Program" | Redirect ke index, flash "Program berhasil ditambahkan." | ☐ |
| 13 | Cek tabel | Program baru muncul di daftar | ☐ |
| 14 | Cek database | Slug auto-generated = "program-tes" | ☐ |

### TC-8.1.3: Edit Program
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik ikon edit pada program | Form edit tampil, title "Edit Program" | ☐ |
| 2 | Cek field terisi | Semua field prefilled dg data existing | ☐ |
| 3 | Cek thumbnail preview | Gambar existing ditampilkan di atas file input | ☐ |
| 4 | Ubah nama, klik "Simpan Perubahan" | Redirect ke index, flash "Program berhasil diperbarui." | ☐ |
| 5 | Upload thumbnail baru | Thumbnail lama terhapus dari storage, baru tersimpan | ☐ |

### TC-8.1.4: Hapus Program
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik ikon hapus pada program tanpa pendaftar | Confirm dialog muncul "Hapus program ini?" | ☐ |
| 2 | Klik OK | Program terhapus, flash "Program berhasil dihapus." | ☐ |
| 3 | Klik hapus pada program dg pendaftar | Flash error "Program tidak bisa dihapus karena sudah ada pendaftar." | ☐ |

### TC-8.1.5: Validasi Program
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Submit form kosong | Validasi browser + backend error muncul | ☐ |
| 2 | Isi nama > 255 karakter | Error validasi maks 255 | ☐ |
| 3 | Upload thumbnail > 2MB | Error validasi ukuran | ☐ |
| 4 | Upload file non-image | Error validasi format | ☐ |
| 5 | Isi harga negatif | Error validasi min:0 | ☐ |
| 6 | Centang "Program Gratis" | Checkbox tercentang, is_free=true | ☐ |

---

## T8.2 — Kategori Program `/admin/program-categories`

### TC-8.2.1: Index
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/admin/program-categories` | Tabel tampil, 2 kategori | ☐ |
| 2 | Cek kolom | Nama, Tipe (badge), Jumlah Program, Aksi | ☐ |
| 3 | Cek badge tipe | "Reguler" biru, "Khusus" ungu | ☐ |
| 4 | Cek jumlah program | Angka sesuai jumlah program per kategori | ☐ |

### TC-8.2.2: CRUD Kategori
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik "+ Tambah Kategori" | Form tampil dg field Nama, Tipe, Deskripsi | ☐ |
| 2 | Isi Nama: "Kelas Online", Tipe: Reguler | Field terisi | ☐ |
| 3 | Klik "Tambah" | Redirect ke index, flash sukses, kategori baru tampil | ☐ |
| 4 | Klik edit pada kategori baru | Form prefilled, title "Edit Kategori" | ☐ |
| 5 | Ubah nama, klik "Simpan" | Redirect ke index, data terupdate | ☐ |

### TC-8.2.3: Proteksi Hapus
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Hapus kategori yang punya program | Flash error "Kategori tidak bisa dihapus karena masih ada program terhubung." | ☐ |
| 2 | Hapus kategori baru (tanpa program) | Kategori terhapus, flash sukses | ☐ |

### TC-8.2.4: Validasi Kategori
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Submit tanpa nama | Error "required" | ☐ |
| 2 | Isi nama yang sudah ada | Error "unique" — nama harus unik | ☐ |

---

## T8.3 — Kelola Pendaftaran `/admin/registrations`

### TC-8.3.1: Index & Filter
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/admin/registrations` | Tabel pendaftaran tampil, total count sesuai | ☐ |
| 2 | Cek kolom tabel | Ref Code, Nama, Program, Tipe, Status, Tanggal, Aksi | ☐ |
| 3 | Cek badge tipe | "Konsultasi" sky-blue, "Pelatihan" ungu | ☐ |
| 4 | Cek badge status | Pending=kuning, Confirmed=hijau, Completed=biru, Rejected=merah | ☐ |
| 5 | Cek ref code | Format monospace YWT-YYYYMMDD-XXXXX | ☐ |
| 6 | Filter tipe "Konsultasi" | Hanya tipe konsultasi tampil | ☐ |
| 7 | Filter program tertentu | Hanya pendaftar program tsb tampil | ☐ |
| 8 | Filter status "Pending" | Hanya pending tampil | ☐ |
| 9 | Search "Andika" | Hanya baris dg nama/email/ref matching | ☐ |
| 10 | Klik Reset | Filter direset | ☐ |

### TC-8.3.2: Detail Pendaftaran
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik ikon detail (mata) | Halaman detail pendaftar tampil | ☐ |
| 2 | Cek breadcrumb / back link | Tombol "Kembali" ke index | ☐ |
| 3 | Cek data pendaftar | Nama, WA, Email, Program, Tipe, Tanggal Daftar tampil | ☐ |
| 4 | Cek ref code | Kode tampil di pojok kanan atas card | ☐ |
| 5 | Untuk tipe pelatihan | Field tambahan: TTL, Gender, Alamat, Pendidikan, dll tampil | ☐ |
| 6 | Jika ada pas foto | Foto tampil di bagian bawah card | ☐ |
| 7 | Klik nomor WhatsApp | Link ke wa.me/[nomor] terbuka di tab baru | ☐ |

### TC-8.3.3: Update Status
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Di halaman detail, cek status | Status saat ini ditampilkan + form ubah status | ☐ |
| 2 | Pilih status "Dikonfirmasi" | Dropdown terpilih | ☐ |
| 3 | Isi catatan admin: "Sudah dihubungi" | Textarea terisi | ☐ |
| 4 | Klik "Update Status" | Flash "Status berhasil diperbarui.", badge berubah | ☐ |
| 5 | Cek database | status berubah, confirmed_at terisi, admin_notes terisi | ☐ |
| 6 | Ubah ke "Selesai" | Status update ke completed | ☐ |
| 7 | Ubah ke "Ditolak" | Status update ke rejected | ☐ |

### TC-8.3.4: Aksi Cepat
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik "Chat WhatsApp" (tombol hijau) | Buka wa.me/[nomor_pendaftar] di tab baru | ☐ |

---

## T8.4 — Kelola Galeri `/admin/gallery`

### TC-8.4.1: Index
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/admin/gallery` | Halaman tampil, total foto ditampilkan | ☐ |
| 2 | Jika belum ada foto | Pesan "Belum ada foto galeri." tampil | ☐ |
| 3 | Cek kolom tabel | Foto (thumbnail), Judul, Kategori, Status, Urutan, Aksi | ☐ |
| 4 | Filter kategori | Dropdown terisi dg kategori existing | ☐ |
| 5 | Search judul | Hasil filter sesuai | ☐ |

### TC-8.4.2: Tambah Foto
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik "+ Tambah Foto" | Form tampil dg field: Judul, Foto, Kategori, Deskripsi, Urutan, Aktif | ☐ |
| 2 | Isi Judul: "Foto Kegiatan" | Field terisi | ☐ |
| 3 | Upload JPG < 5MB | File terpilih | ☐ |
| 4 | Isi kategori: "Kegiatan" | Field terisi | ☐ |
| 5 | Centang "Aktif" | Checkbox tercentang | ☐ |
| 6 | Klik "Tambah Foto" | Redirect ke index, flash sukses, foto baru di tabel | ☐ |
| 7 | Cek thumbnail tabel | Preview kecil foto tampil | ☐ |
| 8 | Cek storage | File tersimpan di `storage/gallery/` | ☐ |

### TC-8.4.3: Edit & Hapus Foto
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik edit | Form prefilled, foto existing tampil | ☐ |
| 2 | Ubah judul, klik "Simpan" | Data terupdate, redirect ke index | ☐ |
| 3 | Upload foto baru saat edit | Foto lama terhapus dari storage, baru tersimpan | ☐ |
| 4 | Klik hapus | Confirm dialog muncul | ☐ |
| 5 | Konfirmasi hapus | Foto terhapus dari DB dan storage | ☐ |

### TC-8.4.4: Validasi Galeri
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Submit tanpa judul | Error required | ☐ |
| 2 | Submit tanpa upload foto (create) | Error "image required" | ☐ |
| 3 | Upload > 5MB | Error "image max 5120KB" | ☐ |
| 4 | Upload file non-image | Error format file | ☐ |
| 5 | Edit tanpa upload foto baru | Foto existing tetap, OK | ☐ |

---

## T8.5 — Kelola Blog `/admin/posts`

### TC-8.5.1: Index & Filter
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/admin/posts` | Tabel blog tampil, total "6 artikel" | ☐ |
| 2 | Cek kolom tabel | Artikel (thumbnail+judul), Kategori, Penulis, Status, Tanggal, Aksi | ☐ |
| 3 | Cek badge kategori | Badge rose-gold untuk setiap kategori | ☐ |
| 4 | Cek badge status | "Terbit" hijau, "Draft" abu-abu | ☐ |
| 5 | Filter kategori "Tips Kecantikan" | Hanya artikel kategori tsb tampil | ☐ |
| 6 | Filter status "published" | Hanya artikel terbit tampil | ☐ |
| 7 | Search "Makeup" | Hasil filtering judul yang cocok | ☐ |
| 8 | Klik Reset | Filter direset | ☐ |

### TC-8.5.2: Tulis Artikel Baru
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik "+ Tulis Artikel" | Form tampil, title "Tulis Artikel" | ☐ |
| 2 | Cek layout form | 2 kolom: kiri (judul, excerpt, konten, SEO), kanan (kategori, publish, thumbnail) | ☐ |
| 3 | Cek rich text editor | TinyMCE muncul untuk field Konten | ☐ |
| 4 | Isi Judul: "Artikel Tes Baru" | Field terisi | ☐ |
| 5 | Isi Excerpt | Field terisi | ☐ |
| 6 | Isi Konten via TinyMCE | Editor berfungsi, bold/italic/list bekerja | ☐ |
| 7 | Pilih Kategori: "Tutorial" | Dropdown terpilih | ☐ |
| 8 | Centang "Terbitkan sekarang" | Checkbox tercentang | ☐ |
| 9 | Upload thumbnail JPG | File terpilih | ☐ |
| 10 | Klik "Publikasikan" | Redirect ke index, flash sukses | ☐ |
| 11 | Cek tabel | Artikel baru tampil, status "Terbit" | ☐ |
| 12 | Cek database | slug = "artikel-tes-baru", user_id = auth user, published_at terisi | ☐ |

### TC-8.5.3: Edit Artikel
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik edit pada artikel | Form prefilled dg data existing | ☐ |
| 2 | Cek thumbnail preview | Gambar existing tampil | ☐ |
| 3 | Cek TinyMCE content | Konten existing dimuat di editor | ☐ |
| 4 | Ubah judul, klik "Simpan" | Redirect ke index, flash sukses, slug terupdate | ☐ |
| 5 | Uncheck "Terbitkan" lalu simpan | Status berubah jadi "Draft" | ☐ |

### TC-8.5.4: Hapus Artikel
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik hapus pada artikel | Confirm dialog muncul | ☐ |
| 2 | Konfirmasi | Artikel terhapus, thumbnail terhapus dari storage | ☐ |

### TC-8.5.5: Validasi Blog
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Submit tanpa judul | Error required | ☐ |
| 2 | Submit tanpa excerpt | Error required | ☐ |
| 3 | Submit tanpa konten | Error required | ☐ |
| 4 | Submit tanpa kategori | Error required | ☐ |
| 5 | Upload thumbnail > 2MB | Error validasi ukuran | ☐ |
| 6 | Isi Meta Title dan Description | Tersimpan di database | ☐ |

---

## T8.6 — Navigasi Sidebar

### TC-8.6.1: Link Sidebar Admin
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Klik "Program" di sidebar | Redirect ke `/admin/programs`, menu aktif | ☐ |
| 2 | Klik "Kategori Program" | Redirect ke `/admin/program-categories`, menu aktif | ☐ |
| 3 | Klik "Pendaftaran" | Redirect ke `/admin/registrations`, menu aktif | ☐ |
| 4 | Klik "Galeri" | Redirect ke `/admin/gallery`, menu aktif | ☐ |
| 5 | Klik "Blog" | Redirect ke `/admin/posts`, menu aktif | ☐ |
| 6 | Klik "Dashboard" | Redirect ke `/admin/dashboard`, menu aktif | ☐ |
| 7 | Menu Testimoni, FAQ, Layanan, Pesan Kontak | Masih link ke dashboard (Phase 9) | ☐ |

---

## T8.7 — Responsive Admin CRUD

### TC-8.7.1: Responsive Tables
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka listing di mobile (375px) | Tabel horizontal scroll, sidebar hidden | ☐ |
| 2 | Buka form di mobile | Form single-column, fields full-width | ☐ |
| 3 | Buka listing di tablet (768px) | Tabel readable, sidebar overlay | ☐ |
| 4 | Buka form di desktop (1280px) | Form 2-column layout, sidebar permanen | ☐ |

---

> **Total Test Cases Phase 8:** 120
> **Metode:** Manual via browser + database check
> **Prioritas tinggi:** CRUD create/update/delete, validasi, status update pendaftaran
> **Prioritas sedang:** Filter/search, file upload, thumbnail management
> **Prioritas rendah:** Responsive tabel, sidebar active state, TinyMCE editor
