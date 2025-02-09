<?php

namespace Database\Seeders;

use App\Models\Pembahasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembahasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($n = 1; $n < 31; $n++) {
            Pembahasan::create([
                'ujian_id' => $n,
                'pembahasan' => "<p>Olimpiade Sais (OSN) adalah kompetisi akademik tingkat nasional yang diadakan untuk menguji kemampuan siswa dalam bidang sains, seperti biologi, fisika, kimia, dan matematika. Berikut adalah deskripsi tentang Olimpiade Sains:</p>

<p>Tujuan 1. Meningkatkan kemampuan siswa dalam bidang sains. 2. Mengembangkan kemampuan berpikir kritis dan analitis. 3. Mencari dan mengembangkan bakat-bakat sains di kalangan siswa.</p>

<p>Jenis Kompetisi 1. Olimpiade Sains Nasional (OSN) tingkat SD, SMP, dan SMA. 2. Olimpiade Sains Internasional (OSI) yang diikuti oleh negara-negara dari seluruh dunia.</p>

<p>Mata Pelajaran 1. Biologi 2. Fisika 3. Kimia 4. Matematika</p>

<p>Bentuk Kompetisi 1. Tes tertulis. 2. Tes praktikum. 3. Presentasi.</p>

<p>Tahapan Kompetisi 1. Seleksi tingkat sekolah. 2. Seleksi tingkat kabupaten/kota. 3. Seleksi tingkat provinsi. 4. Seleksi tingkat nasional. 5. Seleksi tingkat internasional.</p>

<p>Hadiah 1. Medali emas, perak, dan perunggu. 2. Piagam penghargaan. 3. Beasiswa. 4. Kesempatan untuk mewakili Indonesia dalam Olimpiade Sains Internasional.</p>

<p>Manfaat 1. Meningkatkan kemampuan dan pengetahuan siswa dalam bidang sains. 2. Mengembangkan kemampuan berpikir kritis dan analitis. 3. Mencari dan mengembangkan bakat-bakat sains di kalangan siswa. 4. Meningkatkan prestasi siswa dalam bidang sains.</p>",
            ]);
        }
    }
}
