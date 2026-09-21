<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
   private $daftarMatakuliah = [
    ['kode' => 'WEB2', 'nama' => 'Pemrograman Web II', 'sks' => 3, 'semester' => 4],
    ['kode' => 'BD2', 'nama' => 'Basis Data II', 'sks' => 3, 'semester' => 4],
    ['kode' => 'MSO', 'nama' => 'Manajemen Sistem Operasi', 'sks' => 2, 'semester' => 2],
    ['kode' => 'JARKOM', 'nama' => 'Jaringan Komputer', 'sks' => 3, 'semester' => 4],
    ['kode' => 'ALGO', 'nama' => 'Algoritma Pemrograman', 'sks' => 3, 'semester' => 1],
];

    public function index(Request $request)
    {
        $q = $request->query('q', '');
        $matakuliah = $this->daftarMatakuliah;

        if (!empty($q)) {
            $matakuliah = array_filter($matakuliah, function ($mk) use ($q) {
                return stripos($mk['nama'], $q) !== false || stripos($mk['kode'], $q) !== false;
            });
        }

        return view('matakuliah.index', [
            'daftarMatakuliah' => $matakuliah,
            'katakunci' => $q
        ]);
    }

    public function show(string $kode)
    {
        return view('matakuliah.show', ['kode' => $kode]);
    }
}