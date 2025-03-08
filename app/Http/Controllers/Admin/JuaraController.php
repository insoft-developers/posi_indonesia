<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamSession;
use Illuminate\Http\Request;

class JuaraController extends Controller
{
    public function hitung($com, $study)
    {
        $data = ExamSession::where('competition_id', $com)->where('study_id', $study)->orderBy('total_score','desc')->get();
        $jumlah_pendaftar = $data->count();
        $hitung_emas = 0.05 * $jumlah_pendaftar;
        $jumlah_emas = round($hitung_emas);
        $hitung_perak = 0.1 * $jumlah_pendaftar;
        $jumlah_perak = round($hitung_perak);
        $hitung_perunggu = 0.2 * $jumlah_pendaftar;
        $jumlah_perunggu = round($hitung_perunggu);

        $awal_emas = 0;
        $akhir_emas = $jumlah_emas;
        $awal_perak = $jumlah_emas;
        $akhir_perak = (int)$jumlah_emas + (int)$jumlah_perak;
        $awal_perunggu = (int)$jumlah_emas + (int)$jumlah_perak;
        $akhir_perunggu = (int)$jumlah_emas + (int)$jumlah_perak + (int)$jumlah_perunggu;

        foreach ($data as $index => $p) {
            if ($index >= $awal_emas && $index < $akhir_emas && $p->total_score >=0) {
                $medali = 'emas';
                $nilai = 'A+';
            } elseif ($index >= $awal_perak && $index < $akhir_perak && $p->total_score >=0) {
                $medali = 'perak';
                $nilai = 'A';
            } elseif ($index >= $awal_perunggu && $index < $akhir_perunggu && $p->total_score >=0) {
                $medali = 'perunggu';
                $nilai = 'B+';
            } else {
                $medali = 'peserta-aktif';
                $nilai = 'B';
            }

            ExamSession::where('id', $p->id)->update(['medali' => $medali, 'nilai'=> $nilai]);
        }

        return 'selesai';
    }
}
