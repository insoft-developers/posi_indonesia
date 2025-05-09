<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'beritas';
        $cat = NewsCategory::all();
        return view('backend.blog.berita', compact('view','cat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    protected function make_slug($text) {
        $slug = str_replace(' ', '-', $text);
        $slug = str_replace(',', '-', $slug);
        $slug = str_replace('?', '-', $slug);
        $slug = str_replace('&', '-', $slug);
        $slug = str_replace(':', '-', $slug);
        $slug = str_replace('(', '-', $slug);
        $slug = str_replace(')', '-', $slug);
        $slug = str_replace('/', '-', $slug);
        $slugs = strtolower($slug);
        return $slugs;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        
        $input['slug'] = $this->make_slug($input['title']);

        $rules = [
            'title' => 'required',
            'image' => 'required',
            'content' => 'required',
            'category' => 'required',
            'slug' => 'required|unique:beritas',
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

        // $input['image'] = null;
        // $unik = uniqid();
        // if ($request->hasFile('image')) {
        //     $input['image'] = Str::slug($unik, '-') . '.' . $request->image->getClientOriginalExtension();
        //     $request->image->move(public_path('/storage/image_files/berita'), $input['image']);
        // }


        $input['image'] = null;
        $unik = uniqid();
       
        $path = public_path('/storage/image_files/berita');
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $file = $request->image;
            $filename = $unik . date('YmdHis') .'.'. $file->getClientOriginalExtension();
            $input['image'] = $filename;
            $img = $manager->read($file->path());
            $img->cover(1200, 628)->save($path . '/' . $filename);
        }



        $input['admin_id'] = session('id');
        Berita::create($input);
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
        $data = Berita::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();

        $input['slug'] = $this->make_slug($input['title']);

        $rules = [
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'slug' => 'required',
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

        $data = Berita::find($id);


        $input['image'] = $data->image;
        $unik = uniqid();
       
        $path = public_path('/storage/image_files/berita');
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $file = $request->image;
            $filename = $unik . date('YmdHis') .'.'. $file->getClientOriginalExtension();
            $input['image'] = $filename;
            $img = $manager->read($file->path());
            $img->cover(1200, 628)->save($path . '/' . $filename);
        }

       $input['admin_id'] = session('id');
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
        $data = Berita::destroy($id);
        return $data;
    }

    public function berita_table()
    {
        $data = Berita::all();

        return DataTables::of($data)
            ->addColumn('is_status', function ($data) {
                if ($data->is_status == 1) {
                    return 'PUBLISHED';
                } else {
                    return '';
                }
            })
            ->addColumn('admin_id', function ($data) {
                return $data->admin->name ?? '';
            })
            ->addColumn('content', function ($data) {
                if (strlen($data->content) > 100) {
                    return substr($data->content, 0, 100) . '...';
                } else {
                    return $data->content;
                }
            })
            ->addColumn('image', function ($data) {
                if ($data->image !== null) {
                    return '<img class="kom-image" src="' . asset('storage/image_files/berita/' . $data->image) . '">';
                } else {
                    return '';
                }
            })
            ->addColumn('action', function ($data) {
                return '
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
            ->rawColumns(['action', 'content', 'image'])
            ->addIndexColumn()
            ->make(true);
    }
}
