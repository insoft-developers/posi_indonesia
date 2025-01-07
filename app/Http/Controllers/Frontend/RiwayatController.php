<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index() {
        $view = 'riwayat';
        return view('frontend.riwayat', compact('view'));
    }
}
