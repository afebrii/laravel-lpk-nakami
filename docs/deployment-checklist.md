# Checklist Deployment — LKP/LPK Yuwita

Panduan langkah-langkah deploy project ke server production.

---

## 1. Persiapan Server

### Minimum Requirements
- PHP 8.2+ dengan ekstensi: `mbstring`, `xml`, `bcmath`, `curl`, `gd`, `zip`, `pdo_mysql`
- MySQL 8.0+
- Composer 2.x
- Node.js 18+ & npm (untuk build asset)
- Nginx atau Apache
- SSL certificate (Let's Encrypt / Cloudflare)

### Install Dependency Server (Ubuntu/Debian)
```bash
sudo apt update
sudo apt install php8.2 php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-bcmath php8.2-curl php8.2-gd php8.2-zip unzip nginx mysql-server
```

---

## 2. Upload Project

### Opsi A: Via Git (Direkomendasikan)
```bash
cd /var/www
git clone https://github.com/username/laravel-lkp-yuwita.git
cd laravel-lkp-yuwita
```

### Opsi B: Via Manual Upload
Upload semua file project ke `/var/www/laravel-lkp-yuwita` via FTP/SCP.

---

## 3. Install Dependencies

```bash
composer install --optimize-autoloader --no-dev
npm install
npm run build
```

---

## 4. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env`:
```env
APP_NAME="LKP/LPK Yuwita"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lkp_yuwita
DB_USERNAME=user_production
DB_PASSWORD=password_yang_kuat

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=email@gmail.com
MAIL_PASSWORD=app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=info@domain-anda.com
MAIL_FROM_NAME="LKP Yuwita"
```

---

## 5. Setup Database

```bash
# Buat database
mysql -u root -p -e "CREATE DATABASE lkp_yuwita CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Jalankan migration & seeder
php artisan migrate --force
php artisan db:seed --force
```

---

## 6. Storage & Permissions

```bash
# Buat symlink storage
php artisan storage:link

# Set permission
sudo chown -R www-data:www-data /var/www/laravel-lkp-yuwita
sudo chmod -R 755 /var/www/laravel-lkp-yuwita
sudo chmod -R 775 storage bootstrap/cache
```

---

## 7. Optimasi Production

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

> **Penting:** Setiap kali mengubah `.env` atau route, jalankan ulang perintah di atas.

---

## 8. Konfigurasi Nginx

Buat file `/etc/nginx/sites-available/lkp-yuwita`:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name domain-anda.com www.domain-anda.com;
    root /var/www/laravel-lkp-yuwita/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    # Gzip compression
    gzip on;
    gzip_comp_level 5;
    gzip_types text/plain text/css application/json application/javascript text/xml application/xml text/javascript image/svg+xml;

    # Cache static assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|woff2|svg)$ {
        expires 30d;
        add_header Cache-Control "public, immutable";
    }
}
```

Aktifkan site:
```bash
sudo ln -s /etc/nginx/sites-available/lkp-yuwita /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

---

## 9. SSL (Let's Encrypt)

```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d domain-anda.com -d www.domain-anda.com
```

---

## 10. Buat Akun Admin Klien

```bash
php artisan tinker
```

```php
use App\Models\User;
User::create([
    'name' => 'Nama Klien',
    'email' => 'email@klien.com',
    'password' => bcrypt('password_sementara'),
    'role' => 'superadmin',
    'is_active' => true,
]);
```

---

## 11. Final Checklist ✅

- [ ] Website bisa diakses via domain
- [ ] SSL aktif (HTTPS)
- [ ] Halaman publik tampil dengan benar
- [ ] Form pendaftaran berhasil submit
- [ ] Form kontak berhasil submit
- [ ] Admin login berhasil
- [ ] Semua CRUD admin berfungsi
- [ ] Upload gambar berfungsi
- [ ] WhatsApp button berfungsi
- [ ] Email notifikasi terkirim (jika aktif)
- [ ] Responsif di mobile

---

## Troubleshooting

| Masalah | Solusi |
|---|---|
| 500 Error | Cek `storage/logs/laravel.log`, pastikan permission benar |
| Gambar tidak muncul | Jalankan `php artisan storage:link` |
| CSS/JS tidak load | Jalankan `npm run build` ulang |
| Route tidak ditemukan | Jalankan `php artisan route:cache` |
| Perubahan .env tidak berlaku | Jalankan `php artisan config:cache` |
