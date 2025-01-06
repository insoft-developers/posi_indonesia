<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\User;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    use HelperTrait;

    public function index()
    {
        $view = 'transaction';
        $transaction = Invoice::where('userid', Auth::user()->id)
            ->orderBy('payment_status', 'asc')
            ->get();
        return view('frontend.transaction', compact('view', 'transaction'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $invoice = 'INV-' . date('YmdHis') . $this->generate_number(6);

        try {
            $transaction = Cart::with('competition')
                ->where('userid', Auth::user()->id)
                ->get();

            $data_invoice = [
                'invoice' => $invoice,
                'userid' => Auth::user()->id,
                'total_amount' => 0,
                'payment_status' => 0,
                'transaction_status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'expired_time' => $this->tambah_jam(24, date('Y-m-d H:i:s')),
            ];
            $id = Invoice::insertGetId($data_invoice);

            $total_value = 0;
            foreach ($transaction as $t) {
                $total_value = $total_value + $t->competition->price;
                $item = new Transaction();
                $item->userid = Auth::user()->id;
                $item->invoice = $invoice;
                $item->invoice_id = $id;
                $item->competition_id = $t->competition_id;
                $item->study_id = $t->study_id;
                $item->amount = $t->competition->price;
                $item->is_fisik = 0;
                $item->created_at = date('Y-m-d H:i:s');
                $item->updated_at = date('Y-m-d H:i:s');
                $item->save();
            }

            Invoice::where('id', $id)->update([
                'total_amount' => $total_value,
            ]);

            Cart::where('userid', Auth::user()->id)->delete();

            return response()->json([
                'success' => true,
                'data' => 'Transaksi Berhasil',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function add_free_invoice(Request $request) {
        

        $input = $request->all();
        $invoice = 'INV-' . date('YmdHis') . $this->generate_number(6);

        try {
            $data_invoice = [
                'invoice' => $invoice,
                'userid' => Auth::user()->id,
                'total_amount' => 0,
                'payment_status' => 0,
                'transaction_status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'expired_time' => date('Y-m-d H:i:s'),
            ];
            $id = Invoice::insertGetId($data_invoice);

            $idss = explode(",", $input['id']);
            foreach ($idss as $index => $ids) {
                $item = new Transaction();
                $item->invoice = $invoice;
                $item->userid = Auth::user()->id;
                $item->invoice_id = $id;
                $item->competition_id = $input['compete_id'];
                $item->study_id = $ids;
                $item->amount = 0;
                $item->is_fisik = 0;
                $item->created_at = date('Y-m-d H:i:s');
                $item->updated_at = date('Y-m-d H:i:s');
                $item->save();
            }


            return response()->json([
                'success' => true,
                'data' => 'Transaksi Berhasil',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function online_payment(Request $request)
    {
        $input = $request->all();

        $transaction = Invoice::with('transaction.competition')
            ->where('id', $input['id'])
            ->where('payment_status', '!=', 1)
            ->first();

        if ($transaction->first()) {
            $invoice = $transaction->invoice;

            $total = $transaction->total_amount;
            $user = User::findorFail($transaction->userid);

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => $invoice . '_' . uniqid(),
                    'gross_amount' => $total,
                ],
                'customer_details' => [
                    'first_name' => $user->name,
                    'last_name' => ' - ' . $transaction->transaction[0]->competition->title,
                    'email' => $user->email,
                    'phone' => $user->whatsapp,
                ],
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return response()->json([
                'success' => true,
                'token' => $snapToken,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'token' => 'invoice tidak ada atau sudah dibayar',
            ]);
        }
    }

    public function callback(Request $request)
    {
        $server_key = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $server_key);

        if ($hashed == $request->signature_key) {
            $input = $request->all();
            $order_info = $input['order_id'];
            $order_id_array = explode('_', $order_info);
            $order_id = $order_id_array[0];
            $transaction = $input['transaction_status'];
            $type = $input['payment_type'];
            $fraud = $input['fraud_status'];

            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'accept') {
                        Invoice::where('invoice', $order_id)->update([
                            'payment_status' => 1,
                            'payment_amount' => $input['gross_amount'],
                            'transaction_status' => 1,
                            'payment_with' => $input['payment_type'] . '_' . $input['transaction_id'],
                            'payment_date' => date('Y-m-d H:i:s'),
                        ]);
                        echo 'Transaction order_id: ' . $order_id . ' successfully captured using ' . $type;
                    }
                }
            } elseif ($transaction == 'settlement') {
                Invoice::where('invoice', $order_id)->update([
                    'payment_status' => 1,
                    'payment_amount' => $input['gross_amount'],
                    'transaction_status' => 1,
                    'payment_with' => $input['payment_type'] . '_' . $input['transaction_id'],
                    'payment_date' => date('Y-m-d H:i:s'),
                ]);
                echo 'Transaction order_id: ' . $order_id . ' successfully transfered using ' . $type;
            } elseif ($transaction == 'pending') {
                Invoice::where('invoice', $order_id)->update([
                    'payment_status' => 0,
                    'payment_amount' => 0,
                    'transaction_status' => 2,
                    'payment_with' => 'pending',
                    'payment_date' => date('Y-m-d H:i:s'),
                ]);
                echo 'Waiting customer to finish transaction order_id: ' . $order_id . ' using ' . $type;
            } elseif ($transaction == 'deny') {
                Invoice::where('invoice', $order_id)->update([
                    'payment_status' => 0,
                    'payment_amount' => 0,
                    'transaction_status' => 3,
                    'payment_with' => 'deny',
                    'payment_date' => date('Y-m-d H:i:s'),
                ]);
                echo 'Payment using ' . $type . ' for transaction order_id: ' . $order_id . ' is denied.';
            } elseif ($transaction == 'expire') {
                Invoice::where('invoice', $order_id)->update([
                    'payment_status' => 0,
                    'payment_amount' => 0,
                    'transaction_status' => 4,
                    'payment_with' => 'expired',
                    'payment_date' => date('Y-m-d H:i:s'),
                ]);
                echo 'Payment using ' . $type . ' for transaction order_id: ' . $order_id . ' is expired.';
            } elseif ($transaction == 'cancel') {
                Invoice::where('invoice', $order_id)->update([
                    'payment_status' => 0,
                    'payment_amount' => 0,
                    'transaction_status' => 5,
                    'payment_with' => 'cancelled',
                    'payment_date' => date('Y-m-d H:i:s'),
                ]);
                echo 'Payment using ' . $type . ' for transaction order_id: ' . $order_id . ' is canceled.';
            }
        }
    }

    public function upload_bukti(Request $request)
    {
        $input = $request->all();

        $input['image'] = null;

        if ($request->hasFile('image')) {
            $input['image'] = Str::slug(time() . '-' . uniqid(), '-') . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/template/frontend/assets/bukti_transfer'), $input['image']);
        }

        $trans = Invoice::findorFail($input['transaction_id']);
        Invoice::where('invoice', $trans->invoice)->update([
            'image' => $input['image'],
        ]);

        return redirect()->back();
    }

    public function show_invoice($invoice)
    {
        $view = 'invoice';
        $setting = Setting::findorFail(1);
        $data = Invoice::with('user', 'transaction.competition.levels', 'transaction.study.pelajaran')->where('invoice', $invoice)->first();
        return view('frontend.invoice', compact('view', 'data', 'setting'));
    }
}
