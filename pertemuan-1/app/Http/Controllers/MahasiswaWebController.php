<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MahasiswaWebController extends Controller
{
    /**
     * Menampilkan daftar mahasiswa menggunakan Eager Loading (with)
     * dan memantau kueri SQL menggunakan DB::listen.
     */
    public function index()
    {
        // Mendengarkan dan mencatat setiap kueri SQL yang dieksekusi ke storage/logs/laravel.log
        DB::listen(function ($query) {
            Log::info("Kueri SQL: " . $query->sql . " | Waktu: " . $query->time . "ms");
        });

        // Menggunakan Eager Loading 'with()' untuk mengambil relasi 'programStudi'
        // Mencegah N+1 Query Problem sehingga kueri SQL hanya berjalan 2 kali
        $daftarMahasiswa = Mahasiswa::with('programStudi')->paginate(10);

        return view('mahasiswa.index', compact('daftarMahasiswa'));
    }

    /**
     * Menampilkan detail data mahasiswa beserta relasi matakuliah dan nilai pivot.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with(['programStudi', 'matakuliah'])->findOrFail($id);

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Menampilkan Top 10 IPK Mahasiswa Program Studi Teknik Komputer.
     */
    public function topTk()
    {
        $daftarMahasiswa = Mahasiswa::with('programStudi')
            ->whereHas('programStudi', function ($query) {
                $query->where('nama', 'Teknik Komputer');
            })
            ->orderBy('ipk', 'desc')
            ->take(10)
            ->get();

        return view('mahasiswa.index', compact('daftarMahasiswa'));
    }
}