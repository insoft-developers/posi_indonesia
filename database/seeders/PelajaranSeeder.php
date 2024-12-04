<?php

namespace Database\Seeders;

use App\Models\Pelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "Kedokteran",
            "Ekonomi",
            "Kimia",
            "Matematika",
            "Biologi",
            "Akuntansi",
            "PKN",
            "Sosiologi",
            "Fisika",
            "Bahasa Inggris",
            "Astronomi",
            "Bahasa Indonesia",
            "Informatika",
            "Geografi",
            "Kebumian",
            "Sejarah",
            "Bahasa Arab"
        ];
        
        foreach($data as $d) {
            Pelajaran::create([
                "name" => $d
            ]);
        }

       
    }
}
