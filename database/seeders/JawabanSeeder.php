<?php

namespace Database\Seeders;

use App\Models\UserAnswer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 101; $i++) {
            UserAnswer::create(['session_id' => $i, 'id_soal' => '1', 'nomor_soal' => '1', 'jawaban_soal' => 'e', 'hasil_jawaban' => 'Benar', 'score' => '4']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '2', 'nomor_soal' => '2', 'jawaban_soal' => 'd', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '3', 'nomor_soal' => '3', 'jawaban_soal' => 'b', 'hasil_jawaban' => 'Benar', 'score' => '4']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '4', 'nomor_soal' => '4', 'jawaban_soal' => 'c', 'hasil_jawaban' => 'Benar', 'score' => '4']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '5', 'nomor_soal' => '5', 'jawaban_soal' => 'e', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '6', 'nomor_soal' => '6', 'jawaban_soal' => 'c', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '7', 'nomor_soal' => '7', 'jawaban_soal' => 'd', 'hasil_jawaban' => 'Benar', 'score' => '4']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '8', 'nomor_soal' => '8', 'jawaban_soal' => 'a', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '9', 'nomor_soal' => '9', 'jawaban_soal' => 'b', 'hasil_jawaban' => 'Benar', 'score' => '4']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '10', 'nomor_soal' => '10', 'jawaban_soal' => 'e', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '11', 'nomor_soal' => '11', 'jawaban_soal' => 'b', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '12', 'nomor_soal' => '12', 'jawaban_soal' => 'c', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '13', 'nomor_soal' => '13', 'jawaban_soal' => 'd', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '14', 'nomor_soal' => '14', 'jawaban_soal' => 'e', 'hasil_jawaban' => 'Benar', 'score' => '4']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '15', 'nomor_soal' => '15', 'jawaban_soal' => 'd', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '16', 'nomor_soal' => '16', 'jawaban_soal' => 'a', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '17', 'nomor_soal' => '17', 'jawaban_soal' => 'a', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '18', 'nomor_soal' => '18', 'jawaban_soal' => 'c', 'hasil_jawaban' => 'Benar', 'score' => '4']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '19', 'nomor_soal' => '19', 'jawaban_soal' => 'e', 'hasil_jawaban' => 'Benar', 'score' => '4']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '20', 'nomor_soal' => '20', 'jawaban_soal' => 'c', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '21', 'nomor_soal' => '21', 'jawaban_soal' => 'b', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '22', 'nomor_soal' => '22', 'jawaban_soal' => 'e', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '23', 'nomor_soal' => '23', 'jawaban_soal' => 'b', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '24', 'nomor_soal' => '24', 'jawaban_soal' => 'a', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '25', 'nomor_soal' => '25', 'jawaban_soal' => 'e', 'hasil_jawaban' => 'Benar', 'score' => '4']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '26', 'nomor_soal' => '26', 'jawaban_soal' => 'c', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '27', 'nomor_soal' => '27', 'jawaban_soal' => 'e', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '28', 'nomor_soal' => '28', 'jawaban_soal' => 'a', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '29', 'nomor_soal' => '29', 'jawaban_soal' => 'b', 'hasil_jawaban' => 'Benar', 'score' => '4']);
            UserAnswer::create(['session_id' => $i, 'id_soal' => '30', 'nomor_soal' => '30', 'jawaban_soal' => 'a', 'hasil_jawaban' => 'Salah', 'score' => '-1']);
        }
    }
}
