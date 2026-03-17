# 🧪 Skenario Testing — Phase 5 (Sistem Pendaftaran)

> **Cakupan:** Halaman Pendaftaran `/daftar`, Halaman Sukses `/sukses-daftar`
> **Tanggal:** 11 Maret 2026

---

## T5.1 — Halaman Pendaftaran `/daftar`

### TC-5.1.1: Page Load & Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/daftar` | Halaman tampil tanpa error, HTTP 200 | ☐ |
| 2 | Cek title browser | Title = "Pendaftaran — LKP/LPK Yuwita" | ☐ |
| 3 | Inspect `<head>` | Meta description terisi sesuai | ☐ |
| 4 | Lihat breadcrumb | Tampil "Beranda > Pendaftaran" | ☐ |
| 5 | Klik "Beranda" di breadcrumb | Redirect ke halaman home `/` | ☐ |

### TC-5.1.2: Hero & Instruksi
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat hero section | Judul "Pendaftaran" + deskripsi tampil | ☐ |
| 2 | Lihat section instruksi | Tampil 3 step card: Pilih Program, Isi Formulir, Konfirmasi | ☐ |
| 3 | Setiap step card | Icon, nomor step, judul, deskripsi tampil | ☐ |

### TC-5.1.3: Tab Pilihan (Alpine.js)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat tab default | Tab "Daftar Program Pelatihan" aktif (highlight rose-gold) | ☐ |
| 2 | Klik tab "Konsultasi Gratis" | Tab berpindah, form konsultasi tampil | ☐ |
| 3 | Klik tab "Daftar Program Pelatihan" | Tab berpindah, form pelatihan tampil | ☐ |
| 4 | Amati transisi tab | Perpindahan form smooth tanpa flicker | ☐ |

---

## T5.2 — Form Konsultasi Gratis (Tab 1)

### TC-5.2.1: Field & Label
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Pilih tab Konsultasi | Tampil 5 field: Nama, WhatsApp, Email, Program, Pesan | ☐ |
| 2 | Cek label Nama | Label "Nama Lengkap" dengan tanda * (required) | ☐ |
| 3 | Cek label WhatsApp | Label "Nomor WhatsApp" dengan tanda * | ☐ |
| 4 | Cek label Email | Label "Email" dengan keterangan (opsional) | ☐ |
| 5 | Cek label Program | Label "Program yang Diminati" dengan tanda * | ☐ |
| 6 | Klik dropdown Program | Daftar program dari database muncul | ☐ |
| 7 | Cek label Pesan | Label "Pesan / Pertanyaan" sebagai textarea | ☐ |

### TC-5.2.2: Validasi Frontend (Konsultasi)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Submit form kosong | Validasi browser mencegah submit (required) | ☐ |
| 2 | Isi nama saja, submit | Validasi WhatsApp required muncul | ☐ |
| 3 | Isi email dengan format salah | Validasi email format muncul | ☐ |

### TC-5.2.3: Submit Konsultasi (Happy Path)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Isi Nama: "Tes Konsultasi" | Field terisi | ☐ |
| 2 | Isi WhatsApp: "081234567890" | Field terisi | ☐ |
| 3 | Biarkan Email kosong | Boleh kosong (opsional) | ☐ |
| 4 | Pilih Program dari dropdown | Program terpilih | ☐ |
| 5 | Isi Pesan: "Ingin konsultasi tentang program MUA" | Field terisi | ☐ |
| 6 | Klik "Kirim Konsultasi" | Button menampilkan spinner/loading | ☐ |
| 7 | Tunggu proses | Redirect ke `/sukses-daftar` | ☐ |
| 8 | Cek database (tinker) | Data tersimpan di tabel `registrations` dengan type=konsultasi | ☐ |

### TC-5.2.4: Validasi Backend (Konsultasi)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Submit tanpa nama (bypass frontend) | Error "Nama lengkap wajib diisi." muncul | ☐ |
| 2 | Submit nama > 255 karakter | Error "Nama lengkap terlalu panjang." muncul | ☐ |
| 3 | Submit WhatsApp bukan angka | Error validasi format | ☐ |
| 4 | Submit email invalid | Error "Format email tidak valid." muncul | ☐ |
| 5 | Submit tanpa program_id | Error "Silakan pilih program." muncul | ☐ |

---

## T5.3 — Form Daftar Pelatihan (Tab 2)

### TC-5.3.1: Field & Label
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Pilih tab Daftar Program | Tampil 12+ field lengkap | ☐ |
| 2 | Cek field wajib | Program, Nama, WhatsApp, Email, TTL, Gender, Alamat bertanda * | ☐ |
| 3 | Cek field opsional | Pendidikan, Pekerjaan, No HP Ibu, Motivasi, Foto | ☐ |
| 4 | Cek dropdown Gender | Pilihan: Laki-laki, Perempuan | ☐ |
| 5 | Cek dropdown Pendidikan | Pilihan: SMP, SMA/SMK, D3, S1, dst | ☐ |
| 6 | Cek input Tanggal Lahir | Tipe date picker muncul | ☐ |
| 7 | Cek input Pas Foto | File upload, accept jpg/png | ☐ |
| 8 | Cek checkbox S&K | Checkbox persetujuan syarat & ketentuan tampil | ☐ |

### TC-5.3.2: Upload Foto
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Upload file JPG < 2MB | File terpilih, nama file tampil | ☐ |
| 2 | Upload file PNG < 2MB | File terpilih, diterima | ☐ |
| 3 | Upload file > 2MB | Error validasi "Ukuran foto maksimal 2MB" | ☐ |
| 4 | Upload file non-image (PDF) | Error validasi format file | ☐ |
| 5 | Tidak upload foto | Boleh kosong (opsional) | ☐ |

### TC-5.3.3: Submit Pelatihan (Happy Path)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Isi semua field wajib | Semua field terisi dengan data valid | ☐ |
| 2 | Centang checkbox S&K | Checkbox tercentang | ☐ |
| 3 | Klik "Kirim Pendaftaran" | Button menampilkan spinner/loading | ☐ |
| 4 | Tunggu proses | Redirect ke `/sukses-daftar` | ☐ |
| 5 | Cek database | Data tersimpan dengan type=pelatihan, status=pending | ☐ |
| 6 | Cek ref_code | Format YWT-YYYYMMDD-XXXXX (contoh: YWT-20260311-00001) | ☐ |
| 7 | Jika upload foto | File tersimpan di `storage/registrations/` | ☐ |

### TC-5.3.4: Validasi Backend (Pelatihan)
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Submit tanpa centang S&K | Error "Anda harus menyetujui syarat & ketentuan." | ☐ |
| 2 | Submit tanpa gender | Error validasi gender muncul | ☐ |
| 3 | Submit tanpa alamat | Error "Alamat wajib diisi." muncul | ☐ |
| 4 | Submit TTL di masa depan | Diterima (belum ada validasi tanggal) | ☐ |

---

## T5.4 — Honeypot Anti-Spam

### TC-5.4.1: Honeypot
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Inspect halaman | Field "website" tersembunyi (display: none / opacity: 0) | ☐ |
| 2 | Submit form normal | Honeypot kosong, form berhasil | ☐ |
| 3 | Isi field honeypot lalu submit | Form ditolak (validasi max:0 gagal) | ☐ |

---

## T5.5 — Halaman Sukses `/sukses-daftar`

### TC-5.5.1: Tampilan Sukses
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Setelah submit konsultasi | Redirect ke `/sukses-daftar`, pesan "Konsultasi Terkirim!" | ☐ |
| 2 | Setelah submit pelatihan | Redirect ke `/sukses-daftar`, pesan "Pendaftaran Berhasil!" | ☐ |
| 3 | Lihat nomor referensi | Kode tampil dalam format YWT-YYYYMMDD-XXXXX | ☐ |
| 4 | Klik tombol copy | Kode tercopy ke clipboard, notifikasi "Tersalin!" | ☐ |

### TC-5.5.2: Langkah Selanjutnya
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Lihat section langkah | Instruksi langkah selanjutnya tampil (3 step) | ☐ |
| 2 | Klik "Kembali ke Beranda" | Redirect ke `/` | ☐ |
| 3 | Klik "Hubungi Admin via WhatsApp" | Buka WA ke nomor 082216796892 | ☐ |

### TC-5.5.3: Akses Langsung
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/sukses-daftar` langsung (tanpa submit) | Redirect ke `/daftar` atau tampil pesan kosong | ☐ |

---

## T5.6 — Responsive

### TC-5.6.1: Responsive Layout
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka `/daftar` di mobile (375px) | Form full-width, tab stack vertical | ☐ |
| 2 | Buka `/daftar` di tablet (768px) | Form dengan padding sesuai | ☐ |
| 3 | Buka `/daftar` di desktop (1280px) | Form centered, max-width terbatas | ☐ |
| 4 | Buka `/sukses-daftar` di mobile | Card dan tombol responsive | ☐ |

---

## T5.7 — Nomor Referensi

### TC-5.7.1: Generate Ref Code
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Submit pertama kali | Ref code = YWT-YYYYMMDD-00001 | ☐ |
| 2 | Submit kedua kali | Ref code = YWT-YYYYMMDD-00002 (increment) | ☐ |
| 3 | Submit di hari berbeda | Tanggal di ref code berubah sesuai hari | ☐ |

---

> **Total Test Cases Phase 5:** 68
> **Metode:** Manual via browser + database check (tinker)
> **Prioritas tinggi:** Form submit, validasi, ref code, redirect, honeypot
> **Prioritas sedang:** Upload foto, loading state, tab switch
> **Prioritas rendah:** Responsive, animasi, edge case akses langsung
