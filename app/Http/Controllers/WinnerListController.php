<?php

namespace App\Http\Controllers;

use App\Models\ExamSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class WinnerListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $view = 'winner';
        return view('backend.transaction.winner', compact('view', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ExamSession::with('user')->find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $rules = [
            "jumlah_benar" => "required",
            "jumlah_salah" => "required",
            "total_score" => "required",
            "medali" => "required",
            "nilai" => "required",
        ];

        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            $pesan = $validator->errors();
            $pesanarr = explode(",", $pesan);
            $find = array("[","]","{","}");
            $html = '';
            foreach($pesanarr as $p ) {
                $html .= str_replace($find,"",$p).'<br>';
            }
            return response()->json([
                "success" => false,
                "message" => $html
            ]);
        }

       

        $data = ExamSession::findorFail($id);
        $data->update($input);
        return response()->json([
            "success" => true,
            "message" => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ExamSession::where('id', $id)->update([
            "hitung_id" => null
        ]);

        return $data;
    }


    public function winner_table($id)
    {
        $data = ExamSession::with('user.wilayah')->where('hitung_id', $id)->get();

        return DataTables::of($data)
            ->addColumn('userid', function($data){
                return $data->user->name ?? '';
            })
            ->addColumn('email', function($data){
                return $data->user->email ?? '';
            })
            ->addColumn('hp', function($data){
                return $data->user->whatsapp ?? '';
            })
           
            ->addColumn('province_id', function($data){
                return $data->user->wilayah->province_name ?? '';
            })
            ->addColumn('city', function($data){
                return $data->user->district->regency_name ?? '';
            })
            ->addColumn('district', function($data){
                return $data->user->district->district_name ?? '';
            })
            ->addColumn('level', function($data){
                return $data->user->level->level_name ?? '';
            })
            
            ->addColumn('nama_sekolah', function($data){
                return $data->user->nama_sekolah ?? '';
            })
            ->addColumn('kelas', function($data){
                return $data->user->kelas->nama_kelas ?? '';
            })
            ->addColumn('jenis_kelamin', function($data){
                return $data->user->jenis_kelamin ?? '';
            })
            ->addColumn('agama', function($data){
                return $data->user->agama ?? '';
            })
            ->addColumn('waktu', function($data){
                return date('d-m-Y H:i:s', strtotime($data->updated_at));
            })
            ->addColumn('action', function ($data) {
                return '
                <a onclick="editData('.$data->id.')" href="javascript:void(0)" class="w-32-px h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="lucide:edit"></iconify-icon>
                </a>
                <a onclick="deleteData('.$data->id.')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
