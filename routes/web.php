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

Route::get('/loginMurid', function () {
    return view('loginMurid');
})->name('loginMurid');;

Route::get('/', function () {
    return view('homepage');
});

//Masi Frontend kalau mau ganti halaman dashboard ubah di bagian view sesuai nama file yang mau dibuka
Route::get('/dashboard', function () { 
    return view('instruktur.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Frontend Halaman Instuktur
Route::get('/instruktur_profil', function () {
    return view('instruktur.profil');
})->name('instruktur.profil');

Route::get('/instruktur_kursus', function () {
    return view('instruktur.kursus');
})->name('instruktur.kursus');

Route::get('/instruktur_pembayaran', function () {
    return view('instruktur.pembayaran');
})->name('instruktur.pembayaran');

Route::get('/instruktur_pesan', function () {
    return view('instruktur.pesan');
})->name('instruktur.pesan');

require __DIR__.'/auth.php';
