<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'competition';
        return view('backend.masterdata.competition', compact('view'));
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
        //
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

    public function competition_table()
    {
        $data = Competition::with('levels')->get();

        return DataTables::of($data)
           
            ->addColumn('level', function($data){
                return $data->levels->level_name;
            })
            ->addColumn('target', function($data){
                $html = "";
                if(empty($data->province_code)) {
                    $html .= 'Semua Provinsi';
                } else {
                    $html .= 'Provinsi terpilih';
                }

                if(empty($data->city_code)) {
                    $html .= '<br>Semua Kota';
                } else {
                    $html .= '<br>Kota terpilih';
                }

                if(empty($data->district_code)) {
                    $html .= '<br>Semua Kecamatan';
                } else {
                    $html .= '<br>Kecamatan terpilih';
                }
                if(empty($data->sekolah)) {
                    $html .= '<br>Semua Sekolah';
                } else {
                    $html .= '<br>Sekolah terpilih';
                }
                if(empty($data->agama)) {
                    $html .= '<br>Semua Agama';
                } else {
                    $html .= '<br>Agama terpilih';
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
                if ($data->type == 1) {
                    return 'Active';
                }else{ 
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
                <a href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                </a>
                <a href="javascript:void(0)" class="w-32-px h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="lucide:edit"></iconify-icon>
                </a>
                <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a>';
            })
            ->rawColumns(['action', 'date', 'image', 'registration', 'price','target'])
            ->addIndexColumn()
            ->make(true);
    }
}
