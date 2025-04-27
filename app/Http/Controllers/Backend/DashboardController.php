<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Level;
use App\Models\Province;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tahun = date('Y');
        $view = 'dashboard';
        $users = User::count();
        $visitors = Visitor::where('page', 'homepage')->count();
        $pendaftar = Transaction::whereNull('product_id')->distinct()->count('userid');
        $pesan = Transaction::whereNotNull('product_id')->distinct()->count('userid');
        $register_incomes = Invoice::where('payment_status', 1)
            ->whereHas('transaction', function ($q) {
                $q->whereNull('product_id');
            })
            ->sum('total_amount');
        $product_incomes = Invoice::where('payment_status', 1)
            ->whereHas('transaction', function ($q) {
                $q->whereNotNull('product_id');
            })
            ->sum('total_amount');

        $visitor_01 = Visitor::where('page', 'homepage')->whereMonth('created_at', '01')->whereYear('created_at', $tahun)->count();

        $visitor_02 = Visitor::where('page', 'homepage')->whereMonth('created_at', '02')->whereYear('created_at', $tahun)->count();

        $visitor_03 = Visitor::where('page', 'homepage')->whereMonth('created_at', '03')->whereYear('created_at', $tahun)->count();

        $visitor_04 = Visitor::where('page', 'homepage')->whereMonth('created_at', '04')->whereYear('created_at', $tahun)->count();

        $visitor_05 = Visitor::where('page', 'homepage')->whereMonth('created_at', '05')->whereYear('created_at', $tahun)->count();

        $visitor_06 = Visitor::where('page', 'homepage')->whereMonth('created_at', '06')->whereYear('created_at', $tahun)->count();

        $visitor_07 = Visitor::where('page', 'homepage')->whereMonth('created_at', '07')->whereYear('created_at', $tahun)->count();

        $visitor_08 = Visitor::where('page', 'homepage')->whereMonth('created_at', '08')->whereYear('created_at', $tahun)->count();

        $visitor_09 = Visitor::where('page', 'homepage')->whereMonth('created_at', '09')->whereYear('created_at', $tahun)->count();

        $visitor_10 = Visitor::where('page', 'homepage')->whereMonth('created_at', '10')->whereYear('created_at', $tahun)->count();

        $visitor_11 = Visitor::where('page', 'homepage')->whereMonth('created_at', '11')->whereYear('created_at', $tahun)->count();

        $visitor_12 = Visitor::where('page', 'homepage')->whereMonth('created_at', '12')->whereYear('created_at', $tahun)->count();

        $pendaftar_01 = Transaction::whereNull('product_id')->whereMonth('created_at', '01')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pendaftar_02 = Transaction::whereNull('product_id')->whereMonth('created_at', '02')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pendaftar_03 = Transaction::whereNull('product_id')->whereMonth('created_at', '03')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pendaftar_04 = Transaction::whereNull('product_id')->whereMonth('created_at', '04')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pendaftar_05 = Transaction::whereNull('product_id')->whereMonth('created_at', '05')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pendaftar_06 = Transaction::whereNull('product_id')->whereMonth('created_at', '06')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pendaftar_07 = Transaction::whereNull('product_id')->whereMonth('created_at', '07')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pendaftar_08 = Transaction::whereNull('product_id')->whereMonth('created_at', '08')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pendaftar_09 = Transaction::whereNull('product_id')->whereMonth('created_at', '09')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pendaftar_10 = Transaction::whereNull('product_id')->whereMonth('created_at', '10')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pendaftar_11 = Transaction::whereNull('product_id')->whereMonth('created_at', '11')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pendaftar_12 = Transaction::whereNull('product_id')->whereMonth('created_at', '12')->whereYear('created_at', $tahun)->distinct()->count('userid');

        $pesan_01 = Transaction::whereNotNull('product_id')->whereMonth('created_at', '01')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pesan_02 = Transaction::whereNotNull('product_id')->whereMonth('created_at', '02')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pesan_03 = Transaction::whereNotNull('product_id')->whereMonth('created_at', '03')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pesan_04 = Transaction::whereNotNull('product_id')->whereMonth('created_at', '04')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pesan_05 = Transaction::whereNotNull('product_id')->whereMonth('created_at', '05')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pesan_06 = Transaction::whereNotNull('product_id')->whereMonth('created_at', '06')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pesan_07 = Transaction::whereNotNull('product_id')->whereMonth('created_at', '07')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pesan_08 = Transaction::whereNotNull('product_id')->whereMonth('created_at', '08')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pesan_09 = Transaction::whereNotNull('product_id')->whereMonth('created_at', '09')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pesan_10 = Transaction::whereNotNull('product_id')->whereMonth('created_at', '10')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pesan_11 = Transaction::whereNotNull('product_id')->whereMonth('created_at', '11')->whereYear('created_at', $tahun)->distinct()->count('userid');
        $pesan_12 = Transaction::whereNotNull('product_id')->whereMonth('created_at', '12')->whereYear('created_at', $tahun)->distinct()->count('userid');


        $provinsi = Province::groupBy('province_code')->get();
        $jenjang = Level::all();

        return view('backend.dashboard', compact(
            'view', 
            'users', 
            'visitors', 
            'pendaftar', 
            'pesan', 
            'register_incomes', 
            'product_incomes',
            'visitor_01',
            'visitor_02',
            'visitor_03',
            'visitor_04',
            'visitor_05',
            'visitor_06',
            'visitor_07',
            'visitor_08',
            'visitor_09',
            'visitor_10',
            'visitor_11',
            'visitor_12',
            'pendaftar_01',
            'pendaftar_02',
            'pendaftar_03',
            'pendaftar_04',
            'pendaftar_05',
            'pendaftar_06',
            'pendaftar_07',
            'pendaftar_08',
            'pendaftar_09',
            'pendaftar_10',
            'pendaftar_11',
            'pendaftar_12',
            'pesan_01',
            'pesan_02',
            'pesan_03',
            'pesan_04',
            'pesan_05',
            'pesan_06',
            'pesan_07',
            'pesan_08',
            'pesan_09',
            'pesan_10',
            'pesan_11',
            'pesan_12',
            'provinsi',
            'jenjang'
        ));
    }
}
