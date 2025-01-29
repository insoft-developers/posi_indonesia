<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\ExamSession;
use App\Models\Invoice;
use App\Models\Study;
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


    public function show_pengumuman(Request $request) {
        $input = $request->all();

        $com = Competition::findorFail($input['comid']);
        $study = Study::with('pelajaran','level')->where('id', $input['study'])->first();

        $data = ExamSession::with('user.wilayah')->where('competition_id', $input['comid'])->where('study_id', $input['study'])
            ->orderBy('total_score','desc')->get();


        return response()->json([
            "data" => $data,
            "com" => $com,
            "study" => $study
        ]);
    }


    public function search_pengumuman(Request $request) {
        $input = $request->all();
        $keyword = $input['search'];
        $com = Competition::findorFail($input['comid']);
        $study = Study::with('pelajaran','level')->where('id', $input['study'])->first();

        $query = ExamSession::with('user.wilayah')->where('competition_id', $input['comid'])->where('study_id', $input['study'])
            ->orderBy('total_score','desc');

        if(! empty($keyword)) {
            $query->whereHas('user', function($q) use ($keyword){
                $q->where('name', 'like', '%'.$keyword.'%');
            });
        }

        $data = $query->get();


        return response()->json([
            "data" => $data,
            "com" => $com,
            "study" => $study
        ]);
    }

}
    
