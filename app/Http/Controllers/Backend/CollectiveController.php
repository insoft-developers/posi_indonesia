<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PendaftaranExport;
use App\Http\Controllers\Controller;
use App\Imports\PendaftaranImport;
use App\Models\Competition;
use App\Models\Study;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class CollectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'collective';
        return view('backend.transaction.collective', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function download_template_pendaftaran()
    {
        return Excel::download(new PendaftaranExport(), 'template_pendaftaran_posi.xlsx');
    }

    public function pendaftaran_upload(Request $request)
    {
        $input = $request->all();

        $study = Study::find($input['study_id']);
        $com = Competition::find($study->competition_id);

        if ($input['bentuk_kompetisi'] == 'free') {
            if ($com->type == 2) {
                return response()->json([
                    'success' => false,
                    'message' => 'Metode gratis tidak tersedia pada kompetisi ini..!',
                ]);
            }
        } elseif ($input['bentuk_kompetisi'] == 'premium') {
            if ($com->type == 3) {
                return response()->json([
                    'success' => false,
                    'message' => 'Metode berbayar tidak tersedia pada kompetisi ini..!',
                ]);
            }
        }

        try {
            $excel = new PendaftaranImport();
            $excel->set_id($input['study_id'], $input['bentuk_kompetisi']);
            Excel::import($excel, $request->file);

            return response()->json([
                'success' => true,
                'message' => 'success import file',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

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
        $view = 'collective-study';
        $com = Competition::find($id);
        return view('backend.transaction.collective_study', compact('view', 'com'));
    }

    public function collective_list(string $id)
    {
        $view = 'collective-list';
        return view('backend.transaction.collective_list', compact('view', 'id'));
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

    public function get_daftar(Request $request)
    {
        $input = $request->all();

        $data = Study::with('competition', 'pelajaran', 'level')->find($input['id']);
        return $data;
    }

    public function collective_table()
    {
        $data = Competition::with('study', 'transaction')->get();

        return DataTables::of($data)
            ->addColumn('title', function ($data) {
                return $data->title . '  (' . $data->transaction->count('userid') . ')';
            })
            ->addColumn('study_id', function ($data) {
                if ($data->study == null) {
                    return null;
                } else {
                    $html = '';
                    $html .= '<ul>';
                    foreach ($data->study as $ds) {
                        $html .= '<li> - ' . $ds->pelajaran->name . '(' . $ds->trans->count() . ')</li>';
                    }
                    $html .= '</ul>';

                    return $html;
                }
            })
            ->addColumn('action', function ($data) {
                return '
                <a title="Pilih" href="' .
                    url('/posiadmin/collective/' . $data->id) .
                    '" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="material-symbols:check-circle-outline-rounded"></iconify-icon>
                </a>';
            })
            ->rawColumns(['action', 'study_id'])
            ->addIndexColumn()
            ->make(true);
    }

    public function collective_study_table($id)
    {
        $data = Study::with('level', 'pelajaran')->where('competition_id', $id)->get();

        return DataTables::of($data)
            ->addColumn('level_id', function ($data) {
                // $trans = Transaction::where('study_id', $data->id)->where('level_id', $data->level_id)->count();

                return $data->level == null ? '' : $data->level->level_name . '( ' . $data->trans->count() . ' )';
            })
            ->addColumn('study_id', function ($data) {
                return $data->pelajaran == null ? '' : $data->pelajaran->name;
            })
            ->addColumn('action', function ($data) {
                return '
                <a title="List Pendaftaran" href="' .
                    url('posiadmin/collective_list/' . $data->id) .
                    '" class="w-32-px h-32-px bg-info-focus text-info-main  d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="material-symbols:format-list-bulleted-rounded"></iconify-icon>
                </a>
                <a onclick="daftar(' .
                    $data->id .
                    ')" title="Daftar Kolektif" href="javascript:void(0);" class="w-32-px h-32-px bg-warning-focus text-warning-main  d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="material-symbols:user-attributes-outline"></iconify-icon>
                </a>';
            })
            ->rawColumns(['action', 'study_id', 'level_id'])
            ->addIndexColumn()
            ->make(true);
    }

    public function collective_list_table($id)
    {
        $data = Transaction::with('tuser', 'muser', 'study.pelajaran')->where('study_id', $id)->get();

        return DataTables::of($data)
            ->addColumn('unit_price', function($data){
                return number_format($data->unit_price);
            })
            ->addColumn('amount', function($data){
                return number_format($data->amount);
            })
            ->addColumn('competition_id', function ($data) {
                $html = '';
                if($data->competition == null) {

                } else {
                    $html .= $data->competition->title;
                }
                if($data->study == null) {

                } else {
                    if($data->study->pelajaran == null) {

                    } else {
                        $html .= '<br>'.$data->study->pelajaran->name;
                    }
                }
                return $html;
            })
            ->addColumn('userid', function ($data) {
                return $data->tuser == null ? '' : $data->tuser->name;
            })
            ->addColumn('buyer', function ($data) {
                return $data->muser == null ? '' : $data->muser->name;
            })
            ->addColumn('created_at', function ($data) {
                return date('d-m-Y', strtotime($data->created_at));
            })
            ->addColumn('action', function ($data) {
                return '';
                // <a title="List Pendaftaran" href="#" class="w-32-px h-32-px bg-info-focus text-info-main  d-inline-flex align-items-center justify-content-center">
                //   <iconify-icon icon="material-symbols:format-list-bulleted-rounded"></iconify-icon>
                // </a>
                // <a onclick="daftar(' .
                //     $data->id .
                //     ')" title="Daftar Kolektif" href="javascript:void(0);" class="w-32-px h-32-px bg-warning-focus text-warning-main  d-inline-flex align-items-center justify-content-center">
                //   <iconify-icon icon="material-symbols:user-attributes-outline"></iconify-icon>
                // </a>';
            })
            ->rawColumns(['action','competition_id'])
            ->addIndexColumn()
            ->make(true);
    }
}
