<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $view = 'jadwal';

        $tanggal_sekarang = date('Y-m-d');
        $userid = Auth::user()->id;
        $query = Competition::with(['transaction' => function($q) use ($userid){
            $q->where('userid', $userid);
        },'transaction.invoice','transaction.study.pelajaran','levels'])->where('date', '>=', $tanggal_sekarang);
        $query->whereHas('transaction.invoice', function($n) use ($userid){
            $n->where('payment_status', 1);
            $n->where('transaction_status', 1);
            $n->where('userid', $userid);
        })
         
        ->where('is_active', 1);
       
            
        $data =  $query->get();

        $sekarang = date('Y-m-d');
        $umum = Competition::with('study.pelajaran','levels')->where('is_active', 1)
            ->where('date', '<', $sekarang)
            ->get();


        return view('frontend.jadwal', compact('view','data','umum'));
    }

}
    
