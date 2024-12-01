<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create([
            "level_name" => 'Siswa - SD/MI' 
        ]);
        Level::create([
            "level_name" => 'Siswa - SMP/MTs' 
        ]);

        Level::create([
            "level_name" => 'Siswa - SMA/MA/SMK' 
        ]);
        Level::create([
            "level_name" => 'Mahasiswa' 
        ]);
        Level::create([
            "level_name" => 'Guru - SD/MI' 
        ]);
        Level::create([
            "level_name" => 'Guru - SMP/MTs' 
        ]);

        Level::create([
            "level_name" => 'Guru - SMA/MA/SMK' 
        ]);
    }
}
