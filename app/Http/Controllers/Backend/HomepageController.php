<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hompage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomepageController extends Controller
{
    public function visi_misi() {
        $view = 'visi-misi';

        $data = Hompage::find(1);
        return view('backend.homepage.visi_misi', compact('view','data'));
    }

    public function visi_update(Request $request) {
        $input = $request->all();
        
        Hompage::where('id', 1)->update([
            "visi" => $input['visi'],
            "misi" => $input['misi']
        ]);

        return Redirect::back()->with('success', 'Sukses Simpan Data');

    }


    public function privacy() {
        $view = 'privacy';

        $data = Hompage::find(1);
        return view('backend.homepage.privacy', compact('view','data'));
    }

    public function privacy_update(Request $request) {
        $input = $request->all();
        
        Hompage::where('id', 1)->update([
            "privacy" => $input['privacy']
        ]);

        return Redirect::back()->with('success', 'Sukses Simpan Data');

    }



    public function term() {
        $view = 'term';

        $data = Hompage::find(1);
        return view('backend.homepage.term', compact('view','data'));
    }

    public function term_update(Request $request) {
        $input = $request->all();
        
        Hompage::where('id', 1)->update([
            "term" => $input['term']
        ]);

        return Redirect::back()->with('success', 'Sukses Simpan Data');

    }


    public function refund() {
        $view = 'refund';

        $data = Hompage::find(1);
        return view('backend.homepage.refund', compact('view','data'));
    }

    public function refund_update(Request $request) {
        $input = $request->all();
        
        Hompage::where('id', 1)->update([
            "refund" => $input['refund']
        ]);

        return Redirect::back()->with('success', 'Sukses Simpan Data');

    }





    public function flow() {
        $view = 'flow';

        $data = Hompage::find(1);
        return view('backend.homepage.flow', compact('view','data'));
    }

    public function flow_update(Request $request) {
        $input = $request->all();
        
        Hompage::where('id', 1)->update([
            "flow1" => $input['flow1'],
            "flow2" => $input['flow2'],
            "flow3" => $input['flow3']
        ]);

        return Redirect::back()->with('success', 'Sukses Simpan Data');

    }
}
