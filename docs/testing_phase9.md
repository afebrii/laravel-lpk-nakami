# Skenario Testing — Phase 9: Admin CRUD

---

## 9.1 Kelola Testimoni

### TC-9.1.1 Index — Tampilkan Daftar Testimoni
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Login sebagai admin, klik menu **Testimoni** | Halaman `/admin/testimonials` tampil dengan tabel |
| 2 | Pastikan kolom tabel: Foto, Nama, Tipe, Rating, Status, Urutan, Aksi | Semua kolom tampil |
| 3 | Jika belum ada data, tampil pesan "Belum ada testimoni" | Pesan placeholder muncul |

### TC-9.1.2 Filter & Search
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Pilih filter Tipe = **Alumni**, klik Filter | Hanya data tipe Alumni yang tampil |
| 2 | Pilih filter Status = **Aktif** | Hanya data aktif yang tampil |
| 3 | Ketik nama di kolom search, klik Filter | Data sesuai keyword tampil |
| 4 | Klik **Reset** | Filter kembali ke default, semua data tampil |

### TC-9.1.3 Tambah Testimoni
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Klik **"Tambah Testimoni"** | Form create tampil |
| 2 | Kosongkan semua field, klik Simpan | Validasi error muncul (nama, isi wajib) |
| 3 | Isi nama, isi testimoni, pilih tipe Alumni, rating 5, centang Aktif, klik Simpan | Redirect ke index + flash "berhasil ditambahkan" |
| 4 | Upload foto > 2MB | Error validasi ukuran file |
| 5 | Upload foto format .pdf | Error validasi tipe file |
| 6 | Isi lengkap + upload foto valid + pilih program terkait | Data tersimpan dengan foto & relasi program |

### TC-9.1.4 Edit Testimoni
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Klik ikon Edit pada salah satu data | Form edit tampil dengan data terisi |
| 2 | Ubah nama & rating, klik Simpan | Data berubah + flash success |
| 3 | Upload foto baru | Foto lama terhapus, foto baru tersimpan |
| 4 | Tidak upload foto baru | Foto lama tetap ada |

### TC-9.1.5 Hapus Testimoni
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Klik ikon Hapus | Muncul konfirmasi browser |
| 2 | Klik OK | Data terhapus + flash success |
| 3 | Klik Cancel | Data tidak terhapus |

---

## 9.2 Kelola FAQ

### TC-9.2.1 Index — Tampilkan Daftar FAQ
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Klik menu **FAQ** | Halaman `/admin/faqs` tampil dengan tabel |
| 2 | Kolom: Pertanyaan, Kategori, Status, Urutan, Aksi | Semua kolom tampil |

### TC-9.2.2 Filter
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Filter Kategori = **Pendaftaran** | Hanya FAQ kategori Pendaftaran |
| 2 | Filter Status = **Nonaktif** | Hanya FAQ nonaktif |
| 3 | Search keyword "biaya" | FAQ yang mengandung "biaya" muncul |

### TC-9.2.3 Tambah FAQ
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Klik **"Tambah FAQ"** | Form create tampil |
| 2 | Isi pertanyaan, jawaban pakai rich text editor (TinyMCE), pilih kategori | Data tersimpan |
| 3 | Kosongkan pertanyaan, klik Simpan | Validasi error |
| 4 | Cek jawaban tersimpan dengan format HTML (bold, list, dll) | HTML tersimpan dengan benar |

### TC-9.2.4 Edit & Hapus FAQ
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Edit FAQ — ubah pertanyaan & jawaban | Data berubah |
| 2 | Hapus FAQ — konfirmasi & hapus | Data terhapus |

---

## 9.3 Kelola Layanan

### TC-9.3.1 Index Layanan
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Klik menu **Layanan** | Halaman `/admin/services` tampil |
| 2 | Kolom: Nama, Kategori, Harga, Status, Urutan, Aksi | Semua kolom tampil |
| 3 | Harga tampil format Rupiah (Rp 50.000 – Rp 150.000) | Format benar |

### TC-9.3.2 Filter
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Filter berdasarkan Kategori | Data sesuai kategori |
| 2 | Filter berdasarkan Status | Data sesuai status |

### TC-9.3.3 Tambah Layanan
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Isi nama, pilih kategori, isi harga mulai & harga sampai, simpan | Data tersimpan |
| 2 | Isi harga mulai saja (tanpa harga sampai) | Harga tampil "Mulai Rp XX.XXX" |
| 3 | Isi harga mulai = harga sampai | Harga tampil "Rp XX.XXX" (tanpa range) |
| 4 | Kosongkan nama, klik Simpan | Validasi error |

### TC-9.3.4 Edit & Hapus
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Edit layanan — ubah harga | Harga berubah |
| 2 | Hapus layanan | Data terhapus |

---

## 9.4 Kategori Layanan

### TC-9.4.1 Index
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Buka `/admin/service-categories` | Tabel kategori tampil |
| 2 | Kolom: Nama, Icon, Jumlah Layanan, Urutan, Aksi | Semua tampil |

### TC-9.4.2 Tambah Kategori
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Isi nama, slug otomatis tergenerate | Slug terisi otomatis |
| 2 | Isi icon, urutan, simpan | Data tersimpan |

### TC-9.4.3 Hapus Kategori (Proteksi)
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Hapus kategori **yang masih memiliki layanan** | Error: "Tidak dapat dihapus karena masih memiliki layanan" |
| 2 | Hapus kategori **tanpa layanan** | Data terhapus sukses |

---

## 9.5 Kelola User Admin

### TC-9.5.1 Akses Control
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Login sebagai **staff**, akses `/admin/users` | Redirect / 403 Forbidden |
| 2 | Login sebagai **superadmin**, akses `/admin/users` | Halaman tampil |

### TC-9.5.2 Index
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Buka halaman Users | Tabel user tampil |
| 2 | Kolom: Avatar/inisial, Nama, Email, Role (badge), Status, Login Terakhir, Aksi | Semua tampil |
| 3 | Filter Role = Superadmin | Hanya superadmin tampil |

### TC-9.5.3 Tambah User
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Klik **"Tambah User"** | Form create tampil |
| 2 | Isi nama, email, password, konfirmasi password, pilih role | Data tersimpan |
| 3 | Isi email yang sudah ada | Error: email sudah digunakan |
| 4 | Password < 8 karakter | Error validasi password |
| 5 | Password ≠ konfirmasi password | Error: konfirmasi tidak cocok |

### TC-9.5.4 Edit User
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Edit — kosongkan password | Password lama tetap (tidak berubah) |
| 2 | Edit — isi password baru + konfirmasi | Password berubah |
| 3 | Upload avatar baru | Avatar lama diganti |

### TC-9.5.5 Hapus User (Proteksi)
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Hapus user **lain** | Data terhapus |
| 2 | Tombol hapus pada **akun sendiri** | Tombol hapus tidak tampil / error "Tidak dapat menghapus akun sendiri" |

---

## 9.6 Pengaturan Umum

### TC-9.6.1 Akses Control
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Login sebagai **staff**, akses `/admin/settings` | Redirect / 403 Forbidden |
| 2 | Login sebagai **superadmin** | Halaman Settings tampil |

### TC-9.6.2 Tab Navigation
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Klik tab **Identitas** | Konten tab Identitas tampil |
| 2 | Klik tab **Kontak** | Konten tab Kontak tampil |
| 3 | Klik tab **Media Sosial** | Konten tab Sosial tampil |
| 4 | Klik tab **SEO** | Konten tab SEO tampil |
| 5 | Klik tab **Konten Beranda** | Konten tab Beranda tampil |

### TC-9.6.3 Update Settings
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Ubah Nama Lembaga, klik Simpan | Flash success + nilai tersimpan |
| 2 | Upload logo baru | Logo lama diganti, baru tersimpan |
| 3 | Isi Google Analytics ID, simpan | GA ID tersimpan |
| 4 | Ubah statistik beranda, simpan & cek halaman utama | Angka di homepage berubah |

---

## 9.7 Sidebar Navigation

### TC-9.7.1 Link Menu
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Klik setiap link di sidebar | Menuju halaman yang benar |
| 2 | Pastikan active state (highlight) sesuai halaman aktif | Menu aktif ter-highlight rose-gold |
| 3 | Login sebagai staff — menu Users & Settings **tidak tampil** | Hidden untuk non-superadmin |
