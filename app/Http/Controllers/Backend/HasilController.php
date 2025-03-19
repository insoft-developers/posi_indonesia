<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ExamSession;
use App\Models\Study;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $view = 'hasil';
        $study = Study::find($id);
        return view('backend.transaction.hasil', compact('view','id','study'));
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
        $view = 'hasil-detail';
        $session = ExamSession::find($id);
        return view('backend.transaction.hasil_detail', compact('view','session','id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserAnswer::where('session_id', $id)->delete();
        $data = ExamSession::destroy($id);
        return $data;
    }

    public function hasil_detail_delete(Request $request) {
        $input = $request->all();
        $id = $input['id'];
        $data = UserAnswer::destroy($id);
        return $data;
    }


    public function hasil_table($id)
    {
        $data = ExamSession::with('competition','study.pelajaran','study.level')
        ->where('study_id', $id)
        ->get();

        return DataTables::of($data)
        ->addColumn('id', function ($data) {
            return '<div class="form-check"><input class="form-check-input" type="checkbox" id="id" data-id="' . $data->id . '" ></div>';
        })
            ->addColumn('created_at', function($data){
                return date('d-m-Y', strtotime($data->created_at));
            })
            ->addColumn('competition_id', function($data){
                return $data->competition == null ? '' : $data->competition->title;
            })
            ->addColumn('study_id', function($data){
                return $data->study == null || $data->study->pelajaran == null ? ''  : $data->study->pelajaran->name .' ( '.$data->study->level->level_name.' )';
            })
            ->addColumn('userid', function($data){
                return $data->user == null ? '' : $data->user->name;
            })
            ->addColumn('email', function($data){
                return $data->user == null ? '' : $data->user->email;
            })
            ->addColumn('is_finish', function($data){
                if($data->is_finish == 1) {
                    return "SELESAI";
                } else {
                    return "ON PROGRESS";
                }
            })
            ->addColumn('action', function ($data) {
                return '
                
                <a title="List Jawaban" href="'.url('posiadmin/hasil/'.$data->id).'" class="w-32-px h-32-px bg-info-focus text-info-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="material-symbols:list-alt-outline"></iconify-icon>
                </a>
                <a onclick="deleteData('.$data->id.')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a>';
            })
            ->rawColumns(['action','id'])
            ->addIndexColumn()
            ->make(true);
    }

    public function bulk_delete(Request $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            $ids = json_decode(stripslashes($input['id']));
            foreach ($ids as $id) {
                ExamSession::where('id', $id)->delete();
                UserAnswer::where('session_id', $id)->delete();
                
            }
            DB::commit();
            return response()->json([
                "success" => true,
                "message" => "delete successfully"
            ]);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
        
        
    }


    public function hasil_detail_table($id)
    {
        $data = UserAnswer::where('session_id', $id)->get();

        return DataTables::of($data)
            
            ->addColumn('created_at', function($data){
                return date('d-m-Y', strtotime($data->created_at));
            })
            ->addColumn('action', function ($data) {
                return '
                <a onclick="deleteDetail('.$data->id.')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
