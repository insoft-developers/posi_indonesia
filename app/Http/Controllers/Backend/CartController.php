<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'cart';
        return view('backend.transaction.cart', compact('view'));
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
        $data = Cart::destroy($id);
        return $data;
    }

    public function cart_table()
    {
        $data = Cart::with('pemesan','competition','study')->get();

        return DataTables::of($data)
            ->addColumn('created_at', function($data){
                return date('d-m-Y', strtotime($data->created_at));
            })
            ->addColumn('buyer', function($data){
                return $data->pemesan == null ? null : $data->pemesan->name;
            })
            ->addColumn('competition_id', function($data){
                return $data->competition == null ? null : $data->competition->title;
            })
            ->addColumn('study_id', function($data){
                return $data->study == null ? null : $data->study->pelajaran->name;
            })
            ->addColumn('product_id', function($data){
                return $data->product == null ? null : $data->product->product_name;
            })
            ->addColumn('unit_price', function($data){
                return number_format($data->unit_price);
            })
            ->addColumn('total_purchase', function($data){
                return number_format($data->total_purchase);
            })
            ->addColumn('userid', function($data){
                return $data->user == null ? null : $data->user->name;
            })
            ->addColumn('action', function ($data) {
                return '
                
                <a onclick="deleteData('.$data->id.')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a>';

                // <a onclick="editData('.$data->id.')" href="javascript:void(0)" class="w-32-px h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                //   <iconify-icon icon="lucide:edit"></iconify-icon>
                // </a>
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
