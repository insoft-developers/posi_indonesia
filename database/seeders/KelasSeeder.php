<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            "nama_kelas" => "Kelas 1 SD (Sederajat) "
        ]);
        Kelas::create([
            "nama_kelas" => "Kelas 2 SD (Sederajat)"
        ]);
        Kelas::create([
            "nama_kelas" => "Kelas 3 SD (Sederajat)"
        ]);
        Kelas::create([
            "nama_kelas" => "Kelas 4 SD (Sederajat)"
        ]);
        Kelas::create([
            "nama_kelas" => "Kelas 5 SD (Sederajat)"
        ]);
        Kelas::create([
            "nama_kelas" => "Kelas 6 SD (Sederajat)"
        ]);

        Kelas::create([
            "nama_kelas" => "Kelas 7 SMP (Sederajat)"
        ]);
        Kelas::create([
            "nama_kelas" => "Kelas 8 SMP (Sederajat)"
        ]);
        Kelas::create([
            "nama_kelas" => "Kelas 9 SMP (Sederajat)"
        ]);

        Kelas::create([
            "nama_kelas" => "Kelas 10 SMA (Sederajat)"
        ]);
        Kelas::create([
            "nama_kelas" => "Kelas 11 SMA (Sederajat)"
        ]);
        Kelas::create([
            "nama_kelas" => "Kelas 12 SMA (Sederajat)"
        ]);
        Kelas::create([
            "nama_kelas" => "Mahasiswa"
        ]);
        Kelas::create([
            "nama_kelas" => "Guru SD"
        ]);
        Kelas::create([
            "nama_kelas" => "Guru SMP"
        ]);
        Kelas::create([
            "nama_kelas" => "Guru SMA"
        ]);
    }
}
