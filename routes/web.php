<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\Auth\SiswaAuthController;
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Halaman Utama
Route::get('/', fn() => view('homepage'))->name('homepage');

// 👨‍🎓 Autentikasi Siswa
Route::get('/login-siswa', [SiswaAuthController::class, 'showLoginForm'])->name('siswa.login');
Route::post('/login-siswa', [SiswaAuthController::class, 'login'])->name('siswa.login.submit');
Route::post('/logout-siswa', [SiswaAuthController::class, 'logout'])->name('siswa.logout');
Route::get('/siswa/register', [SiswaAuthController::class, 'showRegisterForm'])->name('siswa.register');
Route::post('/siswa/register', [SiswaAuthController::class, 'register'])->name('siswa.register.submit');

// 🧑‍🏫 Autentikasi Instruktur
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('instruktur.dashboard'))->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 📚 Fitur Siswa (auth:siswa)
Route::prefix('siswa')->middleware('auth:siswa')->group(function () {
    
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');


    // TAMPILKAN SEMUA KURSUS
    Route::get('/kursus', [SiswaController::class, 'listKursus'])->name('siswa.kursus');

    // TAMPILKAN DETAIL KURSUS BERDASARKAN ID
    Route::get('/kursus/{id}', [SiswaController::class, 'tampilkanKursus'])->name('siswa.kursus.detail');

    // PROSES BELI KURSUS
    Route::post('/kursus/{id}/beli', [SiswaController::class, 'beliKursus'])->name('siswa.kursus.beli');

    // PROFIL
    Route::get('/profil', [SiswaController::class, 'edit'])->name('siswa.profil');
    Route::put('/profil', [SiswaController::class, 'update'])->name('siswa.profil.update');

    Route::get('/ganti-sandi', fn() => view('Siswa.ganti_sandi'))->name('siswa.ganti_sandi');
    Route::get('/dibeli', [SiswaController::class, 'kursusDibeli'])->name('siswa.kursus_dibeli');
    Route::get('/pembayaran', fn() => view('Siswa.pembayaran'))->name('siswa.pembayaran');
});

// 🧑‍🏫 Fitur Instruktur
Route::prefix('instruktur')->middleware(['auth'])->group(function () {
    Route::get('/profil', fn() => view('instruktur.profil'))->name('instruktur.profil');

    Route::get('/kursus', [KursusController::class, 'index'])->name('instruktur.kursus');
    Route::get('/kursus/tambah', [KursusController::class, 'create'])->name('instruktur.kursus.tambah');
    Route::post('/kursus', [KursusController::class, 'store'])->name('instruktur.kursus.store');
    Route::get('/kursus/edit/{id}', [KursusController::class, 'edit'])->name('instruktur.kursus.edit');
    Route::put('/kursus/update/{id}', [KursusController::class, 'update'])->name('instruktur.kursus.update');
    Route::delete('/kursus/delete/{id}', [KursusController::class, 'destroy'])->name('instruktur.kursus.destroy');
    Route::get('/kursus/{id}', [KursusController::class, 'show'])->name('instruktur.kursus.show');

    Route::get('/pembayaran', fn() => view('instruktur.pembayaran'))->name('instruktur.pembayaran');
    Route::get('/pesan', fn() => view('instruktur.pesan'))->name('instruktur.pesan');
});

// 🛡️ Auth Laravel
require __DIR__.'/auth.php';
