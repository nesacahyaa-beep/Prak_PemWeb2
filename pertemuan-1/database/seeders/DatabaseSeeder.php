<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Jalankan Seeder Prodi & Matakuliah
        $this->call([
            ProgramStudiSeeder::class,
            MatakuliahSeeder::class,
        ]);

        // 2. Generate 30 Data Mahasiswa
        $mahasiswas = Mahasiswa::factory()->count(30)->create();

        // 3. Isi Tabel Pivot (Relasi Mahasiswa & Matakuliah beserta Nilai)
        $matakuliahs = Matakuliah::all();
        $opsiNilai = ['A', 'AB', 'B', 'BC', 'C'];

        foreach ($mahasiswas as $mhs) {
            $randomMk = $matakuliahs->random(rand(2, 3));
            foreach ($randomMk as $mk) {
                $mhs->matakuliah()->attach($mk->id, [
                    'nilai' => $opsiNilai[array_rand($opsiNilai)]
                ]);
            }
        }
    }
}