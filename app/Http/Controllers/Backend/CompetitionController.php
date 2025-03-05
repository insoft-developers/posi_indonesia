<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\CompetitionBonusProduct;
use App\Models\Level;
use App\Models\Pelajaran;
use App\Models\Product;
use App\Models\Province;
use App\Models\Sekolah;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'competition';
        $level = Level::all();
        $province = Province::groupBy('province_code')->get();
        $pelajaran = Pelajaran::all();
        $product = Product::where('is_active', 1)->get();
        return view('backend.masterdata.competition', compact('view', 'level', 'province', 'pelajaran', 'product'));
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
            'image' => 'required',
            'title' => 'required',
            'date' => 'required',
            'start_registration_date' => 'required',
            'start_registration_time' => 'required',
            'finish_registration_date' => 'required',
            'finish_registration_time' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'level' => 'required',
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

        $input['image'] = null;
        $unik = uniqid();
        if ($request->hasFile('image')) {
            $input['image'] = Str::slug($unik, '-') . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/template/frontend/assets/kompetisi'), $input['image']);
        }

        $sekolah = $input['sekolah'];

        $input['sekolah'] = $input['sekolah'] == 'lainnya' ? $input['sekolah_lain'] : $input['sekolah'];

        $level = [];
        foreach ($input['level'] as $il) {
            $lid = explode('_', $il);
            array_push($level, $lid[0]);
        }
        // dd($level);
        $input['level'] = implode(',', $level);

        $com = Competition::create($input);
        if ($request->premium_bonus_product !== null || $request->free_bonus_product !== null) {
            CompetitionBonusProduct::create([
                'competition_id' => $com->id,
                'free_register_product' => $request->free_bonus_product == null ? null : implode(',', $input['free_bonus_product']),
                'premium_register_product' => $request->premium_bonus_product == null ? null : implode(',', $input['premium_bonus_product']),
            ]);
        }

        if ($sekolah == 'lainnya') {
            Sekolah::create([
                'name' => $input['sekolah_lain'],
                'province_code' => $input['province_code'],
                'city_code' => $input['city_code'],
                'district_code' => $input['district_code'],
                'jenjang' => $level[1],
            ]);
        }

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
        $data = Study::where('competition_id', $id)->orderBy('id', 'desc')->get();

        if ($data->count() <= 0) {
            $html = '';
            $html .= '<div style="text-align:center;">Belum ada data bidang studi</div>';

            $com = Competition::findorFail($id);
            $levels = explode(',', $com->level);
            $rows = [];
            foreach ($levels as $level) {
                $lvl = Level::find($level);
                if ($lvl === null) {
                } else {
                    $row['id'] = $lvl->id;
                    $row['level_name'] = $lvl->level_name;
                    array_push($rows, $row);
                }
            }

            $data['html'] = $html;
            $data['level'] = $rows;
            return $data;
        }

        $html = '';
        $html .= '<table class="table table-bordered table-striped">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>No</th>';
        $html .= '<th>Action</th>';
        $html .= '<th>Kompetisi</th>';
        $html .= '<th>Jenjang</th>';
        $html .= '<th>Bidang Studi</th>';
        $html .= '<th>Tanggal Kompetisi</th>';
        $html .= '<th>Mulai Jam</th>';
        $html .= '<th>Selesai Jam</th>';
        $html .= '<th>Forum Link</th>';

        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';
        foreach ($data as $index => $d) {
            $html .= '<tr>';
            $html .= '<td>' . ($index + 1) . '</td>';
            $html .=
                '<td><a onclick="editStudy(' .
                $d->id .
                ')" href="javascript:void(0)" class="w-32-px h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="lucide:edit"></iconify-icon>
                </a>
                <a onclick="deleteStudy(' .
                $d->id .
                ')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a></td>';
            if ($d->competition == null) {
                $html .= '<td></td>';
            } else {
                $html .= '<td>' . $d->competition->title . '</td>';
            }

            if ($d->level == null) {
                $html .= '<td></td>';
            } else {
                $html .= '<td>'.$d->level->level_name.'</td>';
            }

            $html .= '<td>' . $d->pelajaran->name . '</td>';
            $html .= '<td class="text-center">' . date('d-m-Y', strtotime($d->start_date)) . '</td>';
            $html .= '<td class="text-center">' . $d->start_time . '</td>';
            $html .= '<td class="text-center">' . $d->finish_time . '</td>';
            $html .= '<td>' . $d->forum_link . '</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody>';
        $html .= '</table>';

        $com = Competition::findorFail($id);

        $levels = explode(',', $com->level);
        $rows = [];
        foreach ($levels as $level) {
            $lvl = Level::find($level);
            if ($lvl === null) {
            } else {
                $row['id'] = $lvl->id;
                $row['level_name'] = $lvl->level_name;
                array_push($rows, $row);
            }
        }

        $data['html'] = $html;
        $data['level'] = $rows;
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['data'] = Competition::with('bonus')->findorFail($id);
        $level = [];
        $lvl = explode(',', $data['data']->level);
        foreach ($lvl as $l) {
            $lev = Level::where('id', $l);
            if ($lev->count() > 0) {
                array_push($level, $l . '_' . $lev->first()->jenjang);
            }
        }

        $data['level'] = $level;

        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $rules = [
            'title' => 'required',
            'date' => 'required',
            'start_registration_date' => 'required',
            'start_registration_time' => 'required',
            'finish_registration_date' => 'required',
            'finish_registration_time' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'level' => 'required',
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

        $com = Competition::findorFail($id);
        $input['image'] = $com->image;
        $unik = uniqid();
        if ($request->hasFile('image')) {
            $input['image'] = Str::slug($unik, '-') . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/template/frontend/assets/kompetisi'), $input['image']);
        }

        $sekolah = $input['sekolah'];

        $input['sekolah'] = $input['sekolah'] == 'lainnya' ? $input['sekolah_lain'] : $input['sekolah'];

        $level = [];
        $jenjang = [];
        foreach ($input['level'] as $il) {
            $lid = explode('_', $il);
            array_push($level, $lid[0]);
            array_push($jenjang, $lid[1]);
        }
        // dd($level);
        $input['level'] = implode(',', $level);
        $com->update($input);

        if ($request->premium_bonus_product !== null || $request->free_bonus_product !== null) {
            CompetitionBonusProduct::updateOrCreate(
                ['competition_id' => $id],
                [
                    'free_register_product' => $request->free_bonus_product == null ? null : implode(',', $input['free_bonus_product']),
                    'premium_register_product' => $request->premium_bonus_product == null ? null : implode(',', $input['premium_bonus_product']),
                ],
            );
        }

        Study::where('competition_id', $id)->update([
            'start_date' => $input['date'],
        ]);

        if ($sekolah == 'lainnya') {
            foreach ($jenjang as $vel) {
                Sekolah::create([
                    'name' => $input['sekolah_lain'],
                    'province_code' => $input['province_code'],
                    'city_code' => $input['city_code'],
                    'district_code' => $input['district_code'],
                    'jenjang' => $vel,
                ]);
            }
        }

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
        return Competition::destroy($id);
    }

    public function competition_table()
    {
        $data = Competition::with('levels')->get();

        return DataTables::of($data)

            ->addColumn('level', function ($data) {
                $levels = explode(',', $data->level);
                $html = '<ul>';
                foreach ($levels as $l) {
                    $level = Level::find($l);
                    if ($level !== null) {
                        $html .= '<li>' . $level->level_name . '</li>';
                    }
                }
                $html .= '</ul>';
                return $html;
            })
            ->addColumn('target', function ($data) {
                $html = '';
                if (empty($data->province_code)) {
                    $html .= 'Semua Provinsi';
                } else {
                    $html .= $data->province_name;
                }

                if (empty($data->city_code)) {
                    $html .= '<br>Semua Kota';
                } else {
                    $html .= '<br>' . $data->city_name;
                }

                if (empty($data->district_code)) {
                    $html .= '<br>Semua Kecamatan';
                } else {
                    $html .= '<br>' . $data->district_name;
                }
                if (empty($data->sekolah)) {
                    $html .= '<br>Semua Sekolah';
                } else {
                    $html .= '<br>' . $data->sekolah;
                }
                if (empty($data->agama)) {
                    $html .= '<br>Semua Agama';
                } else {
                    $html .= '<br>' . $data->agama;
                }

                return $html;
            })
            ->addColumn('date', function ($data) {
                return '<center>' . date('d-m-Y', strtotime($data->date)) . '</center>';
            })
            ->addColumn('type', function ($data) {
                if ($data->type == 1) {
                    return 'berbayar dan gratis';
                } elseif ($data->type == 2) {
                    return 'berbayar';
                } elseif ($data->type == 3) {
                    return 'gratis';
                }
            })
            ->addColumn('is_active', function ($data) {
                if ($data->is_active == 1) {
                    return 'Active';
                } else {
                    return 'Not Active';
                }
            })
            ->addColumn('price', function ($data) {
                return number_format($data->price);
            })
            ->addColumn('image', function ($data) {
                if ($data->image !== null) {
                    return '<img class="kom-image" src="' . asset('template/frontend/assets/kompetisi/' . $data->image) . '">';
                } else {
                    return '';
                }
            })
            ->addColumn('registration', function ($data) {
                return date('d-m-Y', strtotime($data->start_registration_date)) . ' - ' . $data->start_registration_time . '<br>' . date('d-m-Y', strtotime($data->finish_registration_date)) . ' - ' . $data->finish_registration_time;
            })
            ->addColumn('action', function ($data) {
                return '
                <a onclick="studyData(' .
                    $data->id .
                    ')" title="Bidang Studi" href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="material-symbols:library-books-outline-rounded"></iconify-icon>
                </a>
                <a onclick="editData(' .
                    $data->id .
                    ')" href="javascript:void(0)" class="w-32-px h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="lucide:edit"></iconify-icon>
                </a>
                <a onclick="deleteData(' .
                    $data->id .
                    ')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a>';
            })
            ->rawColumns(['action', 'date', 'image', 'registration', 'price', 'target', 'level'])
            ->addIndexColumn()
            ->make(true);
    }

    public function simpan_study(Request $request)
    {
        $input = $request->all();
        $competition = Competition::findorFail($input['competition_id']);

        Study::create([
            'competition_id' => $input['competition_id'],
            'pelajaran_id' => $input['s-pelajaran'],
            'level_id' => $input['s-jenjang'],
            'start_date' => $competition->date,
            'start_time' => $input['s-start-time'],
            'finish_time' => $input['s-finish-time'],
            'forum_link' => $input['s-forum-link'],
            'status' => 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'success',
            'id' => $input['competition_id'],
        ]);
    }

    public function update_study(Request $request)
    {
        $input = $request->all();
        $competition = Competition::findorFail($input['competition_id']);

        $study = Study::findorFail($input['study-id']);

        $study->update([
            'competition_id' => $input['competition_id'],
            'pelajaran_id' => $input['s-pelajaran'],
            'level_id' => $input['s-jenjang'],
            'start_date' => $competition->date,
            'start_time' => $input['s-start-time'],
            'finish_time' => $input['s-finish-time'],
            'forum_link' => $input['s-forum-link'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'success',
            'id' => $input['competition_id'],
        ]);
    }

    public function edit_study($id)
    {
        $data = Study::findorFail($id);
        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function delete_study(Request $request)
    {
        $input = $request->all();
        $study = Study::findorFail($input['id']);
        $cid = $study->competition_id;

        $study->delete();
        return response()->json([
            'success' => true,
            'id' => $cid,
        ]);
    }
}
