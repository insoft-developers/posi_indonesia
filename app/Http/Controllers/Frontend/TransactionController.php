<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
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
        $transaction = Transaction::where('userid', Auth::user()->id)
            ->groupBy('invoice')
            
            ->orderBy('payment_status','asc')
            ->get();
        return view('frontend.transaction', compact('view', 'transaction'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $invoice = 'INV-' . date('YmdHis') . $this->generate_number(6);

        try {
            $transaction = Cart::where('userid', Auth::user()->id)
                ->groupBy('competition_id')
                ->get();

            foreach ($transaction as $t) {
                $data_transaction = [
                    'invoice' => $invoice,
                    'competition_id' => $t->competition_id,
                    'amount' => $t->competition->price,
                    'userid' => Auth::user()->id,
                    'payment_status' => 0,
                    'is_fisik' => 0,
                    'transaction_status' => 0,
                    'is_premium' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'expired_date' => $this->tambah_jam(24, date('Y-m-d H:i:s')),
                ];
                $id = Transaction::insertGetId($data_transaction);
                $items = Cart::where('userid', Auth::user()->id)
                    ->where('competition_id', $t->competition_id)
                    ->get();
                foreach ($items as $item) {
                    $i = new TransactionItem();
                    $i->transaction_id = $id;
                    $i->userid = Auth::user()->id;
                    $i->study_id = $item->study_id;
                    $i->save();
                }
            }

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

    public function online_payment(Request $request)
    {
        $input = $request->all();
        $transaction = Transaction::findorFail($input['id']);
        $invoice = $transaction->invoice;

        $total = Transaction::where('invoice', $invoice)->sum('amount');
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
                'last_name' => '',
                'email' => $user->email,
                'phone' => $user->whatsapp,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return response()->json([
            'success' => true,
            'token' => $snapToken,
        ]);
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
                        Transaction::where('invoice', $order_id)->update([
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
                Transaction::where('invoice', $order_id)->update([
                    'payment_status' => 1,
                    'payment_amount' => $input['gross_amount'],
                    'transaction_status' => 1,
                    'payment_with' => $input['payment_type'] . '_' . $input['transaction_id'],
                    'payment_date' => date('Y-m-d H:i:s'),
                ]);
                echo 'Transaction order_id: ' . $order_id . ' successfully transfered using ' . $type;
            } elseif ($transaction == 'pending') {
                Transaction::where('invoice', $order_id)->update([
                    'payment_status' => 0,
                    'payment_amount' => 0,
                    'transaction_status' => 2,
                    'payment_with' => 'pending',
                    'payment_date' => date('Y-m-d H:i:s'),
                ]);
                echo 'Waiting customer to finish transaction order_id: ' . $order_id . ' using ' . $type;
            } elseif ($transaction == 'deny') {
                Transaction::where('invoice', $order_id)->update([
                    'payment_status' => 0,
                    'payment_amount' => 0,
                    'transaction_status' => 3,
                    'payment_with' => 'deny',
                    'payment_date' => date('Y-m-d H:i:s'),
                ]);
                echo 'Payment using ' . $type . ' for transaction order_id: ' . $order_id . ' is denied.';
            } elseif ($transaction == 'expire') {
                Transaction::where('invoice', $order_id)->update([
                    'payment_status' => 0,
                    'payment_amount' => 0,
                    'transaction_status' => 4,
                    'payment_with' => 'expired',
                    'payment_date' => date('Y-m-d H:i:s'),
                ]);
                echo 'Payment using ' . $type . ' for transaction order_id: ' . $order_id . ' is expired.';
            } elseif ($transaction == 'cancel') {
                Transaction::where('invoice', $order_id)->update([
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


    public function upload_bukti(Request $request) {
        $input = $request->all();

        $input['image'] = null;

        if($request->hasFile('image')){
            $input['image'] = Str::slug(time().'-'.uniqid(), '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/template/frontend/assets/bukti_transfer'), $input['image']);
        }

        $trans = Transaction::findorFail($input['transaction_id']);
        Transaction::where('invoice', $trans->invoice)->update([
            "image" => $input['image']
        ]);

        return redirect()->back();
    }
}


