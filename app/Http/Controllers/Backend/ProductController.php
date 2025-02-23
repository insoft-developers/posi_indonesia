<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Kelas;
use App\Models\Level;
use App\Models\Product;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'product';
        $competition = Competition::where('is_active', 1)->get();
        $composition = Product::where('is_active', 1)->where('is_combo', '!=', 1)->get();
        return view('backend.masterdata.product', compact('view','competition', 'composition'));
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
            "product_name" => "required",
            "product_price" => "required|numeric",
            "image" => "required",
            "competition_id" => "required",
            "study_id" => "required",
            "is_fisik" => "required",
            "product_for" => "required",
            "is_combo" => "required",
            "berat" => "required",
            "is_active" => "required"
        ];

        if($input['is_combo'] == 1) {
            $rules['composition'] = "required";
        }

        if($input['document_type'] == 'piagam' || $input['document_type'] == 'sertifikat') {
            $rules['document'] = "required";
        }

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
            $request->image->move(public_path('/storage/image_files/product'), $input['image']);
        }


        $input['document'] = null;
        $unik = uniqid();
        if ($request->hasFile('document')) {
            $input['document'] = Str::slug($unik, '-') . '.' . $request->document->getClientOriginalExtension();
            $request->document->move(public_path('/storage/image_files/product/document'), $input['document']);
        }


        if($input['is_combo'] == 1) {
            $input['composition'] = implode(",", $input['composition']);
        }

        $input['product_for'] = implode(",", $input['product_for']);
        Product::create($input);
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
        $data = Product::findorFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $rules = [
            "product_name" => "required",
            "product_price" => "required|numeric",
            "competition_id" => "required",
            "study_id" => "required",
            "is_fisik" => "required",
            "product_for" => "required",
            "is_combo" => "required",
            "berat" => "required",
            "is_active" => "required"
        ];

        if($input['is_combo'] == 1) {
            $rules['composition'] = "required";
        }

       

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


        $product = Product::findorFail($id);

        $input['image'] = $product->image;
        $unik = uniqid();
        if ($request->hasFile('image')) {
            $input['image'] = Str::slug($unik, '-') . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/storage/image_files/product'), $input['image']);
        }


        $input['document'] = $product->document;
        $unik = uniqid();
        if ($request->hasFile('document')) {
            $input['document'] = Str::slug($unik, '-') . '.' . $request->document->getClientOriginalExtension();
            $request->document->move(public_path('/storage/image_files/product/document'), $input['document']);
        }


        if($input['is_combo'] == 1) {
            $input['composition'] = implode(",", $input['composition']);
        }

        $input['product_for'] = implode(",", $input['product_for']);
        $product->update($input);
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
       return  Product::destroy($id);
    }


    public function product_study(Request $request) {
        $input = $request->all();
        $data = Study::with('level','pelajaran')->where('competition_id', $input['id'])->get();
        return response()->json([
            "success" => true,
            "data" => $data
        ]);
    }

    public function product_table()
    {
        $data = Product::with('competition.study.pelajaran')->get();

        return DataTables::of($data)
            ->addColumn('is_active', function($data){
                if ($data->is_active == 1) {
                    return 'Active';
                } else {
                    return 'Not Active';
                }
            })
            ->addColumn('document', function($data){
                if($data->document_type == 'piagam' || $data->document_type == 'sertifikat') {
                    if($data->document !== null) {
                        return '<img class="product-image-table" src="'.asset('storage/image_files/product/document/'.$data->document).'">';
                    } else {
                        return '<span style="color:red;">gambar dokumen belum diisi</span>';
                    }
                   
                } else {
                    return $data->document_type;
                }
                
            })
            ->addColumn('is_combo', function($data){
                if($data->is_combo == 1) {
                    $product_ids = explode(",", $data->composition);
                    $html = '<ul>';
                    foreach($product_ids as $id) {
                        $pro = Product::where('id', $id);
                        if($pro->count() > 0) {
                            $html .= '<li>'.$pro->first()->product_name.'</li>';
                        } 
                    }
                    $html .='</ul>';

                    return '<strong>Bundle Product</strong> <br>'.$html;
                } else {
                    return 'Single Product';
                }
            })
            ->addColumn('product_for', function($data){
                $target = explode(",", $data->product_for);
                $html = "<ul>";
                foreach($target as $t) {
                    if($t == 1) {
                        $html .= '<li>Peraih Medali Emas</li>';
                    }
                    else if($t == 2) {
                        $html .= '<li>Peraih Medali Perak</li>';
                    }
                    else if($t == 3) {
                        $html .= '<li>Peraih Medali Perunggu</li>';
                    }
                    if($t == 0) {
                        $html .= '<li>Peserta Aktif</li>';
                    }
                }
                $html .='</ul>';
                return $html;

            })
            ->addColumn('is_fisik', function($data){
                if($data->is_fisik == 1) {
                    return 'Fisik';
                } else {
                    return 'Digital';
                }
            })
            ->addColumn('competition_id', function($data){
                return $data->competition->title ?? null;
            })
            ->addColumn('study_id', function($data){
                return $data->study->pelajaran->name.'<br>('.$data->study->level->level_name.')' ?? null;
            })
            ->addColumn('product_name', function($data){
                if($data->description == null) {
                    return $data->product_name;
                } else {
                    return $data->product_name.'<br>( '.$data->description.' )';
                }
            })
            ->addColumn('product_price', function($data){
                return number_format($data->product_price);
            })
            ->addColumn('image', function($data){
                if($data->image != null) {
                    return '<img class="product-image-table" src="'.asset('storage/image_files/product/'.$data->image).'">';
                }
                
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
            ->rawColumns(['action','product_name', 'image','product_for','is_combo','document','study_id'])
            ->addIndexColumn()
            ->make(true);
    }
}
