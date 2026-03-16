<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\GalleryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\ProgramController;
use App\Http\Controllers\Front\RegistrationController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Program Pelatihan
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/{slug}', [ProgramController::class, 'show'])->name('program.show');

// Layanan Salon
Route::get('/layanan', [ServiceController::class, 'index'])->name('layanan.index');

// Galeri
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');

// Tentang Kami
Route::get('/tentang', [AboutController::class, 'index'])->name('tentang.index');

// FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// Testimoni
Route::get('/testimoni', [TestimonialController::class, 'index'])->name('testimoni.index');

// Pendaftaran
Route::get('/daftar', [RegistrationController::class, 'index'])->name('daftar');
Route::post('/daftar', [RegistrationController::class, 'store'])->name('daftar.store')->middleware('throttle:5,1');
Route::get('/sukses-daftar', [RegistrationController::class, 'success'])->name('sukses-daftar');

// Blog
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');

// Kontak
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store')->middleware('throttle:5,1');

// Halaman Statis
Route::get('/kebijakan-privasi', fn () => view('pages.kebijakan-privasi.index'))->name('kebijakan-privasi');

// Include admin routes
require __DIR__ . '/admin.php';

// Bypass Hostinger Image Optimizer for About Image
Route::get('/about-image-data', function () {
    $path = public_path('img/yuwita-profile.jpg');
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path, [
        'Content-Type' => 'image/jpeg',
        'Cache-Control' => 'no-cache, no-store, must-revalidate',
    ]);
});

// Fix Storage Link for Hosting
Route::get('/fix-storage', function () {
    try {
        if (file_exists(public_path('storage'))) {
            // Check if it's a directory but not a link (common upload error)
            if (is_dir(public_path('storage')) && !is_link(public_path('storage'))) {
                // We can't easily delete a directory with files in it here,
                // but we can warn the user.
                return "The 'public/storage' exists as a real folder. Please delete it via File Manager first so a symlink can be created.";
            }
            if (is_link(public_path('storage'))) {
                return "Storage symlink already exists.";
            }
        }
        
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        return "Storage link created successfully! Check your images now.";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});
