<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProgramCategoryController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LowonganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Auth (guest only)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});

// Protected admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.dashboard'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Programs
    Route::resource('programs', ProgramController::class)->except('show');
    Route::resource('program-categories', ProgramCategoryController::class)->except('show');

    // Registrations
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::get('/registrations/{registration}', [RegistrationController::class, 'show'])->name('registrations.show');
    Route::patch('/registrations/{registration}/status', [RegistrationController::class, 'updateStatus'])->name('registrations.update-status');
    Route::delete('/registrations/{registration}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');

    // Gallery
    Route::resource('gallery', GalleryController::class)->except('show');

    // Blog
    Route::resource('posts', PostController::class)->except('show');

    // Testimonials
    Route::resource('testimonials', TestimonialController::class)->except('show');

    // FAQ
    Route::resource('faqs', FaqController::class)->except('show');

    // Services
    Route::resource('services', ServiceController::class)->except('show');
    Route::resource('service-categories', ServiceCategoryController::class)->except('show');

    // Lowongan
    Route::resource('lowongan', LowonganController::class)->except('show');

    // Pesan Kontak
    Route::resource('contacts', App\Http\Controllers\Admin\ContactController::class)->only(['index', 'show', 'destroy']);

    // Superadmin only
    Route::middleware('role:superadmin')->group(function () {
        Route::resource('users', UserController::class)->except('show');
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
