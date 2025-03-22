<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'order';
        return view('backend.transaction.order', compact('view'));
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

    public function order_table(Request $request)
    {
        $input = $request->all();

        $query = Transaction::whereNotNull('product_id');
        if (!empty($input['payment_status'])) {
            if ($input['payment_status'] == 1) {
                $query->whereHas('invoices', function ($q) {
                    $q->where('payment_status', 1);
                });
            } else {
                $query->whereHas('invoices', function ($q) {
                    $q->where('payment_status', 0);
                });
            }
        }

        if (!empty($input['date_from']) && !empty($input['date_to'])) {
            $time_begin = '00:00:01';
            $time_end = '23:59:59';

            $waktu_awal = $input['date_from'] . ' ' . $time_begin;
            $waktu_akhir = $input['date_to'] . ' ' . $time_end;

            $query->where('created_at', '>=', $waktu_awal)->where('created_at', '<=', $waktu_akhir);
        }

        $data = $query->get();

        return DataTables::of($data)
            ->addColumn('status', function ($data) {
                if ($data->invoices->payment_status == 1) {
                    return 'PAID';
                } else {
                    return 'NOT PAID';
                }
            })
            ->addColumn('order_date', function ($data) {
                return date('d-m-Y H:i', strtotime($data->created_at));
            })
            ->addColumn('payment_date', function ($data) {
                if ($data->invoices->payment_date == null) {
                    return '';
                } else {
                    return date('d-m-Y H:i', strtotime($data->invoices->payment_date));
                }
            })
            ->addColumn('userid', function ($data) {
                return $data->userid;
            })
            ->addColumn('name', function ($data) {
                return $data->tuser->name ?? null;
            })
            ->addColumn('email', function ($data) {
                return $data->tuser->email ?? null;
            })
            ->addColumn('user_hp', function ($data) {
                return $data->tuser->whatsapp ?? null;
            })
            ->addColumn('level_id', function ($data) {
                return $data->tuser->level->level_name ?? null;
            })
            ->addColumn('kelas_id', function ($data) {
                return $data->tuser->kelas->nama_kelas ?? null;
            })
            ->addColumn('province', function ($data) {
                return $data->tuser->district->province_name ?? null;
            })
            ->addColumn('school_name', function ($data) {
                return $data->tuser->nama_sekolah ?? null;
            })
            ->addColumn('competition_id', function ($data) {
                return $data->competition->title ?? null;
            })
            ->addColumn('study_id', function ($data) {
                return $data->study->pelajaran->name ?? null;
            })
            ->addColumn('medali', function ($data) {
                return $data->session($data->competition_id, $data->study_id, $data->userid)->medali ?? null;
            })
            ->addColumn('nilai', function ($data) {
                return $data->session($data->competition_id, $data->study_id, $data->userid)->total_score ?? null;
            })
            ->addColumn('grade', function ($data) {
                return $data->session($data->competition_id, $data->study_id, $data->userid)->nilai ?? null;
            })
            ->addColumn('product_id', function ($data) {
                return $data->product_id;
            })
            ->addColumn('product_name', function ($data) {
                return $data->product->product_name ?? null;
            })
            ->addColumn('composition', function ($data) {
                if ($data->product->is_combo == 1) {
                    $prod_array = explode(',', $data->product->composition);
                    $html = '<ul>';
                    foreach ($prod_array as $parr) {
                        $p = Product::find($parr);
                        if ($p !== null) {
                            $html .= '<li> - ' . $p->product_name . '</li>';
                        }
                    }
                    $html .= '</ul>';

                    return $html;
                } else {
                    return $data->product->product_name ?? null;
                }
            })
            ->addColumn('quantity', function ($data) {
                return $data->quantity;
            })
            ->addColumn('unit_price', function ($data) {
                return number_format($data->unit_price);
            })
            ->addColumn('total_price', function ($data) {
                return number_format($data->amount);
            })
            ->addColumn('pemesan', function ($data) {
                return $data->muser->name ?? null;
            })
            ->addColumn('email_pemesan', function ($data) {
                return $data->muser->email ?? null;
            })
            ->addColumn('hp_pemesan', function ($data) {
                return $data->muser->whatsapp ?? null;
            })
            ->addColumn('ongkos_kirim', function ($data) {
                return $data->invoices->delivery_cost == null ? null : number_format($data->invoices->delivery_cost);
            })

            ->addColumn('province_name', function ($data) {
                return $data->invoices->province_name ?? null;
            })
            ->addColumn('city_name', function ($data) {
                return $data->invoices->city_name ?? null;
            })
            ->addColumn('district_name', function ($data) {
                return $data->invoices->district_name ?? null;
            })
            ->addColumn('kurir', function ($data) {
                return $data->invoices->kurir ?? null;
            })
            ->addColumn('service', function ($data) {
                return $data->invoices->service ?? null;
            })
            ->addColumn('service', function ($data) {
                return $data->invoices->service ?? null;
            })
            ->addColumn('address', function ($data) {
                return $data->invoices->address ?? null;
            })
            ->addColumn('nama_penerima', function ($data) {
                return $data->invoices->receiver_name ?? null;
            })
            ->addColumn('hp_penerima', function ($data) {
                return $data->invoices->receiver_phone ?? null;
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
            ->rawColumns(['action', 'status', 'composition'])
            ->addIndexColumn()
            ->make(true);
    }
}
