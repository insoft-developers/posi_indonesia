<?php

namespace Database\Seeders;

use App\Models\Ujian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Ujian::where('competition_id', 2)->delete();
        
        $data = Ujian::where('competition_id', 1)->get();
        foreach ($data as $index => $d) {
            $insert = [
                'competition_id' => '2',
                'study_id' => '23',
                'level_id' => '3',
                'question_number' => $index + 1,
                'question_title' => '7 X 6 = ?',
                'question_image' => null,
                'option_a' => '48',
                'option_b' => '54',
                'option_c' => '56',
                'option_d' => '49',
                'option_e' => '42',
                'option_image_a' => null,
                'option_image_b' => null,
                'option_image_c' => null,
                'option_image_d' => null,
                'option_image_e' => null,
                'score_benar' => '4',
                'score_salah' => '-1',
                'score_lewat' => '0',
                'answer_key' => 'e',
                'admin_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            Ujian::create($insert);
        }
    }
}
