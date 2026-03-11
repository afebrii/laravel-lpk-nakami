# Panduan Admin Panel — LKP/LPK Yuwita

Dokumentasi penggunaan admin panel untuk mengelola konten website.

---

## Akses Admin Panel

- **URL:** `https://domain-anda.com/admin`
- **Login:** Masukkan email dan password yang telah diberikan
- **Role:**
  - **Superadmin** — Akses penuh ke semua fitur termasuk Users & Settings
  - **Staff** — Akses ke pengelolaan konten (tanpa Users & Settings)

---

## Menu & Fitur

### 1. Dashboard (`/admin/dashboard`)

Halaman utama admin yang menampilkan ringkasan data website.

---

### 2. Program Pelatihan (`/admin/programs`)

Mengelola program/kelas pelatihan yang ditampilkan di website.

**Cara menambah program baru:**
1. Klik tombol **"Tambah Program"**
2. Isi informasi:
   - **Nama Program** — Judul program (wajib)
   - **Kategori** — Pilih kategori (Reguler/Khusus)
   - **Deskripsi Singkat** — Ringkasan untuk preview
   - **Konten** — Deskripsi lengkap (editor teks)
   - **Thumbnail** — Foto utama (JPG/PNG, maks 2MB)
   - **Harga** — Biaya program (isi 0 jika gratis)
   - **Durasi** — Lama pelatihan
   - **Status** — Centang "Aktif" agar tampil di website
3. Klik **"Simpan"**

**Kategori Program** (`/admin/program-categories`)
- Kelola kategori program (misal: Kelas Reguler, Kelas Khusus)
- Setiap kategori memiliki tipe: `reguler` atau `khusus`

---

### 3. Pendaftaran (`/admin/registrations`)

Melihat dan mengelola data pendaftar yang masuk melalui form pendaftaran website.

- **Filter:** Berdasarkan status (Baru, Diproses, Diterima, Ditolak)
- **Detail:** Klik ikon mata untuk melihat detail pendaftaran
- **Update Status:** Ubah status pendaftaran sesuai progress

---

### 4. Galeri (`/admin/gallery`)

Mengelola foto-foto galeri kegiatan.

**Cara menambah foto:**
1. Klik **"Tambah Foto"**
2. Isi judul, pilih kategori, upload gambar
3. Atur urutan tampil (angka kecil = tampil lebih dulu)
4. Centang "Aktif" dan simpan

---

### 5. Blog (`/admin/posts`)

Mengelola artikel/berita yang tampil di halaman Blog.

**Cara menulis artikel:**
1. Klik **"Tambah Artikel"**
2. Isi judul — slug otomatis di-generate
3. Tulis konten menggunakan editor teks (TinyMCE)
4. Upload thumbnail
5. Isi excerpt (ringkasan untuk preview)
6. Atur kategori dan SEO meta (opsional)
7. Pilih status **"Published"** agar tampil di website
8. Simpan

---

### 6. Testimoni (`/admin/testimonials`)

Mengelola testimoni dari alumni dan pelanggan.

**Informasi yang diisi:**
- **Nama** — Nama pemberi testimoni
- **Foto** — Foto profil (opsional)
- **Tipe** — Alumni atau Pelanggan Salon
- **Program** — Program terkait (untuk alumni, opsional)
- **Rating** — Bintang 1-5
- **Isi Testimoni** — Teks testimoni
- **Urutan & Status** — Atur urutan tampil dan aktif/nonaktif

---

### 7. FAQ (`/admin/faqs`)

Mengelola pertanyaan yang sering ditanyakan.

**Informasi yang diisi:**
- **Pertanyaan** — Pertanyaan yang akan ditampilkan
- **Jawaban** — Jawaban lengkap (editor teks)
- **Kategori** — Umum, Pendaftaran, Biaya, Sertifikat, Lainnya
- **Urutan & Status**

---

### 8. Layanan Salon (`/admin/services`)

Mengelola daftar layanan salon yang ditawarkan.

**Informasi yang diisi:**
- **Nama Layanan** — Nama layanan (misal: "Potong Rambut Wanita")
- **Kategori** — Pilih kategori layanan
- **Deskripsi Singkat** — Ringkasan layanan
- **Harga Mulai & Harga Sampai** — Range harga (isi sama jika harga tetap)
- **Urutan & Status**

**Kategori Layanan** (`/admin/service-categories`)
- Kelola kategori layanan salon (misal: Perawatan Rambut, Perawatan Wajah)
- ⚠️ Kategori tidak bisa dihapus jika masih memiliki layanan

---

### 9. Users (`/admin/users`) — *Superadmin Only*

Mengelola akun admin yang memiliki akses ke panel admin.

**Cara menambah user:**
1. Klik **"Tambah User"**
2. Isi nama, email, dan password
3. Pilih role: **Superadmin** (akses penuh) atau **Staff** (akses konten saja)
4. Upload foto profil (opsional)
5. Simpan

> ⚠️ Akun sendiri tidak bisa dihapus dari panel admin.

---

### 10. Pengaturan (`/admin/settings`) — *Superadmin Only*

Mengatur konfigurasi umum website. Terbagi dalam beberapa tab:

#### Tab Identitas
| Field | Keterangan |
|---|---|
| Nama Lembaga | Nama yang tampil di header dan footer |
| Tagline | Teks pendek di bawah nama |
| Deskripsi Singkat | Deskripsi untuk SEO dan About |
| Logo | Logo website (tampil di navbar) |
| Favicon | Ikon kecil di tab browser |

#### Tab Kontak
| Field | Keterangan |
|---|---|
| Alamat | Alamat lengkap lembaga |
| No. Telepon | Nomor telepon utama |
| No. WhatsApp Admin | Nomor WA untuk tombol WhatsApp floating |
| Email | Email utama untuk korespondensi |

#### Tab Media Sosial
Link ke akun media sosial: Facebook, Instagram, YouTube, TikTok.

#### Tab SEO
| Field | Keterangan |
|---|---|
| Meta Title | Judul default untuk mesin pencari |
| Meta Description | Deskripsi default untuk mesin pencari |
| Google Analytics ID | ID tracking Google Analytics (format: `G-XXXXXXXXX`) |

#### Tab Konten Beranda
Mengatur teks dan angka yang tampil di halaman utama:
- Headline & subheadline hero section
- Angka statistik (alumni, tahun berdiri, program, mitra)
- Teks CTA banner

---

## Tips Penggunaan

1. **Urutan tampil** — Angka kecil ditampilkan lebih dulu. Gunakan kelipatan 10 (10, 20, 30) agar mudah menyelipkan item baru.
2. **Status Aktif** — Item dengan status nonaktif tidak akan tampil di website publik, tapi tetap tersimpan di database.
3. **Upload gambar** — Format yang didukung: JPG, PNG. Maksimal 2MB per file.
4. **SEO Blog** — Isi meta title dan meta description pada artikel untuk optimasi mesin pencari.
5. **Backup** — Lakukan backup database secara berkala melalui hosting panel.

---

## Kontak Teknis

Jika mengalami kendala teknis, hubungi developer:
- **Nama:** *(isi nama developer)*
- **Email:** *(isi email developer)*
- **WhatsApp:** *(isi nomor WA developer)*
