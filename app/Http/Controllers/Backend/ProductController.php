<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Kelas;
use App\Models\Level;
use App\Models\Product;
use App\Models\ProductCompetition;
use App\Models\ProductDocument;
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
        $competition = Competition::all();
        $composition = Product::where('is_combo', '!=', 1)->get();
        return view('backend.masterdata.product', compact('view', 'competition', 'composition'));
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
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'image' => 'required',
            'is_fisik' => 'required',
            'product_for' => 'required',
            'is_combo' => 'required',
            'berat' => 'required',
            'is_active' => 'required',
            'competition_id' => 'required'
        ];

        if ($input['is_combo'] == 1) {
            $rules['composition'] = 'required';
        }

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

        $input['image'] = null;
        $unik = uniqid();
        if ($request->hasFile('image')) {
            $input['image'] = Str::slug($unik, '-') . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/storage/image_files/product'), $input['image']);
        }

        if ($input['is_combo'] == 1) {
            $input['composition'] = implode(',', $input['composition']);
        }

        $input['product_for'] = implode(',', $input['product_for']);

        $product = Product::create($input);

        $product_id = $product->id; 
        
        if(! empty($input['competition_id'])) {
            ProductCompetition::where('product_id', $product_id)->delete();
            $competition_ids = $input['competition_id'];
            foreach($competition_ids as $comid) {
                ProductCompetition::create([
                    "product_id" => $product_id,
                    "competition_id" => $comid
                ]);
            } 
        }

        
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
        $data = Product::with('product_competition')->find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $rules = [
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'is_fisik' => 'required',
            'product_for' => 'required',
            'is_combo' => 'required',
            'berat' => 'required',
            'is_active' => 'required',
            'competition_id' => 'required'
        ];

        if ($input['is_combo'] == 1) {
            $rules['composition'] = 'required';
        }

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

        $product = Product::findorFail($id);

        $input['image'] = $product->image;
        $unik = uniqid();
        if ($request->hasFile('image')) {
            $input['image'] = Str::slug($unik, '-') . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/storage/image_files/product'), $input['image']);
        }

        if ($input['is_combo'] == 1) {
            $input['composition'] = implode(',', $input['composition']);
        }

        $input['product_for'] = implode(',', $input['product_for']);
        $product->update($input);

        if(! empty($input['competition_id'])) {
            ProductCompetition::where('product_id', $id)->delete();
            $competition_ids = $input['competition_id'];
            foreach($competition_ids as $comid) {
                ProductCompetition::create([
                    "product_id" => $id,
                    "competition_id" => $comid
                ]);
            } 
        }

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
        
        ProductCompetition::where('product_id', $id)->delete();
        return Product::destroy($id);
    }

    public function product_study(Request $request)
    {
        $input = $request->all();
        $data = Study::with('level', 'pelajaran')->where('competition_id', $input['id'])->get();
        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function document_list(Request $request)
    {
        $input = $request->all();
        $doc = ProductDocument::with('competition')->where('product_id', $input['id'])->get();

        $html = '';
        $html .= '<table class="table table-striped">';
        $html .= '<tr>';
        $html .= '<th>#</th>';
        $html .= '<th>Action</th>';
        $html .= '<th>Kompetisi</th>';
        $html .= '<th>Dokument</th>';
        $html .= '</tr>';
        if ($doc->count() > 0) {
            foreach ($doc as $nomor => $d) {
                $nomor++;
                $html .= '<tr>';
                $html .= '<td>'.$nomor.'</td>';
                $html .=
                '<td><a onclick="editDocument(' .
                $d->id .
                ')" href="javascript:void(0)" class="w-32-px h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="lucide:edit"></iconify-icon>
                </a>
                <a onclick="deleteDocument(' .
                $d->id .
                ', '.$d->product_id.')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a></td>';
               
                $html .= '<td>'.$d->competition->title ?? null.'</td>';
                if($d->document !== null) {
                    $html .= '<td><a href="'.asset('/storage/image_files/product/document/'.$d->document).'" target="_blank"><img class="doc-images" src="'.asset('/storage/image_files/product/document/'.$d->document).'"></a></td>';
                } else {
                    $html .= '<td>No Image</td>';
                }
               
                $html .= '</tr>';
            }
        } else {
        }

        $html .= '</table>';

        return $html;
    }

    public function simpan_document(Request $request)
    {
        $input = $request->all();
        $rules = [
            'product_id' => 'required',
            'competition_id' => 'required',
            'document' => 'required',
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

        


        $input['document'] = null;
        $unik = uniqid();
        if ($request->hasFile('document')) {
            $input['document'] = Str::slug($unik, '-') . '.' . $request->document->getClientOriginalExtension();
            $request->document->move(public_path('/storage/image_files/product/document'), $input['document']);
        }

        ProductDocument::create($input);
        return response()->json([
            'success' => true,
            'message' => 'success',
        ]);
    }



    public function update_document(Request $request)
    {
        $input = $request->all();
        
       
        $rules = [
            'document_id' => 'required',
            'product_id' => 'required',
            'competition_id' => 'required',
            
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

        $data = ProductDocument::findorFail($input['document_id']);

        $input['document'] = $data->document;
        $unik = uniqid();
        if ($request->hasFile('document')) {
            $input['document'] = Str::slug($unik, '-') . '.' . $request->document->getClientOriginalExtension();
            $request->document->move(public_path('/storage/image_files/product/document'), $input['document']);
        }

        $data->update($input);
        return response()->json([
            'success' => true,
            'message' => 'success',
        ]);
    }

    public function document_delete (Request $request) {
        $input = $request->all();
        $data = ProductDocument::destroy($input['id']);
        return $data;
    }


    public function document_edit($id) {
        $data = ProductDocument::findorFail($id);
        return $data;
    }

    public function product_table()
    {
        $data = Product::all();

        return DataTables::of($data)
            ->addColumn('competition_id', function($data){
               
                if($data->product_competition == null) {
                    return '';
                } else {
                    $html = '';
                    $html .= '<ul>';
                    foreach($data->product_competition as $pd) {
                        $html .= '<li> - '.$pd->competition->title.'</li>';
                    }
                    $html .= '</ul>';
                    return $html;
                }
               
            })
            ->addColumn('document_type', function ($data) {
                return strtoupper($data->document_type);
            })
            ->addColumn('is_active', function ($data) {
                if ($data->is_active == 1) {
                    return 'Active';
                } else {
                    return 'Not Active';
                }
            })

            ->addColumn('is_combo', function ($data) {
                if ($data->is_combo == 1) {
                    $product_ids = explode(',', $data->composition);
                    $html = '<ul>';
                    foreach ($product_ids as $id) {
                        $pro = Product::where('id', $id);
                        if ($pro->count() > 0) {
                            $html .= '<li>' . $pro->first()->product_name . '</li>';
                        }
                    }
                    $html .= '</ul>';

                    return '<strong>Bundle Product</strong> <br>' . $html;
                } else {
                    return 'Single Product';
                }
            })
            ->addColumn('product_for', function ($data) {
                $target = explode(',', $data->product_for);
                $html = '<ul>';
                foreach ($target as $t) {
                    if ($t == 1) {
                        $html .= '<li>Peraih Medali Emas</li>';
                    } elseif ($t == 2) {
                        $html .= '<li>Peraih Medali Perak</li>';
                    } elseif ($t == 3) {
                        $html .= '<li>Peraih Medali Perunggu</li>';
                    }
                    if ($t == 0) {
                        $html .= '<li>Peserta Aktif</li>';
                    }
                }
                $html .= '</ul>';
                return $html;
            })
            ->addColumn('is_fisik', function ($data) {
                if ($data->is_fisik == 1) {
                    return 'Fisik';
                } else {
                    return 'Digital';
                }
            })

            ->addColumn('product_name', function ($data) {
                if ($data->description == null) {
                    return $data->product_name;
                } else {
                    return $data->product_name . '<br>( ' . $data->description . ' )';
                }
            })
            ->addColumn('product_price', function ($data) {
                return number_format($data->product_price);
            })
            ->addColumn('image', function ($data) {
                if ($data->image != null) {
                    return '<img class="product-image-table" src="' . asset('storage/image_files/product/' . $data->image) . '">';
                }
            })
            ->addColumn('action', function ($data) {
                $btn = '';
                if ($data->document_type == null) {
                } else {
                    $btn .=
                        '<a title="tambah file dokumen" onclick="documentData(' .
                        $data->id .
                        ')" href="javascript:void(0)" class="w-32-px h-32-px bg-info-focus text-info-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="material-symbols:lab-profile-sharp"></iconify-icon>
                </a>';
                }

                $btn .=
                    '<a onclick="editData(' .
                    $data->id .
                    ')" href="javascript:void(0)" class="w-32-px h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="lucide:edit"></iconify-icon>
                </a>';
                $btn .=
                    '<a onclick="deleteData(' .
                    $data->id .
                    ')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a>';

                return $btn;
            })
            ->rawColumns(['action', 'product_name', 'image', 'product_for', 'is_combo','competition_id'])
            ->addIndexColumn()
            ->make(true);
    }
}
