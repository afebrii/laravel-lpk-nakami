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
use App\Http\Controllers\Front\LowonganController;
use App\Http\Controllers\Front\JepangInfoController;
use App\Http\Controllers\Front\JlptController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Program Pelatihan
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/{slug}', [ProgramController::class, 'show'])->name('program.show');

// Lowongan
Route::get('/lowongan', [LowonganController::class, 'index'])->name('lowongan.index');
Route::get('/lowongan/{slug}', [LowonganController::class, 'show'])->name('lowongan.show');

// Info Jepang & JLPT
Route::get('/jepang-info', [JepangInfoController::class, 'index'])->name('jepang-info.index');
Route::get('/jlpt', [JlptController::class, 'index'])->name('jlpt.index');

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
