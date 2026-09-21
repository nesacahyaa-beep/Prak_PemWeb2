<?php

namespace Database\Seeders;

use App\Models\Matakuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarMatakuliah = [
            ['kode' => 'WEB2', 'nama' => 'Pemrograman Web II', 'sks' => 3, 'semester' => 4],
            ['kode' => 'BD2', 'nama' => 'Basis Data II', 'sks' => 3, 'semester' => 4],
            ['kode' => 'MSO', 'nama' => 'Manajemen Sistem Operasi', 'sks' => 2, 'semester' => 2],
            ['kode' => 'JARKOM', 'nama' => 'Jaringan Komputer', 'sks' => 3, 'semester' => 4],
            ['kode' => 'ALGO', 'nama' => 'Algoritma Pemrograman', 'sks' => 3, 'semester' => 1],
        ];

        foreach ($daftarMatakuliah as $item) {
            Matakuliah::create($item);
        }
    }
}