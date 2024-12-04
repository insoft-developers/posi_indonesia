<?php

namespace Database\Seeders;

use App\Models\Study;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 1,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "08:00:00",
            "finish_time" => "09:00:00",
        ]);
        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 2,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "09:00:00",
            "finish_time" => "10:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 3,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "09:00:00",
            "finish_time" => "10:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 4,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "09:00:00",
            "finish_time" => "10:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 5,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "10:00:00",
            "finish_time" => "11:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 6,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "10:00:00",
            "finish_time" => "11:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 7,
            "level_id" => 1,
            "start_date" => "2024-12-08",
            "start_time" => "11:00:00",
            "finish_time" => "12:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 8,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "11:00:00",
            "finish_time" => "12:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 9,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "13:00:00",
            "finish_time" => "14:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 9,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "13:00:00",
            "finish_time" => "14:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 10,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "14:00:00",
            "finish_time" => "15:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 11,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "14:00:00",
            "finish_time" => "15:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 12,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "14:00:00",
            "finish_time" => "15:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 13,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "15:00:00",
            "finish_time" => "16:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 14,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "15:00:00",
            "finish_time" => "16:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 15,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "15:00:00",
            "finish_time" => "16:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 16,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "16:00:00",
            "finish_time" => "17:00:00",
        ]);

        Study::create([
            "competition_id" => 1,
            "pelajaran_id" => 17,
            "level_id" => 3,
            "start_date" => "2024-12-08",
            "start_time" => "16:00:00",
            "finish_time" => "17:00:00",
        ]);
    }
}
