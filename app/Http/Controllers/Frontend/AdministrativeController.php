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

    public function get_sekolah_by_jenjang($p)
    {
        $item = explode('_', $p);
        $jenjang = $item[2];

        if ($jenjang == 'MHS') {
            $sekolah = [];
            return response()->json($sekolah);
        }


        // testing 

        $headers = ['Content-Type: application/json'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api-sekolah-indonesia.vercel.app/sekolah/' . $jenjang . '?kec=' . $item[0] . '&page=1&perPage=100000');
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
            if ($jenjang == 'SMA') {
                $headers = ['Content-Type: application/json'];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api-sekolah-indonesia.vercel.app/sekolah/SMK?kec=' . $item[0] . '&page=1&perPage=100000');
                curl_setopt($ch, CURLOPT_POST, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                // curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                curl_setopt($ch, CURLOPT_VERBOSE, true);
                $response2 = curl_exec($ch);
                $err = curl_error($ch);
                curl_close($ch);
                $data2 = json_decode($response2);
                $sekolah2 = $data2->dataSekolah;
                
                $lain = Sekolah::where('district_code', $item[0])
                    ->where('jenjang', $jenjang)
                    ->select('name as sekolah')
                    ->get();
                
                $school = array_merge($sekolah, $sekolah2, $lain->toArray());
            

                return response()->json($school);

            } else {
                $lain = Sekolah::where('district_code', $item[0])
                ->where('jenjang', $jenjang)
                ->select('name as sekolah')
                ->get();
                $school = array_merge($sekolah,$lain->toArray());
                return response()->json($school);
            }
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
