<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Semua route admin panel dengan prefix /admin.
| Dilindungi middleware auth dan admin (akan diaktifkan di Phase 7).
|
*/

// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
// });

// Placeholder — akan diisi di Phase 7
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return 'Admin Panel — Coming Soon';
    })->name('dashboard');
});
