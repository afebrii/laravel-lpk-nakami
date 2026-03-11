# LKP/LPK Yuwita - Lembaga Kursus & Pelatihan Kecantikan

A modern, responsive web application for LKP/LPK Yuwita, a trusted beauty training and course institution in Tasikmalaya since 2006.

## 🚀 Features (Phase 1 & 2 Completed)

- **Modern Tech Stack:** Built with Laravel 12, Tailwind CSS v4, and Alpine.js v3.
- **Beautiful UI:** Elegant design using a custom Rose Gold, Dusty Pink, and Charcoal color palette.
- **Responsive Layout:** fully optimized for mobile, tablet, and desktop viewing.
- **Dynamic Content:** Database-driven content for programs, services, galleries, testimonials, FAQs, and blog posts.
- **Interactive Elements:**
  - Sticky scroll-aware navigation bar
  - Smooth Alpine.js transitions and modal dropdowns
  - Scroll-triggered statistics counter animations
  - Floating WhatsApp floating button
  - Reusable toast notifications and breadcrumbs

## 🛠️ Requirements

- PHP 8.2 or higher
- Composer
- Node.js & npm
- MySQL 8.0 or higher

## 📦 Installation & Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/afebrii/laravel-lkp-yuwita.git
   cd laravel-lkp-yuwita
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Install NPM Dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   Copy the example env file and generate the application key.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Configure your database credentials in the `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=lkp-yuwita-db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Database Migration & Seeding**
   Run the migrations and seed the database with initial dummy data and settings.
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Create Storage Symlink**
   Required for displaying uploaded images (galleries, thumbnails, etc).
   ```bash
   php artisan storage:link
   ```

7. **Compile Assets & Run Server**
   Run the Vite development server to compile Tailwind CSS and JS assets, then start the Laravel development server.
   ```bash
   # Terminal 1
   npm run build
   
   # Terminal 2
   php artisan serve
   ```

8. **Access the application**
   Visit `http://localhost:8000` in your browser.

## 🧪 Testing

We have prepared manual testing scenarios in the `docs` directory:
- `docs/testing_phase0.md` - For Project Setup & Foundation
- `docs/testing_phase1.md` - For Global Layout & Homepage

## 📄 License

Proprietary License. All rights reserved by LKP/LPK Yuwita.
