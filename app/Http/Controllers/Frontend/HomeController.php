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
}
