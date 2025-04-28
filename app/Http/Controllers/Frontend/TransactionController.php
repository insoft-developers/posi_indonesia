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
use Illuminate\Support\Facades\Validator;
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

        $trans = Cart::where('buyer', Auth::user()->id)->where('is_fisik', 1);
        if ($trans->count() > 0) {
            $rules = [
                'province_id' => 'required',
                'city_id' => 'required',
                'district_id' => 'required',
                'kurir' => 'required',
                'layanan' => 'required',
                'alamat' => 'required',
                'receiver_name' => 'required',
                'receiver_phone' => 'required'
            ];

            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Silahkan Lengkapi data pengiriman anda!',
                ]);
            }
        }

        $invoice = 'INV-' . date('YmdHis') . $this->generate_number(6);
        try {
            $transaction = Cart::where('buyer', Auth::user()->id)->get();

            $data_invoice = [
                'invoice' => $invoice,
                'userid' => Auth::user()->id,
                'total_amount' => 0,
                'payment_status' => 0,
                'transaction_status' => 0,
                'buyer' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'expired_time' => $this->tambah_jam(24, date('Y-m-d H:i:s')),
            ];

            if ($trans->count() > 0) {
                $data_invoice['berat'] = $trans->sum('berat');
                $data_invoice['province_id'] = $input['province_id'];
                $data_invoice['city_id'] = $input['city_id'];
                $data_invoice['district_id'] = $input['district_id'];
                $data_invoice['province_name'] = $input['province_name'];
                $data_invoice['city_name'] = $input['city_name'];
                $data_invoice['district_name'] = $input['district_name'];
                $data_invoice['kurir'] = $input['kurir'];
                $data_invoice['service'] = $input['layanan'];
                $data_invoice['delivery_cost'] = $input['delivery_cost'];
                $data_invoice['address'] = $input['alamat'];
                $data_invoice['reeiver_name'] = $input['receiver_name'] ?? null;
                $data_invoice['receiver_phone'] = $input['receiver_phone'] ?? null;
            }
            $id = Invoice::insertGetId($data_invoice);

            $total_value = 0;
            foreach ($transaction as $t) {
                $total_value = $total_value + $t->total_purchase;
                $item = new Transaction();
                $item->userid = $t->userid;
                $item->invoice = $invoice;
                $item->invoice_id = $id;
                $item->competition_id = $t->competition_id;
                $item->study_id = $t->study_id;
                $item->amount = $t->total_purchase;
                $item->is_fisik = $t->is_fisik;
                $item->product_id = $t->product_id;
                $item->quantity = $t->quantity;
                $item->unit_price = $t->unit_price;
                $item->type = $t->type;
                $item->buyer = Auth::user()->id;
                $item->created_at = date('Y-m-d H:i:s');
                $item->updated_at = date('Y-m-d H:i:s');
                $item->save();
            }

            Invoice::where('id', $id)->update([
                'total_amount' => $total_value,
                'grand_total' => $request->delivery_cost == null ? $total_value : $total_value + (int) $input['delivery_cost'],
            ]);

            Cart::where('buyer', Auth::user()->id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Transaksi Berhasil',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function add_free_invoice(Request $request)
    {
        $input = $request->all();

        $invoice = 'INV-' . date('YmdHis') . $this->generate_number(6);

        try {
            $data_invoice = [
                'invoice' => $invoice,
                'userid' => Auth::user()->id,
                'total_amount' => 0,
                'payment_status' => 0,
                'transaction_status' => 0,
                'buyer' => Auth::user()->id,
                'grand_total' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'expired_time' => date('Y-m-d H:i:s'),
            ];

            $input['file1'] = null;
            $unik = uniqid();
            if ($request->hasFile('file1')) {
                $input['file1'] = Str::slug($unik, '-') . '.' . $request->file1->getClientOriginalExtension();
                $request->file1->move(public_path('/storage/image_files/pendaftaran'), $input['file1']);
            }

            $input['file2'] = null;
            $unik = uniqid();
            if ($request->hasFile('file2')) {
                $input['file2'] = Str::slug($unik, '-') . '.' . $request->file2->getClientOriginalExtension();
                $request->file2->move(public_path('/storage/image_files/pendaftaran'), $input['file2']);
            }


            $input['file3'] = null;
            $unik = uniqid();
            if ($request->hasFile('file3')) {
                $input['file3'] = Str::slug($unik, '-') . '.' . $request->file3->getClientOriginalExtension();
                $request->file3->move(public_path('/storage/image_files/pendaftaran'), $input['file3']);
            }

            $data_invoice = [
                'invoice' => $invoice,
                'userid' => Auth::user()->id,
                'total_amount' => 0,
                'payment_status' => 0,
                'transaction_status' => 0,
                'buyer' => Auth::user()->id,
                'grand_total' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'expired_time' => date('Y-m-d H:i:s'),
                'file1' => $input['file1'],
                'file2' => $input['file2'],
                'file3' => $input['file3'],
            ];

            $id = Invoice::insertGetId($data_invoice);

            $idss = explode(',', $input['id']);
            foreach ($idss as $index => $ids) {
                $item = new Transaction();
                $item->invoice = $invoice;
                $item->userid = $input['userid'];
                $item->invoice_id = $id;
                $item->competition_id = $input['compete_id'];
                $item->study_id = $ids;
                $item->amount = 0;
                $item->is_fisik = 0;
                $item->type = 0;
                $item->unit_price = 0;
                $item->quantity = 1;
                $item->buyer = Auth::user()->id;
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

        $transaction = Invoice::with('transaction.competition')->where('id', $input['id'])->where('payment_status', '!=', 1)->first();

        if ($transaction->first()) {
            $invoice = $transaction->invoice;

            $total = $transaction->grand_total;
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
        $data = Invoice::with('user', 'transaction.competition.levels', 'transaction.study.pelajaran', 'transaction.tuser')->where('invoice', $invoice)->first();
        return view('frontend.invoice', compact('view', 'data', 'setting'));
    }
}
