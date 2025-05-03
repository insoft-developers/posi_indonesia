<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\ExamSession;
use App\Models\Pengumuman;
use App\Models\Study;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function hitung_hasil_ujian(Request $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        $id = $input['id'];
        $pengumuman = Pengumuman::find($id);
        $competition_id = $pengumuman->competition_id;
        $study_id = explode(',', $pengumuman->study_id);

        if (count($study_id) > 0) {
            foreach ($study_id as $s) {
                $session = ExamSession::where('competition_id', $competition_id)
                    ->where('study_id', $s)
                    ->where('is_finish', 1)
                    ->update([
                        'hitung_id' => $id,
                    ]);
            }
            $this->set_juara($id);
            Pengumuman::where('id', $id)->update(['is_status' => 1]);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Success',
            ]);
        } else {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Bidang Studi tidak terdaftar',
            ]);
        }
    }

    protected function set_juara($id)
    {
        try {
            DB::beginTransaction();
            $data = ExamSession::where('hitung_id', $id)->orderBy('total_score', 'desc')->orderBy('updated_at', 'asc')->get();
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
            $akhir_perak = (int) $jumlah_emas + (int) $jumlah_perak;
            $awal_perunggu = (int) $jumlah_emas + (int) $jumlah_perak;
            $akhir_perunggu = (int) $jumlah_emas + (int) $jumlah_perak + (int) $jumlah_perunggu;

            $pengumuman = Pengumuman::find($id);
            $study_id_array = explode(',', $pengumuman->study_id);

            $list_study = [];

            foreach ($study_id_array as $sia) {
                $jumlah_soal = Ujian::where('study_id', $sia)->count();
                array_push($list_study, $jumlah_soal);
            }

            $jumlah_soal = max($list_study);
            // $jumlah_soal = 75;

            $maksimal = $jumlah_soal * 4;
            $minimal = $jumlah_soal * -1;

            $rentang = $maksimal - $minimal;
            $batas_atas_a_plus = 0.75 * $rentang;
            $batas_bawah_a_plus = $batas_atas_a_plus + $minimal;

            $batas_atas_a = 0.5 * $rentang;
            $batas_bawah_a = $batas_atas_a + $minimal;

            $batas_atas_b_plus = 0.3 * $rentang;
            $batas_bawah_b_plus = $batas_atas_b_plus + $minimal;

            $batas_atas_b = 0.2 * $rentang;
            $batas_bawah_b = $batas_atas_b + $minimal;

            $nilai_atas_a_plus = $maksimal;
            $nilai_bawah_a_plus = round($batas_bawah_a_plus);

            $nilai_atas_a = $nilai_bawah_a_plus - 1;
            $nilai_bawah_a = round($batas_bawah_a);

            $nilai_atas_b_plus = $nilai_bawah_a - 1;
            $nilai_bawah_b_plus = round($batas_bawah_b_plus);

            $nilai_atas_b = $nilai_bawah_b_plus - 1;
            $nilai_bawah_b = round($batas_bawah_b);

            foreach ($data as $index => $p) {
                if ($index >= $awal_emas && $index < $akhir_emas && $p->total_score >= 0) {
                    $medali = 'emas';
                } elseif ($index >= $awal_perak && $index < $akhir_perak && $p->total_score >= 0) {
                    $medali = 'perak';
                } elseif ($index >= $awal_perunggu && $index < $akhir_perunggu && $p->total_score >= 0) {
                    $medali = 'perunggu';
                } else {
                    $medali = 'peserta-aktif';
                }

                if ($p->total_score >= $nilai_bawah_a_plus && $p->total_score <= $nilai_atas_a_plus) {
                    $grade = 'A+';
                } elseif ($p->total_score >= $nilai_bawah_a && $p->total_score <= $nilai_atas_a) {
                    $grade = 'A';
                } elseif ($p->total_score >= $nilai_bawah_b_plus && $p->total_score <= $nilai_atas_b_plus) {
                    $grade = 'B+';
                } elseif ($p->total_score >= $nilai_bawah_b && $p->total_score <= $nilai_atas_b) {
                    $grade = 'B';
                } elseif ($p->total_score < 0) {
                    $grade = 'C';
                }

                ExamSession::where('id', $p->id)->update(['medali' => $medali, 'nilai' => $grade]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function get_pengumuman_study($id)
    {
        $data = Study::with('pelajaran', 'level')->where('competition_id', $id)->get();
        return $data;
    }

    public function get_pengumuman_level($pelajaran, $competition)
    {
        $data = Study::with('level')->where('competition_id', (int) $competition)->where('pelajaran_id', (int) $pelajaran)->get();
        return $data;
    }

    public function index()
    {
        $view = 'pengumuman';
        $competition = Competition::all();
        return view('backend.transaction.pengumuman', compact('view', 'competition'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'description' => 'required',
            'competition_id' => 'required',
            'study_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $pesan = $validator->errors();
            $pesanarr = explode(',', $pesan);
            $find = ['[', ']', '{', '}'];
            $html = '';
            foreach ($pesanarr as $p) {
                $html .= str_replace($find, '', $p) . '<br>';
            }
            return response()->json([
                'success' => false,
                'message' => $html,
            ]);
        }

        $input['study_id'] = implode(',', $input['study_id']);

        Pengumuman::create($input);
        return response()->json([
            'success' => true,
            'message' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pengumuman::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $rules = [
            'description' => 'required',
            'competition_id' => 'required',
            'study_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $pesan = $validator->errors();
            $pesanarr = explode(',', $pesan);
            $find = ['[', ']', '{', '}'];
            $html = '';
            foreach ($pesanarr as $p) {
                $html .= str_replace($find, '', $p) . '<br>';
            }
            return response()->json([
                'success' => false,
                'message' => $html,
            ]);
        }

        $input['study_id'] = implode(',', $input['study_id']);

        $data = Pengumuman::find($id);
        $data->update($input);

        return response()->json([
            'success' => true,
            'message' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ExamSession::where('hitung_id', $id)->update([
            'medali' => null,
            'nilai' => null,
            'hitung_id' => null,
        ]);

        $data = Pengumuman::destroy($id);
        return $data;
    }

    public function publish(Request $request) {
        $data = Pengumuman::find($request->id);
        $data->is_status = $request->is_status;
        $res = $data->save();

        return $res;
    }


    public function pemberitahuan_table()
    {
        $data = Pengumuman::with('competition')->get();

        return DataTables::of($data)
            ->addColumn('is_status', function ($data) {
                if ($data->is_status == 1) {
                    return 'READY';
                } elseif ($data->is_status == 2) {
                    return 'PUBLISHED';
                } else {
                    return '';
                }
            })
            ->addColumn('competition_id', function ($data) {
                return $data->competition == null ? '' : $data->competition->title;
            })

            ->addColumn('study_id', function ($data) {
                $h = '';
                $h .= '<ul>';
                $study = explode(',', $data->study_id);
                foreach ($study as $s) {
                    $dy = Study::with('pelajaran', 'level')->find($s);

                    $h .= '<li>' . $dy->pelajaran->name . ' - ' . $dy->level->level_name . '</li>';
                }
                $h .= '</ul>';

                return $h;
            })

            ->addColumn('action', function ($data) {
                $btn = '';
                if ($data->is_status !== 1 && $data->is_status !== 2) {
                    $btn .=
                        '<a title="Hitung Hasil Pengumuman" onclick="hitungData(' .
                        $data->id .
                        ')" href="javascript:void(0)" class="w-32-px h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="material-symbols:account-tree-outline"></iconify-icon>
                </a>';

                    $btn .=
                        '<a style="margin-left:5px;" onclick="editData(' .
                        $data->id .
                        ')" href="javascript:void(0)" class="w-32-px h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="lucide:edit"></iconify-icon>
                </a>';
                }

                if ($data->is_status == 1) {
                    $btn .=
                        '<a onclick="published('.$data->id.', 2)" title="Published Pengumuman" style="margin-left:5px;" href="javascript:void(0);" class="w-32-px h-32-px bg-info-focus text-info-main rounded-circle d-inline-flex align-items-center justify-content-center">
              <iconify-icon icon="material-symbols:mobile-speaker-outline"></iconify-icon>
            </a>';
                    
                    $btn .=
                        '<a  title="Daftar Pemenang" style="margin-left:5px;" href="' .
                        url('posiadmin/winner/' . $data->id) .
                        '" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
              <iconify-icon icon="material-symbols:trophy-outline-sharp"></iconify-icon>
            </a>';
                }

                if ($data->is_status == 2) {
                    $btn .=
                        '<a onclick="published('.$data->id.', 1)" title="Hapus Publish" style="margin-left:5px;" href="javascript:void(0);" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
              <iconify-icon icon="material-symbols:do-not-disturb-off-rounded"></iconify-icon>
            </a>';
                    
                    $btn .=
                        '<a  title="Daftar Pemenang" style="margin-left:5px;" href="' .
                        url('posiadmin/winner/' . $data->id) .
                        '" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
              <iconify-icon icon="material-symbols:trophy-outline-sharp"></iconify-icon>
            </a>';
                }

                $btn .=
                    '<a style="margin-left:5px;" onclick="deleteData(' .
                    $data->id .
                    ')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a>';
                return $btn;
            })
            ->rawColumns(['action', 'study_id'])
            ->addIndexColumn()
            ->make(true);
    }
}
