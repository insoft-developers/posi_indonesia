<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Competition;
use App\Models\ExamSession;
use App\Models\Invoice;
use App\Models\Pengumuman;
use App\Models\Product;
use App\Models\Study;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $view = 'jadwal';

        $tanggal_sekarang = date('Y-m-d');
        $userid = Auth::user()->id;
        $query = Competition::with([
            'transaction' => function ($q) use ($userid) {
                $q->where('userid', $userid);
                $q->orderBy('study_id', 'asc');
            },
            'transaction.invoices',
            'transaction.study.pelajaran',
        ]);
       
        $query->whereHas('transaction', function($q) use ($userid){
            $q->where('userid', $userid);
        });
        $query->where('is_active', 1);

        $data = $query->get();

        $sekarang = date('Y-m-d');
        // $umum = Competition::with('study.pelajaran', 'levels')->where('is_active', 1)->get();
        $umum = Pengumuman::where('is_status', 2)->groupBy('competition_id')->orderBy('id', 'desc')->get();

        return view('frontend.jadwal', compact('view', 'data', 'umum'));
    }

    public function show_pengumuman(Request $request)
    {
        $input = $request->all();

        $pengumuman = Pengumuman::find($input['hasilid']);

        $com = Competition::find($pengumuman->competition_id);
        // $study = Study::with('pelajaran', 'level')->where('id', $input['study'])->first();
        $study = [];

        $data = ExamSession::with('user.wilayah')->where('hitung_id', $input['hasilid'])->orderBy('total_score', 'desc')->get();

        return response()->json([
            'data' => $data,
            'com' => $com,
            'study' => $study,
        ]);
    }

    public function search_pengumuman(Request $request)
    {
        $input = $request->all();
        $keyword = $input['search'];
        $pengumuman = Pengumuman::find($input['hasilid']);

        $com = Competition::find($pengumuman->competition_id);
        // $study = Study::with('pelajaran', 'level')->where('id', $input['study'])->first();
        $study = [];

        $query = ExamSession::with('user.wilayah')->where('hitung_id', $input['hasilid'])->orderBy('total_score', 'desc');

        if (!empty($keyword)) {
            $query->whereHas('user', function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%');
            });
        }

        $data = $query->get();

        return response()->json([
            'data' => $data,
            'com' => $com,
            'study' => $study,
        ]);
    }

    public function confirm_order(Request $request)
    {
        $input = $request->all();

        $session = ExamSession::findorFail($input['id']);
        $medali = $session->medali;
        $competition_id = $session->competition_id;

        if ($medali == 'emas') {
            $juara = '1';
        } elseif ($medali == 'perak') {
            $juara = '2';
        } elseif ($medali == 'perunggu') {
            $juara = '3';
        } else {
            $juara = '0';
        }

        $rows = [];
        // $products = Product::where('competition_id', $session->competition_id)->where('study_id', $session->study_id)->get();

        $products = Product::where('is_active', 1)
            ->whereHas('product_competition', function ($q) use ($competition_id) {
                $q->where('competition_id', $competition_id);
            })
            ->get();

        foreach ($products as $product) {
            $product_for = explode(',', $product->product_for);

            $for = array_search($juara, $product_for, true);

            if ($for !== false) {
                if (empty($product->level_id)) {
                    $row['id'] = $product->id;
                    $row['name'] = $product->product_name;
                    $row['price'] = $product->product_price;
                    $row['desc'] = $product->description;
                    $row['is_fisik'] = $product->is_fisik;
                    $row['image'] = $product->image;
                    $row['exist'] = 0;
                    $row['is_combo'] = $product->is_combo;

                    array_push($rows, $row);
                } else {
                    $level_for = explode(',', $product->level_id);

                    $lfor = array_search((String)$session->user->level_id, $level_for, true);
                    if ($lfor !== false) {
                        $row['id'] = $product->id;
                        $row['name'] = $product->product_name;
                        $row['price'] = $product->product_price;
                        $row['desc'] = $product->description;
                        $row['is_fisik'] = $product->is_fisik;
                        $row['image'] = $product->image;
                        $row['exist'] = 0;
                        $row['is_combo'] = $product->is_combo;

                        array_push($rows, $row);
                    }
                }
            }
        }

        return response()->json([
            'success' => true,
            'data' => $rows,
            'kompetisi' => $session->competition,
            'user' => $session->user,
            'study_id' => $session->study_id,
        ]);
    }

    public function simpan_product(Request $request)
    {
        $input = $request->all();

        $com = Competition::find($input['competition_id']);
        if ($com->expired_order < date('Y-m-d H:i:s')) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, masa pemesanan telah habis..!',
            ]);
        }

        try {
            $product_id = $input['selected_product'];

            foreach ($product_id as $p) {
                $id = (int) $p;

                $product = Product::findorFail($id);
                Cart::create([
                    'userid' => $input['userid'],
                    'competition_id' => $input['competition_id'],
                    'study_id' => $input['study_id'],
                    'premium' => 1,
                    'product_id' => $id,
                    'type' => 1,
                    'quantity' => 1,
                    'unit_price' => $product->product_price,
                    'total_purchase' => $product->product_price,
                    'buyer' => Auth::user()->id,
                    'is_fisik' => $product->is_fisik,
                    'berat' => $product->berat,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
