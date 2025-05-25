<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/loginSiswa', function () {
    return view('loginSiswa');
})->name('loginSiswa');;

Route::get('/', function () {
    return view('homepage');
});

Route::prefix('Siswa')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboardSiswa');
    });
    Route::get('/kursus', function () {
        return view('Siswa/tampilan_kursus');
    });
    Route::get('/profil', function () {
        return view('Siswa/profil');
    });
    Route::get('/dibeli', function () {
        return view('Siswa/kursus_dibeli');
    });
    Route::get('/detail_data', function () {
        return view('Siswa/detail_data');
    });
    Route::get('/pembayaran', function () {
        return view('Siswa/pembayaran');
});
});

Route::get('/dashboardSiswa', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboardSiswa');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';