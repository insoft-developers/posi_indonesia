<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BonusClaimed;
use App\Models\Cart;
use App\Models\Competition;
use App\Models\CompetitionBonusProduct;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\ProductDocument;
use App\Models\Transaction;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $view = 'riwayat';
        $tanggal_sekarang = date('Y-m-d');
        $userid = Auth::user()->id;
        $sekarang = date('Y-m-d');
        $query = Competition::with('transaction', 'transaction.invoices', 'levels', 'transaction.study.pelajaran')->where('is_active', 1);

        $query->whereHas('transaction', function ($q) use ($userid) {
            $q->where('userid', $userid);
        });

        $query->whereHas('transaction.invoices', function ($q) use ($userid) {
          
            $q->where('payment_status', 1);
            $q->where('transaction_status', 1);
        });
        // $query->where('date', '<', $tanggal_sekarang);
       
        $com = $query->get();

        

        return view('frontend.riwayat', compact('view', 'com'));
    }

    public function bonus_claim(Request $request)
    {
        $input = $request->all();

        try {
            $bonus = CompetitionBonusProduct::where('competition_id', $input['comid'])->first();
            $status = Transaction::where('competition_id', $input['comid'])
                ->where('study_id', $input['study'])
                ->whereNull('product_id')
                ->where('userid', Auth::user()->id);
            if ($status->count() > 0) {
                $model = $status->first();

                if ($model->amount == 0 && $model->unit_price == 0) {
                    $product_list = explode(',', $bonus->free_register_product);
                    $premium = 0;
                } else {
                    $product_list = explode(',', $bonus->premium_register_product);
                    $premium = 1;
                }

                foreach ($product_list as $pl) {
                    $barang = Product::findorFail($pl);
                    if ($barang !== null) {
                        $data_cart = [
                            'userid' => Auth::user()->id,
                            'competition_id' => $input['comid'],
                            'study_id' => $input['study'],
                            'premium' => $premium,
                            'product_id' => $pl,
                            'type' => 1,
                            'quantity' => 1,
                            'unit_price' => 0,
                            'total_purchase' => 0,
                            'buyer' => Auth::user()->id,
                            'is_fisik' => $barang->is_fisik,
                            'berat' => $barang->berat
                        ];
                        Cart::create($data_cart);
                    }
                }

                BonusClaimed::create([
                    'userid' => Auth::user()->id,
                    'competition_id' => $input['comid'],
                    'study_id' => $input['study'],
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'success',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function facility_show(Request $request) {
        $input = $request->all();
        

        $transaction = Transaction::findorFail($input['transaction_id']);
        $invoice = Invoice::findorFail($transaction->invoice_id);

        if($invoice->payment_status == 1) {

            return response()->json([
                "success" => true,
                "message" => "success"
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Anda belum menyelesaikan pembayaran...!"
            ]);
        }
    }


    public function facility_file($transactionid, $productid) {
        $transaction = Transaction::findorFail($transactionid);
        $userid = $transaction->userid;
        

        if($userid !== Auth::user()->id) {
            return response()->json([
                "success" => false,
                "message" => "Anda tidak punya akses untuk membuka halaman ini!"
            ]);
        }

        $product = Product::findorFail($productid);
        $document = ProductDocument::where('competition_id', $transaction->competition_id)->where('product_id', $productid)->first();
        $file = $document->document;

        if($product->document_type == 'pembahasan') {
            $view = 'pembahasan';
            $ujian = Ujian::with('pembahasan','competition','study.pelajaran')->where('competition_id', $transaction->competition_id)
                ->where('study_id', $transaction->study_id)
                ->orderBy('id', 'asc')
                ->get();


            return view('frontend.pembahasan', compact('product','transaction', 'view', 'ujian'));
        } else {
            return view('frontend.cert', compact('product','transaction', 'file'));
        }


       
    }
}
