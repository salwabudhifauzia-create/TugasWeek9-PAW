<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Tambahkan 3 baris ini agar tombol Profile & Log Out di dashboard berfungsi
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/lihat-materi', fn () => 'Halaman Lihat Materi (Semua Role)');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', fn () => 'Halaman Dashboard Admin');
    Route::get('/manajemen-pengguna', fn () => 'Halaman Kelola Pengguna (Khusus Admin)');
});

Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen', fn () => 'Dashboard Dosen');
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa', fn () => 'Dashboard Mahasiswa');
    Route::get('/nilai-pribadi', fn () => 'Halaman Nilai Pribadi Mahasiswa');
});

Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('/kelola-materi', fn () => 'Halaman Kelola Materi (Admin & Dosen)');
    Route::get('/kelola-nilai', fn () => 'Halaman Kelola Nilai (Admin & Dosen)');
});

require __DIR__.'/auth.php';