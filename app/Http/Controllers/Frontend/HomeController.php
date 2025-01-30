<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Competition;
use App\Models\Invoice;
use App\Models\Study;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $view = 'home';
        $sekarang = date('Y-m-d');
        $kompetisi = Competition::where('is_active', 1)
        ->where('date','>=', $sekarang)
        ->get();
        return view('frontend.dashboard', compact('view','kompetisi'));
    }

    public function about()
    {
        $view = 'about';
        return view('frontend.about', compact('view'));
    }

    public function berita()
    {
        $view = 'berita';
        return view('frontend.berita', compact('view'));
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
        $kompetisi = Competition::where('is_active', 1)
            ->where('level', Auth::user()->level_id)
            ->get();

        return view('frontend.main', compact('kompetisi', 'view'));
    }

    public function get_competition_data(Request $request)
    {
        $input = $request->all();

        $data = Competition::findorFail($input['id']);

        $detail = Study::with([
            'competition',
            'pelajaran',
            'level',
            'cart' => function ($q) {
                $q->where('userid', Auth::user()->id);
            },
            'transaction' => function ($a) {
                $a->where('userid', Auth::user()->id);
            },
        ])
            ->where('status', 1)
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
                'is_fisik' => 0
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
            // ->groupBy('competition_id')
            ->get();
        return view('frontend.cart', compact('view', 'cart'));
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
        $price = $cart->unit_price;

        $cart->quantity = $input['quantity'];
        $cart->total_purchase = $input['quantity'] * $price;

        $cart->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
