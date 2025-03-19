<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Hasil2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'hasil2';
        return view('backend.transaction.hasil2', compact('view'));
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
        //
    }

    public function hasil_table()
    {
        $data = Competition::with('study.pelajaran')->get();
      

        return DataTables::of($data)
            ->addColumn('competition_id', function($data){
                return $data->title;
            })
            ->addColumn('study_id', function($data){
                if($data->study == null) {
                    return '';
                } else {
                    $html = '';
                    $html .='<ul>';
                    foreach($data->study as $s) {
                        if($s->pelajaran !== null) {
                            $html .='<li><a class="item-study-pilih" href="'.url('/posiadmin/competition_result/'.$s->id).'"> - '.$s->pelajaran->name.' - '.$s->level->level_name.'</a></li>';

                           
                        }
                        
                    }
                    $html .='</ul>';
                    return $html;
                }
                
            })
            ->addColumn('level_id', function($data){
                return '';
            })
            // ->addColumn('action', function ($data) {
            //     return '
            //     <a onclick="deleteDetail('.$data->id.')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
            //       <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
            //     </a>';
            // })
            ->rawColumns(['study_id'])
            ->addIndexColumn()
            ->make(true);
    }


   
}
