<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class AdministrativeController extends Controller
{
    public function get_kabupaten($p)
    {
        $data = Province::where('province_code', $p)->groupBy('regency_code')->orderBy('id')->get();

        return response()->json($data);
    }

    public function get_kecamatan($p)
    {
        $data = Province::where('regency_code', $p)->groupBy('district_code')->orderBy('id')->get();

        return response()->json($data);
    }

    public function get_sekolah_by_jenjang(Request $request)
    {
        $input = $request->all();

       
        
        $kecamatan = $input['kecamatan'];
        $level = $input['level'];
        $jenjang = [];
        foreach($level as $l) {
            $lvl = explode("_", $l);
            
            if(!in_array($lvl[1], $jenjang, true)){
                array_push($jenjang, $lvl[1]);
                if($lvl[1] == 'SMA') {
                    array_push($jenjang, 'SMK');
                }
            }
        }
       

        $list = [];
        foreach($jenjang as $jen) {
            $dt = $this->list_sekolah($kecamatan, $jen);
            array_push($list, $dt);
        }

        $jumlah = count($list);
        if($jumlah == 0) {
            $sk = [];
        }
        else if($jumlah == 1) {
            $sk = $list[0];
        }
        else if($jumlah == 2) {
            $sk = array_merge($list[0], $list[1]);
        }
        else if($jumlah == 3) {
            $sk = array_merge($list[0], $list[1], $list[2]);
        }
        else if($jumlah == 4) {
            $sk = array_merge($list[0], $list[1], $list[2], $list[3]);
        }
        else if($jumlah == 5) {
            $sk = array_merge($list[0], $list[1], $list[2], $list[3], $list[4]);
        }
        else if($jumlah == 6) {
            $sk = array_merge($list[0], $list[1], $list[2], $list[3], $list[4], $list[5]);
        }
        else if($jumlah == 7) {
            $sk = array_merge($list[0], $list[1], $list[2], $list[3], $list[4], $list[5], $list[6]);
        }
        else if($jumlah == 8) {
            $sk = array_merge($list[0], $list[1], $list[2], $list[3], $list[4], $list[5], $list[6], $list[7]);
        }


        return response()->json($sk);
        
    }

    protected function list_sekolah($kecamatan, $jenjang) {
        $headers = ['Content-Type: application/json'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api-sekolah-indonesia.vercel.app/sekolah/' . $jenjang . '?kec=' . $kecamatan . '&page=1&perPage=100000');
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            return response()->json(
                [
                    'message' => 'Curl Error ' . $err,
                ],
                500,
            );
        } else {
            $data = json_decode($response);
            $sekolah = $data->dataSekolah;

            $lain = Sekolah::where('district_code', $kecamatan)->where('jenjang', $jenjang)->select('name as sekolah')->get();
            $school = array_merge($sekolah, $lain->toArray());
            return $school;
        }
    }



    public function get_sekolah($p)
    {
        $headers = ['Content-Type: application/json'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api-sekolah-indonesia.vercel.app/sekolah?kec=' . $p . '&page=1&perPage=100000');
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            return response()->json(
                [
                    'message' => 'Curl Error ' . $err,
                ],
                500,
            );
        } else {
            $data = json_decode($response);
            $sekolah = $data->dataSekolah;
            return response()->json($sekolah);
        }
    }

    public static function get_data_sekolah($p)
    {
        $headers = ['Content-Type: application/json'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api-sekolah-indonesia.vercel.app/sekolah?kec=' . $p . '&page=1&perPage=100000');
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            return response()->json(
                [
                    'message' => 'Curl Error ' . $err,
                ],
                500,
            );
        } else {
            $data = json_decode($response);
            $sekolah = $data->dataSekolah;
            return response()->json($sekolah);
        }
    }
}
