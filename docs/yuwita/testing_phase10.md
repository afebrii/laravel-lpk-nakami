# Skenario Testing — Phase 10: SEO, Optimasi & Testing

---

## 10.1 SEO

### TC-10.1.1 Meta Tags per Halaman
| # | Halaman | Expected Result |
|---|---------|----------------|
| 1 | Beranda (`/`) | Title: sesuai `seo_meta_title` di Settings |
| 2 | Program (`/program`) | Title: "Program Pelatihan — LKP Yuwita" |
| 3 | Detail Program (`/program/{slug}`) | Title: nama program atau meta_title program |
| 4 | Blog (`/blog`) | Title: "Blog — LKP Yuwita" |
| 5 | Detail Blog (`/blog/{slug}`) | Title: judul artikel atau meta_title |
| 6 | Layanan (`/layanan`) | Title: "Layanan Salon — LKP Yuwita" |
| 7 | Galeri (`/galeri`) | Title: "Galeri — LKP Yuwita" |
| 8 | FAQ (`/faq`) | Title: "FAQ — LKP Yuwita" |
| 9 | Testimoni (`/testimoni`) | Title: "Testimoni — LKP Yuwita" |
| 10 | Kontak (`/kontak`) | Title: "Kontak — LKP Yuwita" |
| 11 | Daftar (`/daftar`) | Title: "Pendaftaran — LKP Yuwita" |

**Cara verify:** View Page Source → cek tag `<title>` dan `<meta name="description">`.

### TC-10.1.2 Open Graph Tags
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | View source halaman mana saja | Tag `og:title` ada |
| 2 | | Tag `og:description` ada |
| 3 | | Tag `og:url` = URL halaman saat ini |
| 4 | | Tag `og:type` = "website" |
| 5 | | Tag `og:locale` = "id_ID" |
| 6 | | Tag `og:site_name` = nama lembaga dari Settings |

### TC-10.1.3 Twitter Card
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | View source | `twitter:card` = "summary_large_image" |
| 2 | | `twitter:title` ada |
| 3 | | `twitter:description` ada |

### TC-10.1.4 Canonical URL
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | View source halaman `/program` | `<link rel="canonical" href="http://domain.com/program">` |
| 2 | View source halaman `/blog/contoh-artikel` | Canonical URL sesuai |

### TC-10.1.5 JSON-LD Schema Markup
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | View source halaman mana saja | Ada `<script type="application/ld+json">` |
| 2 | Cek isi JSON-LD | `@type` = "EducationalOrganization" |
| 3 | | `name` sesuai setting `site_name` |
| 4 | | `telephone` sesuai setting `contact_phone` |
| 5 | | `email` sesuai setting `contact_email` |
| 6 | | `address.streetAddress` sesuai setting |
| 7 | | `sameAs` berisi link sosial media |
| 8 | Paste JSON-LD ke [Google Rich Results Test](https://search.google.com/test/rich-results) | Valid tanpa error |

### TC-10.1.6 Google Analytics
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Kosongkan GA ID di Settings, view source | Script GA **tidak** ada |
| 2 | Isi GA ID (misal `G-XXXXXXXXX`), simpan, view source | Script GA muncul dengan ID yang benar |

### TC-10.1.7 Slug SEO-Friendly
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Buat program "Kelas Tata Rias Wajah" | Slug: `kelas-tata-rias-wajah` |
| 2 | Buat artikel "Tips Perawatan Rambut Sehat" | Slug: `tips-perawatan-rambut-sehat` |

---

## 10.2 Keamanan

### TC-10.2.1 Rate Limiting — Form Pendaftaran
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Submit form pendaftaran **5 kali berturut-turut** | 5 kali pertama berhasil |
| 2 | Submit ke-**6** dalam 1 menit yang sama | Error 429 Too Many Requests |
| 3 | Tunggu 1 menit, submit lagi | Berhasil kembali |

### TC-10.2.2 Rate Limiting — Form Kontak
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Submit form kontak **5 kali berturut-turut** | 5 kali pertama berhasil |
| 2 | Submit ke-**6** dalam 1 menit | Error 429 |

### TC-10.2.3 Honeypot — Form Pendaftaran
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Submit form normal (tanpa isi honeypot) | Form berhasil submit |
| 2 | Isi field honeypot secara manual (inspect element) | Ditolak / redirect tanpa simpan |

### TC-10.2.4 CSRF Protection
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Submit form tanpa token CSRF (via Postman/curl) | Error 419 Page Expired |
| 2 | Submit form normal via browser | Berhasil (token otomatis included) |

### TC-10.2.5 File Upload Validation
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Upload gambar JPG < 2MB | Berhasil |
| 2 | Upload gambar PNG < 2MB | Berhasil |
| 3 | Upload file .exe | Error: tipe file tidak valid |
| 4 | Upload gambar > 2MB | Error: ukuran melebihi batas |

### TC-10.2.6 Admin Route Protection
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Akses `/admin/dashboard` tanpa login | Redirect ke `/admin/login` |
| 2 | Akses `/admin/users` sebagai staff | Redirect / 403 |
| 3 | Akses `/admin/settings` sebagai staff | Redirect / 403 |
| 4 | Akses `/admin/users` sebagai superadmin | Halaman tampil |

---

## 10.3 Optimasi Performa

### TC-10.3.1 Lazy Loading Gambar
| # | Halaman | Expected Result |
|---|---------|----------------|
| 1 | Beranda — section program | `<img>` punya `loading="lazy"` |
| 2 | Beranda — section galeri | `loading="lazy"` ada |
| 3 | Beranda — section testimoni foto | `loading="lazy"` ada |
| 4 | Beranda — section blog | `loading="lazy"` ada |
| 5 | Halaman Galeri (`/galeri`) | `loading="lazy"` ada |
| 6 | Halaman Blog index (`/blog`) | `loading="lazy"` ada |
| 7 | Halaman Detail Program | `loading="lazy"` ada |
| 8 | Halaman Detail Blog | `loading="lazy"` ada |
| 9 | Halaman Testimoni | `loading="lazy"` ada |

**Cara verify:** Inspect element pada `<img>` → cek atribut `loading="lazy"`.

### TC-10.3.2 Alt Text pada Gambar
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Inspect semua `<img>` di halaman publik | Setiap `<img>` memiliki atribut `alt` yang tidak kosong |
| 2 | Alt text deskriptif (nama program, judul galeri, dll) | Bukan `alt=""` |

### TC-10.3.3 Cache Query Homepage
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Buka homepage, tambah program baru di admin | Program baru **belum** muncul di homepage (cached) |
| 2 | Tunggu 10 menit atau clear cache `php artisan cache:clear` | Program baru muncul |

### TC-10.3.4 Production Build
| # | Langkah | Expected Result |
|---|---------|----------------|
| 1 | Jalankan `npm run build` | Build berhasil tanpa error |
| 2 | Cek folder `public/build` | File CSS & JS terkompresi ada |

---

## 10.4 Responsivitas

### TC-10.4.1 Mobile (375px)
| # | Halaman | Expected Result |
|---|---------|----------------|
| 1 | Beranda | Layout single column, tombol hamburger tampil |
| 2 | Program | Card grid 1 kolom |
| 3 | Blog | Card grid 1 kolom |
| 4 | Form pendaftaran | Input full-width, form scrollable |
| 5 | Admin panel | Sidebar hidden, toggle button tampil |

### TC-10.4.2 Tablet (768px)
| # | Halaman | Expected Result |
|---|---------|----------------|
| 1 | Beranda | Layout 2 kolom untuk program & layanan |
| 2 | Galeri | Grid 3 kolom |
| 3 | Blog | Grid 2 kolom |

### TC-10.4.3 Desktop (1280px+)
| # | Halaman | Expected Result |
|---|---------|----------------|
| 1 | Beranda | Layout penuh, sidebar visible di admin |
| 2 | Program | Grid 3 kolom |
| 3 | Galeri | Grid 4 kolom |

---

## Tools Rekomendasi

| Tool | Kegunaan |
|---|---|
| [Google Rich Results Test](https://search.google.com/test/rich-results) | Validasi JSON-LD |
| [Facebook Sharing Debugger](https://developers.facebook.com/tools/debug/) | Validasi Open Graph |
| [Twitter Card Validator](https://cards-dev.twitter.com/validator) | Validasi Twitter Card |
| [PageSpeed Insights](https://pagespeed.web.dev) | Cek performa & lazy loading |
| Chrome DevTools → Network | Cek request, caching, file size |
| Chrome DevTools → Device Mode | Responsive testing |
