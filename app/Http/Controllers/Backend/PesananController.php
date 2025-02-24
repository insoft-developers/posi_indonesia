<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Invoice;
use App\Models\Kelas;
use App\Models\Level;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class PesananCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'pesanan';
        return view('backend.transaction.pesanan', compact('view'));
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
    public function store(Request $request) {}

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
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Transaction::where('invoice_id', $id)->delete();
        return Invoice::destroy($id);
    }

    public function transaction_list(Request $request)
    {
        $input = $request->all();
        $id = $input['id'];
        $trans = Transaction::where('invoice_id', $id)->get();

        $invoice = Invoice::findorFail($id);

        $html = '';

        $html .= '<table class="table table-bordered table-striped">';
        $html .= '<tr>';
        $html .= '<td>INVOICE</td>';
        $html .= '<td>:</td>';
        $html .= '<td>' . $invoice->invoice . '</td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td>Payment Status</td>';
        $html .= '<td>:</td>';
        if ($invoice->payment_status == 1) {
            $html .= '<td><span class="badge text-sm fw-semibold bg-dark-success-gradient px-20 py-9 radius-4 text-white">PAID/APPROVED</span></td>';
        } else {
            $html .= '<td><span class="badge text-sm fw-semibold bg-dark-danger-gradient px-20 py-9 radius-4 text-white">UNPAID/NOT APPROVED</span></td>';
        }

        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td>Jenis Pendaftaran</td>';
        $html .= '<td>:</td>';
        if ($invoice->grand_total > 0) {
            $html .= '<td><span class="badge text-sm fw-semibold bg-dark-warning-gradient px-20 py-9 radius-4 text-white">BERBAYAR</span></td>';
        } else {
            $html .= '<td><span class="badge text-sm fw-semibold bg-dark-default-gradient px-20 py-9 radius-4 text-black">GRATIS</span></td>';
        }
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td>Transaction Status</td>';
        $html .= '<td>:</td>';
        if ($invoice->transaction_status == 1) {
            $html .= '<td><span class="badge text-sm fw-semibold bg-dark-warning-gradient px-20 py-9 radius-4 text-white">PROCESS..</span></td>';
        } else {
            $html .= '<td><span class="badge text-sm fw-semibold bg-dark-danger-gradient px-20 py-9 radius-4 text-white">OUTSTANDING</span></td>';
        }

        if (!empty($invoice->file1)) {
            $html .= '<tr>';
            $html .= '<td>Follow Instagram @posi.idn</td>';
            $html .= '<td>:</td>';
            $html .= '<td><img class="img-responsive" src="' . asset('/storage/image_files/pendaftaran/' . $invoice->file1) . '"></td>';
            $html .= '</tr>';
        }

        if (!empty($invoice->file2)) {
            $html .= '<tr>';
            $html .= '<td>Unduh aplikasi Posi di Playstore</td>';
            $html .= '<td>:</td>';
            $html .= '<td><img class="img-responsive" src="' . asset('/storage/image_files/pendaftaran/' . $invoice->file2) . '"></td>';
            $html .= '</tr>';
        }

        if (!empty($invoice->file3)) {
            $html .= '<tr>';
            $html .= '<td>Komen pendapat posiitf kamu tentang POSI<br>kemudian tag 5 teman kamu di positingan ini.</td>';
            $html .= '<td>:</td>';
            $html .= '<td><img class="img-responsive" src="' . asset('/storage/image_files/pendaftaran/' . $invoice->file3) . '"></td>';
            $html .= '</tr>';
        }

        if (!empty($invoice->image)) {
            $html .= '<tr>';
            $html .= '<td>Bukti Transfer Manual</td>';
            $html .= '<td>:</td>';
            $html .= '<td><img class="img-responsive" src="' . asset('/template/frontend/assets/bukti_transfer/' . $invoice->image) . '"></td>';
            $html .= '</tr>';
        }
        $html .= '<tr>';
        $html .= '<td>PAYMENT WITH</td>';
        $html .= '<td>:</td>';
        $html .= '<td>' . $invoice->payment_with . '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>PAYMENT AMOUNT</td>';
        $html .= '<td>:</td>';
        $html .= '<td>' . number_format($invoice->payment_amount) . '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>PAYMENT DATE</td>';
        $html .= '<td>:</td>';
        $html .= '<td>' . $invoice->payment_date . '</td>';
        $html .= '</tr>';

        $html .= '</table>';

        $html .= '<div class="table-responsive">';
        $html .= '<table id="table-detail-transaksi" class="table table-bordered">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th scope="col">Peserta</th>';

        $html .= '<th scope="col">Kompetisi</th>';
        $html .= '<th scope="col">Bidang Pelajaran</th>';
        $html .= '<th scope="col">Harga</th>';
        $html .= '<th scope="col">Bentuk</th>';
        $html .= '<th scope="col">Produk</th>';
        $html .= '<th scope="col">Jumlah</th>';
        $html .= '<th scope="col">Total</th>';
        $html .= '<th scope="col">Pemesan</th>';
        $html .= '<th scope="col">Tanggal</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        $total_harga = 0;
        $is_fisik = 0;
        foreach ($trans as $t) {
            $total_harga = $total_harga + $t->amount;
            $is_fisik = $is_fisik + $t->is_fisik;
            $html .= '<tr>';
            $html .= '<td>' . $t->tuser->name . '</td>';

            $html .= '<td>' . $t->competition->title . '</td>';
            $html .= '<td>' . $t->study->pelajaran->name . ' - ' . $t->study->level->level_name . '</td>';
            $html .= '<td>' . number_format($t->unit_price) . '</td>';
            if ($t->is_fisik == 1) {
                $html .= '<td>Fisik</td>';
            } else {
                $html .= '<td>Digital</td>';
            }

            if ($t->product !== null) {
                $html .= '<td>' . $t->product->product_name . '</td>';
            } else {
                $html .= '<td></td>';
            }

            $html .= '<td>' . $t->quantity . '</td>';
            $html .= '<td>' . number_format($t->amount) . '</td>';
            $html .= '<td>' . $t->muser->name . '</td>';
            $html .= '<td>' . date('d-m-Y', strtotime($t->created_at)) . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody>';
        $html .= '<tr><th colspan="4" rowspan="3">' . $invoice->province_name . '<br>' . $invoice->city_name . '<br>' . $invoice->district_name . '<br>' . $invoice->kurir . '<br>' . $invoice->service . '<th colspan="4" style="text-align:right;">SUBTOTAL</th><th>' . number_format($total_harga) . '</th><th></th></tr>';
        $html .= '<th colspan="4" style="text-align:right;">DELIVERY COST</th><th>' . number_format($invoice->delivery_cost) . '</th><th></th></tr>';
        $html .= '<th colspan="4" style="text-align:right;">GRAND TOTAL</th><th>' . number_format($total_harga + $invoice->delivery_cost) . '</th><th></th></tr>';

        $html .= '</table>';
        $html .= '</div>';

        $data['data'] = $html;
        $data['invoice'] = $invoice;
        return $data;
    }

    public function transaction_approve(Request $request)
    {
        $input = $request->all();
        $invoice = Invoice::findorFail($input['id']);

        $data = Invoice::where('id', $input['id'])->update([
            'payment_status' => 1,
            'transaction_status' => 1,
            'payment_with' => 'admin-payment',
            'payment_date' => date('Y-m-d H:i:s'),
            'payment_amount' => $invoice->total_amount,
        ]);

        return $data;
    }

    public function transaction_reset(Request $request)
    {
        $input = $request->all();
        $invoice = Invoice::findorFail($input['id']);

        $data = Invoice::where('id', $input['id'])->update([
            'payment_status' => 0,
            'transaction_status' => 0,
            'payment_with' => null,
            'payment_date' => null,
            'payment_amount' => 0,
        ]);

        return $data;
    }

    public function bulk_approve(Request $request)
    {
        $input = $request->all();
        $ids = json_decode(stripslashes($input['id']));

        foreach ($ids as $id) {
            $invoice = Invoice::findorFail($id);

            $data = Invoice::where('id', $id)->update([
                'payment_status' => 1,
                'transaction_status' => 1,
                'payment_with' => 'admin-payment',
                'payment_date' => date('Y-m-d H:i:s'),
                'payment_amount' => $invoice->total_amount,
            ]);
        }

        return $data;
    }

    public function pesanan_table()
    {
        $data = Invoice::with('user')->get();

        return DataTables::of($data)
            ->addColumn('invoice', function($data){
                if($data->total_amount > 0) {
                    return $data->invoice.'<br>(Berbayar)';
                } else {
                    return $data->invoice.'<br>(Gratis)';
                }
            })
            ->addColumn('id', function ($data) {
                return '<div class="form-check"><input class="form-check-input" type="checkbox" id="id" data-id="' . $data->id . '" ></div>';
            })
            ->addColumn('created_at', function ($data) {
                return date('d-m-Y', strtotime($data->created_at));
            })
          
            ->addColumn('userid', function ($data) {
                return $data->user->name ?? null;
            })
            ->addColumn('buyer', function ($data) {
                return $data->pemesan->name ?? null;
            })
            ->addColumn('total_amount', function ($data) {
                return number_format($data->total_amount);
            })
            ->addColumn('delivery_cost', function ($data) {
                return number_format($data->delivery_cost);
            })
            ->addColumn('grand_total', function ($data) {
                return number_format($data->grand_total);
            })
           
            ->addColumn('payment_status', function ($data) {
                if ($data->payment_status == 1) {
                    return '<span class="badge text-sm fw-semibold bg-dark-success-gradient px-20 py-9 radius-4 text-white">PAID</span>';
                } else {
                    return '<span class="badge text-sm fw-semibold bg-dark-danger-gradient px-20 py-9 radius-4 text-white">UNPAID</span>';
                }
            })
            ->addColumn('transaction_status', function ($data) {
                if ($data->transaction_status == 1) {
                    return '<span class="badge text-sm fw-semibold bg-dark-warning-gradient px-20 py-9 radius-4 text-white">PROCESS</span>';
                } else {
                    return '<span class="badge text-sm fw-semibold bg-dark-danger-gradient px-20 py-9 radius-4 text-white">UNPAID</span>';
                }
            })
            ->addColumn('action', function ($data) {
                return '
                <a onclick="detailData(' .
                    $data->id .
                    ')" title="Bidang Studi" href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="material-symbols:library-books-outline-rounded"></iconify-icon>
                </a>
                
                <a onclick="deleteData(' .
                    $data->id .
                    ')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a>';
            })
            ->rawColumns(['action', 'payment_status', 'transaction_status', 'id','invoice'])
            ->addIndexColumn()
            ->make(true);
    }
}
