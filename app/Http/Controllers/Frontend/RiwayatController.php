<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index() {
        $view = 'riwayat';

        $userid = Auth::user()->id;
        $sekarang = date('Y-m-d');
        $query = Competition::with('transaction','transaction.invoices','levels','transaction.study.pelajaran')
            ->where('is_active', 1);
            
        $query->whereHas('transaction', function($q) use ($userid){
            $q->where('userid', $userid);
        });
        
        $query->whereHas('transaction.invoices', function($q) use ($userid){
            $q->where('userid', $userid);
            $q->where('payment_status', 1);
            $q->where('transaction_status', 1);
        });
            
        $com = $query->get();
    

        return view('frontend.riwayat', compact('view','com'));
    }
}
