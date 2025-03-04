<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Administrasi;
use App\Models\Competition;
use App\Models\Kelas;
use App\Models\Level;
use App\Models\Province;
use App\Models\Sekolah;
use App\Models\Soal;
use App\Models\User;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'soal';
        $com = Competition::where('is_active', 1)->get();
        return view('backend.transaction.soal', compact('view','com'));
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
            'competition_id' => 'required',
            'level_id' => 'required',
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

        $input['admin_id'] = session('id');
        Soal::create($input);
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
        $data = Soal::findorFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $rules = [
            'competition_id' => 'required',
            'level_id' => 'required',
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

        $input['admin_id'] = session('id');
        $soal = Soal::findorFail($id);
        $soal->update($input);
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
        return Soal::destroy($id);
    }

    
    public function get_level(Request $request) {
        $input = $request->all();
        $com = Competition::findorFail($input['id']);
        $level_ids = explode(",", $com->level);

        $level = Level::whereIn("id", $level_ids)->get();

        return $level;
    }

    public function get_study(Request $request) {
        $input = $request->all();
        $data = Study::with('pelajaran')->where('competition_id', $input['com'])
            ->where('level_id', $input['id'])
            ->get();
        return $data;
    }


    public function soal_table()
    {
        $data = Soal::all();

        return DataTables::of($data)
            ->addColumn('competition_id', function($data){
                return $data->competition == null ? null : $data->competition->title;
            })
            ->addColumn('study_id', function($data){
                return $data->study->pelajaran->name;
            })
            ->addColumn('level_id', function($data){
                return $data->level->level_name;
            })
            ->addColumn('admin_id', function($data){
                return $data->user->name;
            })
            ->addColumn('action', function ($data) {
                return '
                <a href="'.url('posiadmin/ujian/'.$data->id).'" class="w-32-px h-32-px bg-info-focus text-primary-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="material-symbols:checked-bag-question-outline"></iconify-icon>
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
            ->rawColumns(['action','competition_id','level_id','study_id'])
            ->addIndexColumn()
            ->make(true);
    }
}
