<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('frontend.dashboard');
    }

    public function about() {
        return view('frontend.about');
    }

    public function berita() {
        return view('frontend.berita');
    }

    public function event() {
        return view('frontend.event');
    }

    public function contact() {
        return view('frontend.contact');
    }

    public function pengumuman() {
        return view('frontend.pengumuman');
    }

    public function main() {
        return view('frontend.main');
    }
}
