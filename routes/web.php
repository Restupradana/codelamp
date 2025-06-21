<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KursusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', function () {
    return view('homepage');
});

// Login siswa
Route::get('/loginSiswa', function () {
    return view('loginSiswa');
})->name('loginSiswa');

// Dashboard untuk instruktur
Route::get('/dashboard', function () {
    return view('instruktur.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Dashboard siswa khusus
Route::get('/dashboardSiswa', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboardSiswa');

// Group route untuk siswa
Route::prefix('Siswa')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboardSiswa');
    });

    Route::get('/kursus', function () {
        return view('Siswa.tampilan_kursus');
    });

    Route::get('/profil', function () {
        return view('Siswa.profil');
    });

    Route::get('/sandi', function () {
        return view('Siswa.ganti_sandi');
    });

    Route::get('/dibeli', function () {
        return view('Siswa.kursus_dibeli');
    });

    Route::get('/detail_kursus', function () {
        return view('Siswa.detail_Kursus');
    });

    Route::get('/pembayaran', function () {
        return view('Siswa.pembayaran');
    });
});

// Frontend halaman Instruktur
Route::get('/instruktur_profil', function () {
    return view('instruktur.profil');
})->name('instruktur.profil');

Route::get('/instruktur_kursus', [KursusController::class, 'index'])->name('instruktur.kursus');
Route::get('/instruktur/kursus/tambah', [KursusController::class, 'create'])->name('instruktur.kursus.tambah');
Route::post('/instruktur/kursus', [KursusController::class, 'store'])->name('instruktur.kursus.store');
Route::get('/instruktur/kursus/edit/{id}', [KursusController::class, 'edit'])->name('instruktur.kursus.edit');
Route::put('/instruktur/kursus/update/{id}', [KursusController::class, 'update'])->name('instruktur.kursus.update');
Route::delete('/instruktur/kursus/delete/{id}', [KursusController::class, 'destroy'])->name('instruktur.kursus.destroy');
Route::get('/instruktur/kursus/{id}', [KursusController::class, 'show'])->name('instruktur.kursus.show');

Route::get('/instruktur_pembayaran', function () {
    return view('instruktur.pembayaran');
})->name('instruktur.pembayaran');

Route::get('/instruktur_pesan', function () {
    return view('instruktur.pesan');
})->name('instruktur.pesan');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
