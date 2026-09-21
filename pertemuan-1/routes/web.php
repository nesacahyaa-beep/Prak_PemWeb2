<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MahasiswaWebController;

Route::get('/', function () {
    return view('welcome');
});

// Langkah 1: Rute Dasar
Route::get('/salam', function () {
    return 'Selamat datang di Pemrograman Web II';
});

// Langkah 2: Rute dengan Parameter & Parameter Opsional
Route::get('/mahasiswa-test/{nim}', function (string $nim) {
    return 'Data mahasiswa dengan NIM ' . $nim;
});

Route::get('/matakuliah/{kode?}', function (?string $kode = null) {
    if ($kode === null) {
        return 'Menampilkan seluruh matakuliah';
    }
    return 'Menampilkan matakuliah kode ' . $kode;
});

// Langkah 3: Membatasi Format Parameter (Hanya Angka)
Route::get('/semester/{angka}', function (int $angka) {
    return 'Semester ke-' . $angka;
})->whereNumber('angka');

// Langkah 6: Menghubungkan Rute ke Controller
Route::get('/data-mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/cari-mahasiswa', [MahasiswaController::class, 'cari']);
Route::get('/data-matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');
Route::get('/data-matakuliah/{kode}', [MatakuliahController::class, 'show'])->name('matakuliah.show');

// Langkah Modul: Mahasiswa Web Controller
Route::get('/mahasiswa-data', [MahasiswaWebController::class, 'index'])->name('mahasiswa.data');
Route::get('/mahasiswa/top-tk', [MahasiswaWebController::class, 'topTk'])->name('mahasiswa.top-tk');

// Rute Detail Mahasiswa (Mengarahkan ke MahasiswaWebController)
Route::get('/mahasiswa/{id}', [MahasiswaWebController::class, 'show'])->name('mahasiswa.show');
Route::get('/data-mahasiswa/{id}', [MahasiswaWebController::class, 'show']);