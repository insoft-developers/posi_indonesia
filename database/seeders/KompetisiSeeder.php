<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KompetisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competition::create([
            "title" => "FSN 2024",
            "date" => "2024-12-08",
            "start_registration_date" => "2024-10-10",
            "finish_registration_date" => "2024-12-07",
            "start_registration_time" => "17:00:00",
            "finish_registration_time" => "23:59:59",
            "type" => "1",
            "price" => "50000",
            "image" => "1.jpg",
            "is_active" => 1,
            "level" => 4
        ]);

        Competition::create([
            "title" => "KSAN 2024",
            "date" => "2024-12-08",
            "start_registration_date" => "2024-10-10",
            "finish_registration_date" => "2024-12-07",
            "start_registration_time" => "17:00:00",
            "finish_registration_time" => "23:59:59",
            "type" => "1",
            "price" => "50000",
            "image" => "2.jpg",
            "is_active" => 1,
            "level" => 4
        ]);

        Competition::create([
            "title" => "KSNP 2024",
            "date" => "2024-12-08",
            "start_registration_date" => "2024-10-10",
            "finish_registration_date" => "2024-12-07",
            "start_registration_time" => "17:00:00",
            "finish_registration_time" => "23:59:59",
            "type" => "1",
            "price" => "50000",
            "image" => "3.jpg",
            "is_active" => 1,
            "level" => 4
        ]);

        Competition::create([
            "title" => "OST-AT 2025",
            "date" => "2024-12-08",
            "start_registration_date" => "2024-10-10",
            "finish_registration_date" => "2024-12-07",
            "start_registration_time" => "17:00:00",
            "finish_registration_time" => "23:59:59",
            "type" => "1",
            "price" => "50000",
            "image" => "4.jpg",
            "is_active" => 1,
            "level" => 4
        ]);

        Competition::create([
            "title" => "PESONA 2025",
            "date" => "2024-12-08",
            "start_registration_date" => "2024-10-10",
            "finish_registration_date" => "2024-12-07",
            "start_registration_time" => "17:00:00",
            "finish_registration_time" => "23:59:59",
            "type" => "1",
            "price" => "50000",
            "image" => "5.jpg",
            "is_active" => 1,
            "level" => 4
        ]);

        Competition::create([
            "title" => "OLIMNAS 2025",
            "date" => "2024-12-08",
            "start_registration_date" => "2024-10-10",
            "finish_registration_date" => "2024-12-07",
            "start_registration_time" => "17:00:00",
            "finish_registration_time" => "23:59:59",
            "type" => "1",
            "price" => "50000",
            "image" => "6.jpg",
            "is_active" => 1,
            "level" => 4
        ]);
    }
}
