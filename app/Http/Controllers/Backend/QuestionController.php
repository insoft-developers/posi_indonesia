<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class QuestionController extends Controller
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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $view = 'question';
        $soal = Soal::findorFail($id);
        return view('backend.transaction.question', compact('view','soal'));
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
        
    }

    public function question_table($id)
    {
        $data = Ujian::where('soal_id', $id)->get();

        return DataTables::of($data)
           
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
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
