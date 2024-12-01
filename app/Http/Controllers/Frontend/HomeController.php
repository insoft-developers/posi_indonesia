<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Competition;

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

    
       
}
