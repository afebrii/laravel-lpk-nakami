# 🧪 Skenario Testing — Phase 0 (Project Setup & Foundation)

> **Cakupan:** Environment config, Tailwind CSS, Alpine.js, Database, Models, Seeders, Helper, Routes
> **Tanggal:** 11 Maret 2026

---

## T0.1 — Environment & Config

### TC-0.1.1: Verifikasi `.env`
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Buka file `.env` | File ada dan bisa dibaca | ☐ |
| 2 | Cek `APP_NAME` | Bernilai `"LKP Yuwita"` | ☐ |
| 3 | Cek `APP_LOCALE` | Bernilai `id` | ☐ |
| 4 | Cek `APP_FALLBACK_LOCALE` | Bernilai `id` | ☐ |
| 5 | Cek `APP_FAKER_LOCALE` | Bernilai `id_ID` | ☐ |
| 6 | Cek `DB_DATABASE` | Bernilai `lkp-yuwita-db` | ☐ |
| 7 | Cek `DB_CONNECTION` | Bernilai `mysql` | ☐ |

### TC-0.1.2: Verifikasi Config
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Jalankan `php artisan tinker` → `config('app.timezone')` | Output: `Asia/Jakarta` | ☐ |
| 2 | Cek `config('roles.superadmin')` | Output: `superadmin` | ☐ |
| 3 | Cek `config('roles.staff')` | Output: `staff` | ☐ |
| 4 | Cek `config('roles.available')` | Output: `['superadmin', 'staff']` | ☐ |

---

## T0.2 — Frontend Setup

### TC-0.2.1: Tailwind CSS v4
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Jalankan `npm run build` | Build berhasil tanpa error | ☐ |
| 2 | Cek file `resources/css/app.css` | Berisi `@import 'tailwindcss'` | ☐ |
| 3 | Cek `@theme` section | Berisi variabel `--color-rose-gold: #B76E79` | ☐ |
| 4 | Cek `@theme` section | Berisi `--color-dusty-pink: #E8B4BC` | ☐ |
| 5 | Cek `@theme` section | Berisi `--color-soft-cream: #FDF6F0` | ☐ |
| 6 | Cek `@theme` section | Berisi `--color-charcoal: #2D2D2D` | ☐ |
| 7 | Cek `@theme` section | Berisi `--font-heading` (Playfair Display) | ☐ |
| 8 | Cek `@theme` section | Berisi `--font-body` (DM Sans) | ☐ |
| 9 | Cek `@theme` section | Berisi `--font-accent` (Italiana) | ☐ |
| 10 | Cek import Google Fonts | URL fonts.googleapis.com ada di CSS | ☐ |

### TC-0.2.2: Alpine.js
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Cek `package.json` | `alpinejs` ada di dependencies | ☐ |
| 2 | Cek `package.json` | `@alpinejs/intersect` ada di dependencies | ☐ |
| 3 | Cek `resources/js/app.js` | Import `Alpine` dan `intersect` plugin | ☐ |
| 4 | Cek `resources/js/app.js` | `Alpine.start()` dipanggil | ☐ |
| 5 | Buka browser → console | Tidak ada error Alpine.js | ☐ |

---

## T0.3 — Database Migrations

### TC-0.3.1: Jalankan Migrasi
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Jalankan `php artisan migrate:fresh` | Semua migration berhasil, tidak ada error | ☐ |
| 2 | Jalankan `php artisan migrate:status` | 13 migration files terdaftar (3 default + 10 custom) | ☐ |

### TC-0.3.2: Verifikasi Struktur Tabel
| # | Tabel | Kolom Penting yang Dicek | Status |
|---|---|---|---|
| 1 | `users` | `role` (enum: superadmin/staff), `avatar`, `is_active`, `last_login_at` | ☐ |
| 2 | `program_categories` | `name`, `slug` (unique), `type` (enum: reguler/khusus) | ☐ |
| 3 | `programs` | `category_id` (FK), `slug` (unique), `price`, `is_free`, `status` (enum) | ☐ |
| 4 | `registrations` | `ref_code` (unique), `type` (enum), `program_id` (nullable FK), `status` (enum) | ☐ |
| 5 | `gallery` | `title`, `image`, `category`, `order`, `is_active` | ☐ |
| 6 | `posts` | `user_id` (FK), `slug` (unique), `is_published`, `published_at` | ☐ |
| 7 | `testimonials` | `type` (enum), `program_id` (nullable FK), `rating`, `is_active` | ☐ |
| 8 | `faqs` | `question`, `answer`, `category`, `order`, `is_active` | ☐ |
| 9 | `service_categories` | `name`, `slug` (unique), `icon`, `order` | ☐ |
| 10 | `services` | `category_id` (FK), `price_start`, `price_end` (nullable), `is_active` | ☐ |
| 11 | `settings` | `key` (unique), `value`, `type` (enum), `group` | ☐ |

### TC-0.3.3: Verifikasi Foreign Keys
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Hapus `program_category` yang punya program | Cascade delete: program ikut terhapus | ☐ |
| 2 | Hapus `program` yang punya registration | Registration `program_id` → NULL | ☐ |
| 3 | Hapus `user` yang punya post | Cascade delete: post ikut terhapus | ☐ |
| 4 | Hapus `service_category` yang punya service | Cascade delete: service ikut terhapus | ☐ |

---

## T0.4 — Eloquent Models

### TC-0.4.1: Model User
| # | Langkah (Tinker) | Expected Result | Status |
|---|---|---|---|
| 1 | `User::first()->isSuperadmin()` | `true` (akun admin pertama) | ☐ |
| 2 | `User::first()->isStaff()` | `false` | ☐ |
| 3 | `User::where('role','staff')->first()->isStaff()` | `true` | ☐ |
| 4 | `User::first()->posts` | Return Collection (kosong) | ☐ |

### TC-0.4.2: Model Program & ProgramCategory
| # | Langkah (Tinker) | Expected Result | Status |
|---|---|---|---|
| 1 | `Program::count()` | `8` | ☐ |
| 2 | `Program::active()->count()` | `8` (semua aktif) | ☐ |
| 3 | `Program::ordered()->first()->order` | `1` | ☐ |
| 4 | `Program::first()->category` | Return ProgramCategory model | ☐ |
| 5 | `ProgramCategory::first()->programs->count()` | `4` (reguler punya 4) | ☐ |

### TC-0.4.3: Model Registration
| # | Langkah (Tinker) | Expected Result | Status |
|---|---|---|---|
| 1 | `Registration::generateRefCode()` | Format `YWT-YYYYMMDD-00001` | ☐ |
| 2 | Buat 2 registration di hari sama | Ref code increment: `00001`, `00002` | ☐ |

### TC-0.4.4: Model Service & ServiceCategory
| # | Langkah (Tinker) | Expected Result | Status |
|---|---|---|---|
| 1 | `ServiceCategory::count()` | `2` (Rambut, Wajah & Tubuh) | ☐ |
| 2 | `Service::count()` | `16` | ☐ |
| 3 | `Service::first()->formatted_price` | Format `Rp XX.XXX` | ☐ |
| 4 | `Service::first()->category` | Return ServiceCategory model | ☐ |

### TC-0.4.5: Model Setting
| # | Langkah (Tinker) | Expected Result | Status |
|---|---|---|---|
| 1 | `Setting::getValue('site_name')` | `LKP/LPK Yuwita` | ☐ |
| 2 | `Setting::getValue('nonexistent', 'default')` | `default` | ☐ |
| 3 | `setting('contact_email')` (helper) | `lpkyuwita1@gmail.com` | ☐ |
| 4 | `setting('nonexistent', 'fallback')` | `fallback` | ☐ |

---

## T0.5 — Seeders

### TC-0.5.1: Jalankan Seeder
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | `php artisan migrate:fresh --seed` | Semua seeder berhasil tanpa error | ☐ |

### TC-0.5.2: Verifikasi Data Seed
| # | Tabel | Expected Count | Verifikasi Data | Status |
|---|---|---|---|---|
| 1 | `users` | 2 | Superadmin: `admin@lkp-yuwita.com`, Staff: `staff@lkp-yuwita.com` | ☐ |
| 2 | `program_categories` | 2 | `Kelas Reguler` (reguler), `Kelas Khusus` (khusus) | ☐ |
| 3 | `programs` | 8 | 4 reguler (MUA, Rambut, Kulit, Hand Bouquet) + 4 khusus (MUA, Rias Pengantin, Rambut, Kulit) | ☐ |
| 4 | `service_categories` | 2 | `Rambut`, `Wajah & Tubuh` | ☐ |
| 5 | `services` | 16 | 8 layanan rambut + 8 layanan wajah & tubuh | ☐ |
| 6 | `settings` | 26 | Group: identitas (5), kontak (5), sosial (4), seo (4), beranda (8) | ☐ |
| 7 | `faqs` | 11 | Kategori: Pendaftaran, Sertifikasi, Biaya, Program, Layanan Salon | ☐ |

### TC-0.5.3: Verifikasi Password Hashing
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | `User::first()->password` | Bukan plain text, sudah di-hash (bcrypt) | ☐ |
| 2 | `Hash::check('password', User::first()->password)` | `true` | ☐ |

---

## T0.6 — Helper & Routes

### TC-0.6.1: SettingHelper
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Panggil `setting('site_name')` dari tinker | Return `LKP/LPK Yuwita` | ☐ |
| 2 | Panggil `setting('contact_wa_admin')` | Return `6285223506611` | ☐ |
| 3 | Panggil `setting('key_tidak_ada')` | Return `null` | ☐ |
| 4 | Panggil `setting('key_tidak_ada', 'default')` | Return `default` | ☐ |

### TC-0.6.2: Routes
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Akses `http://localhost:8000/` | Halaman Beranda tampil (200 OK) | ☐ |
| 2 | Akses `http://localhost:8000/admin` | Halaman admin placeholder tampil (200 OK) | ☐ |
| 3 | Jalankan `php artisan route:list` | Route `/` dan `/admin` terdaftar | ☐ |

### TC-0.6.3: Storage Link
| # | Langkah | Expected Result | Status |
|---|---|---|---|
| 1 | Cek folder `public/storage` | Symlink exists, mengarah ke `storage/app/public` | ☐ |

---

> **Total Test Cases:** 60+
> **Metode:** Manual via `php artisan tinker`, browser, dan terminal
