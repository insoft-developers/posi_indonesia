<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Cart;
use App\Models\Competition;
use App\Models\Event;
use App\Models\Hompage;
use App\Models\Invoice;
use App\Models\NewsCategory;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Study;
use App\Models\Team;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $view = 'home';
        $sekarang = date('Y-m-d');
        $kompetisi = Competition::where('is_active', 1)->where('date', '>=', $sekarang)->get();

        $event = Event::where('is_status', 1)->orderBy('id','desc')->limit(3)->get();
        $homepage = Hompage::find(1);
        $partners = Partner::orderBy('id', 'asc')->get();

        return view('frontend.dashboard', compact('view', 'kompetisi','event','homepage','partners'));
    }

    public function about()
    {
        $view = 'about';
        $homepage = Hompage::find(1);
        $teams = Team::orderBy('urutan', 'asc')->get();
        $partners = Partner::orderBy('id', 'asc')->get();
        return view('frontend.about', compact('view','homepage','teams','partners'));
    }

    public function berita()
    {
        $view = 'berita';
        $data = Berita::where('is_status', 1)->orderBy('id','desc')->simplePaginate(10);
        $terbaru = Berita::where('is_status', 1)->orderBy('id','desc')->limit(5)->get();
        $cat = NewsCategory::all();
        return view('frontend.berita', compact('view','data','terbaru','cat'));
    }


    public function events()
    {
        $view = 'events';
        $data = Event::where('is_status', 1)->orderBy('id','desc')->simplePaginate(10);
        $terbaru = Berita::where('is_status', 1)->orderBy('id','desc')->limit(5)->get();
        return view('frontend.event', compact('view','data','terbaru'));
    }


    public function berita_category($category)
    {
        $view = 'berita-category';
        $data = Berita::where('is_status', 1)->where('category', $category)->orderBy('id','desc')->simplePaginate(10);
        $terbaru = Berita::where('is_status', 1)->orderBy('id','desc')->limit(5)->get();
        $cat = NewsCategory::all();
        return view('frontend.berita', compact('view','data','terbaru','cat'));
    }

    public function berita_detail($slug)
    {
       
        $view = 'berita-detail';
        $cat = NewsCategory::all();
        $terbaru = Berita::where('is_status', 1)->orderBy('id','desc')->limit(5)->get();
        $data = Berita::where('slug', $slug)->first();
       
        return view('frontend.berita_detail', compact('view','data','cat','terbaru'));
    }


    public function event_detail($slug)
    {
       
        $view = 'event-detail';
        
        $terbaru = Event::where('is_status', 1)->orderBy('id','desc')->limit(5)->get();
        $data = Event::where('slug', $slug)->first();
       
        return view('frontend.event_detail', compact('view','data','terbaru'));
    }

    public function event()
    {
        $view = 'event';
        return view('frontend.event', compact('view'));
    }

    public function contact()
    {
        $view = 'contact';
        return view('frontend.contact', compact('view'));
    }

    public function pengumuman()
    {
        $view = 'pengumuman';
        return view('frontend.pengumuman', compact('view'));
    }

    public function main()
    {
        $view = 'main';
        $sekarang = date('Y-m-d');
        $kompetisi = Competition::where('is_active', 1)->where('date', '>=', $sekarang)->orderBy('date', 'asc')->get();

       
        return view('frontend.main', compact('kompetisi', 'view'));
    }

    public function get_competition_data(Request $request)
    {
        $input = $request->all();

        $data = Competition::findorFail($input['id']);

        $detail = Study::with([
            'competition',
            'pelajaran',
            'cart' => function ($q) {
                $q->where('userid', Auth::user()->id);
            },
            'transaction' => function ($a) {
                $a->where('userid', Auth::user()->id);
            },
        ])
            ->where('status', 1)
            ->where('level_id', Auth::user()->level_id)
            ->where('competition_id', $input['id'])
            ->get();

        // dd($detail);

        $cart = Cart::where('userid', Auth::user()->id)->get();

        return response()->json([
            'success' => true,
            'data' => $data,
            'detail' => $detail,
            'cart' => $cart,
        ]);
    }

    public function add_to_cart(Request $request)
    {
        $input = $request->all();

        $compete = Competition::findorFail($input['compete_id']);
        $harga = $compete->price;

        $ids = $input['id'];
        foreach ($ids as $id) {
            Cart::updateOrCreate([
                'userid' => Auth::user()->id,
                'competition_id' => $input['compete_id'],
                'premium' => $input['premium'],
                'study_id' => $id,
                'buyer' => Auth::user()->id,
                'quantity' => 1,
                'unit_price' => $harga,
                'total_purchase' => $harga,
                'is_fisik' => 0,
            ]);
        }

        $jumlah = Cart::where('buyer', Auth::user()->id)
            ->groupBy('competition_id')
            ->count();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil',
            'jumlah' => $jumlah,
        ]);
    }

    public function cart()
    {
        $view = 'cart';
        $cart = Cart::with('competition', 'user', 'study.pelajaran', 'study.level')
            ->where('buyer', Auth::user()->id)
            ->get();

        $fisik = Cart::where('buyer', Auth::user()->id)->where('is_fisik', 1);

        if ($fisik->count() > 0) {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://pro.rajaongkir.com/api/province',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => ['key: ' . config('app.raja_key') . ''],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo 'cURL Error #:' . $err;
            }

            $ro = json_decode($response);
            $provinsi = $ro->rajaongkir->results;
        } else {
            $provinsi = [];
        }

        return view('frontend.cart', compact('view', 'cart', 'provinsi'));
    }

    public function cart_delete(Request $request)
    {
        try {
            $input = $request->all();

            Cart::destroy($input['id']);
            return response()->json([
                'success' => true,
                'message' => 'Item berhasil dihapus',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function cart_ubah(Request $request)
    {
        $input = $request->all();

        $cart = Cart::findorFail($input['id']);

        $product = Product::findorFail($cart->product_id);

        $price = $cart->unit_price;

        $cart->quantity = $input['quantity'];
        $cart->total_purchase = $input['quantity'] * $price;
        $cart->berat = $product->berat * $input['quantity'];

        $cart->save();

        return response()->json([
            'success' => true,
        ]);
    }

    public function ro_kota(Request $request)
    {
        $input = $request->all();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://pro.rajaongkir.com/api/city?id=&province=' . $input['prov'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => ['key: ' . config('app.raja_key') . ''],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo 'cURL Error #:' . $err;
        }

        $ro = json_decode($response);
        $data = $ro->rajaongkir->results;

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function ro_district(Request $request)
    {
        $input = $request->all();
        $kota = $input['kota'];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://pro.rajaongkir.com/api/subdistrict?city=' . $kota . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => ['key: ' . config('app.raja_key') . ''],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo 'cURL Error #:' . $err;
        }

        $ro = json_decode($response);
        $data = $ro->rajaongkir->results;

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function ro_cost(Request $request)
    {
        $input = $request->all();
        $setting = Setting::findorFail(1);
        $asal = $setting->kecamatan;
        $kecamatan = $input['kecamatan'];
        $kurir = $input['kurir'];

        $berat = Cart::where('buyer', Auth::user()->id)
            ->where('is_fisik', 1)
            ->sum('berat');

        $field = [
            'origin' => $asal,
            'originType' => 'subdistrict',
            'destination' => $kecamatan,
            'destinationType' => 'subdistrict',
            'weight' => $berat == null ? 0 : (int) $berat,
            'courier' => $kurir,
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://pro.rajaongkir.com/api/cost',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => ['key: ' . config('app.raja_key') . ''],
            CURLOPT_POSTFIELDS => http_build_query($field),
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo 'cURL Error #:' . $err;
        }

        $ro = json_decode($response);
        $data = $ro->rajaongkir->results;

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function privacy_policy() {
        $view = 'privacy';
        $data = Hompage::find(1);
        return view('frontend.privacy', compact('view','data'));
    }

    public function term_condition() {
        $view = 'term';
        $data = Hompage::find(1);
        return view('frontend.term', compact('view','data'));
    }

    public function refund_policy() {
        $view = 'refund';
        $data = Hompage::find(1);
        return view('frontend.refund', compact('view','data'));
    }
}
