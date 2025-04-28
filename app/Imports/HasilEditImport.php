<?php

namespace App\Imports;

use App\Models\ExamSession;
use App\Models\PendaftaranLog;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HasilEditImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */

    public function model(array $row)
    {
        if ($row['id'] == null) {
            return null;
        }

        $data = ExamSession::find($row['id']);
        $data->jumlah_benar = $row['benar'] ?? null;
        $data->jumlah_salah = $row['salah'] ?? null;
        $data->jumlah_lewat = $row['lewat'] ?? null;
        $data->total_score = $row['score'] ?? null;
        $data->save();

        return new PendaftaranLog([
            'admin_id' => session('id'),
        ]);
    }
}
