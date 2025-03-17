<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'team';
        return view('backend.homepage.team', compact('view'));
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
            "name" => "required",
            "title" => "required",
            "image" => "required"
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

        $input['image'] = null;
        $unik = uniqid();
        if ($request->hasFile('image')) {
            $input['image'] = Str::slug($unik, '-') . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/storage/image_files/teams'), $input['image']);
        }

        Team::create($input);
        return response()->json([
            "success" => true,
            "message" => 'success'
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
        $data = Team::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $rules = [
            "name" => "required",
            "title" => "required",
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


        $data = Team::find($id);

        $input['image'] = $data->image;
        $unik = uniqid();
        if ($request->hasFile('image')) {
            $input['image'] = Str::slug($unik, '-') . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/storage/image_files/teams'), $input['image']);
        }

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
        $data = Team::destroy($id);
        return $data;
    }


    public function team_table()
    {
        $data = Team::all();

        return DataTables::of($data)
            ->addColumn('image', function($data){
                return '<img class="team-image" src="'.asset('storage/image_files/teams/'.$data->image).'">';
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
            ->rawColumns(['action','image'])
            ->addIndexColumn()
            ->make(true);
    }
}
