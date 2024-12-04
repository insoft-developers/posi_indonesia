<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Competition;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  
    public function index() {
        $view = 'home';
        return view('frontend.dashboard', compact('view'));
    }

    public function about() {
        $view = 'about';
        return view('frontend.about', compact('view'));
    }

    public function berita() {
        $view = 'berita';
        return view('frontend.berita', compact('view'));
    }

    public function event() {
        $view = 'event';
        return view('frontend.event', compact('view'));
    }

    public function contact() {
        $view = 'contact';
        return view('frontend.contact', compact('view'));
    }

    public function pengumuman() {
        $view = 'pengumuman';
        return view('frontend.pengumuman', compact('view'));
    }

    public function main() {
        $view = 'main';
        $kompetisi = Competition::where('is_active', 1)
            ->where('level', Auth::user()->level_id)
            ->get();
        return view('frontend.main', compact('kompetisi','view'));
    }

    public function get_competition_data(Request $request) {
        $input = $request->all();

        $data = Competition::findorFail($input['id']);

        $detail = Study::with(['competition', 'pelajaran', 'level','cart'=> function($q){
            $q->where('userid', Auth::user()->id);
        }])->where('status', 1)->where('competition_id', $input['id'])->get();
        return response()->json([
            "success" => true,
            "data" => $data,
            "detail"=> $detail
        ]);
    }

    public function add_to_cart(Request $request) {
        $input = $request->all();

        if($input['type'] == 'add') {
            Cart::create([
                "userid" => Auth::user()->id,
                "competition_id" => $input['compete_id'],
                "study_id" => $input['id']
            ]);

        } else {
            Cart::where('userid', Auth::user()->id)
                ->where('competition_id', $input['compete_id'])
                ->where('study_id', $input['id'])
                ->delete();
        }


        $jumlah = Cart::where('userid', Auth::user()->id)->count();
        
        return response()->json([
            "success" => true,
            "message" => "Berhasil",
            "jumlah" => $jumlah
        ]);
    }
       
}
