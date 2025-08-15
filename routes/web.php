<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContentController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('admin/Dashboard');
    })->name('admin.dashboard');

    // Tambahkan rute admin lainnya di sini
});
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'verified', 'admin'],
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // KODE BARU: Tambahkan dua route di bawah ini
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/content', [ContentController::class, 'index'])->name('content.index');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
