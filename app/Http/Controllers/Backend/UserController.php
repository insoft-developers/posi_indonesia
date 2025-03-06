<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Administrasi;
use App\Models\Competition;
use App\Models\Kelas;
use App\Models\Level;
use App\Models\Province;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'user';
        $level = Level::all();
        $province = Province::groupBy('province_code')->get();
        return view('backend.masterdata.user', compact('view', 'level', 'province'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'user_image' => 'required',
            'email' => 'required|unique:users',
            'whatsapp' => 'required|min:12|max:13|unique:users',
            'level_id' => 'required',
            'kelas_id' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'nama_sekolah' => 'required',
            'email_status' => 'required',
        ];

        if ($input['nama_sekolah'] == 'lainnya') {
            $rules['sekolah_lain'] = 'required';
        }

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $pesan = $validator->errors();
            $pesanarr = explode(',', $pesan);
            $find = ['[', ']', '{', '}'];
            $html = '';
            foreach ($pesanarr as $p) {
                $html .= str_replace($find, '', $p) . '<br>';
            }
            return response()->json([
                'success' => false,
                'message' => $html,
            ]);
        }

        $input['user_image'] = null;
        $unik = uniqid();
        if ($request->hasFile('user_image')) {
            $input['user_image'] = Str::slug($unik, '-') . '.' . $request->user_image->getClientOriginalExtension();
            $request->user_image->move(public_path('/storage/image_files/profile'), $input['user_image']);
        }

        if ($input['nama_sekolah'] == 'lainnya') {
            $input['nama_sekolah'] = $input['sekolah_lain'];

            $level = Level::findorFail($input['level_id']);

            Sekolah::create([
                'name' => $input['sekolah_lain'],
                'province_code' => $input['provinsi'],
                'city_code' => $input['kabupaten'],
                'district_code' => $input['kecamatan'],
                'jenjang' => $level->jenjang,
            ]);
        }

        $input['password'] = bcrypt($input['password']);

        User::create($input);
        return response()->json([
            'success' => true,
            'message' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function reset_password(Request $request) {
        $input = $request->all();
        $data = User::where('id', $input['id'])->update([
            "password" => bcrypt("posijuara"),
            "google_id" => null
        ]);

        return $data;

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findorFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();

        $user = User::findorFail($id);

        $rules = [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'whatsapp' => 'required|min:12|max:13',
            'level_id' => 'required',
            'kelas_id' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'nama_sekolah' => 'required',
            'email_status' => 'required',
        ];

        if ($input['nama_sekolah'] == 'lainnya') {
            $rules['sekolah_lain'] = 'required';
        }

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $pesan = $validator->errors();
            $pesanarr = explode(',', $pesan);
            $find = ['[', ']', '{', '}'];
            $html = '';
            foreach ($pesanarr as $p) {
                $html .= str_replace($find, '', $p) . '<br>';
            }
            return response()->json([
                'success' => false,
                'message' => $html,
            ]);
        }

        $input['user_image'] = $user->user_image;
        $unik = uniqid();
        if ($request->hasFile('user_image')) {
            $input['user_image'] = Str::slug($unik, '-') . '.' . $request->user_image->getClientOriginalExtension();
            $request->user_image->move(public_path('/storage/image_files/profile'), $input['user_image']);
        }

        if ($input['nama_sekolah'] == 'lainnya') {
            $input['nama_sekolah'] = $input['sekolah_lain'];

            $level = Level::findorFail($input['level_id']);

            Sekolah::create([
                'name' => $input['sekolah_lain'],
                'province_code' => $input['provinsi'],
                'city_code' => $input['kabupaten'],
                'district_code' => $input['kecamatan'],
                'jenjang' => $level->jenjang,
            ]);
        }

        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input['password'] = $user->password;
        }

        $user->update($input);
        return response()->json([
            'success' => true,
            'message' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return User::destroy($id);
    }

    public function list_kelas(Request $request)
    {
        $input = $request->all();
        $level = Level::findorFail($input['jenjang']);
        $jenjang = $level->jenjang;
        $kelas = Kelas::where('jenjang', $jenjang)->get();
        return response()->json([
            'success' => true,
            'data' => $kelas,
        ]);
    }

    public function list_kabupaten(Request $request)
    {
        $input = $request->all();
        $kabupaten = Province::where('province_code', $input['provinsi'])->groupBy('regency_code')->get();
        return response()->json([
            'success' => true,
            'data' => $kabupaten,
        ]);
    }

    public function list_kecamatan(Request $request)
    {
        $input = $request->all();
        $kecamatan = Province::where('regency_code', $input['kabupaten'])->groupBy('district_code')->get();
        return response()->json([
            'success' => true,
            'data' => $kecamatan,
        ]);
    }

    public function list_sekolah(Request $request)
    {
        $input = $request->all();

        $level = Level::findorFail($input['level']);
        $jenjang = $level->jenjang;
        $kecamatan = $input['kecamatan'];

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
            return response()->json([
                'success' => true,
                'data' => $school,
            ]);
        }
    }

    public function user_table()
    {
        $data = User::with('level', 'kelas', 'district')->get();

        return DataTables::of($data)
            ->addColumn('provinsi', function ($data) {
                if ($data->district !== null) {
                    $html = '';
                    $html .= '<ul>';
                    $html .= '<li>' . $data->district->province_name ?? null . '</li>';
                    $html .= '<li>' . $data->district->regency_name ?? null . '</li>';
                    $html .= '<li>' . $data->district->district_name ?? null . '</li>';
                    $html .= '</ul>';
                    return $html;
                } else {
                    return '';
                }
            })
            ->addColumn('level_id', function ($data) {
                return $data->level->level_name ?? null;
            })
            ->addColumn('kelas_id', function ($data) {
                return $data->kelas->nama_kelas ?? null;
            })
            ->addColumn('user_image', function ($data) {
                if ($data->user_image != null) {
                    if ($data->google_id !== null) {
                        return '<img class="product-image-table" src="' . $data->user_image . '">';
                    } else {
                        return '<img class="product-image-table" src="' . asset('storage/image_files/profile/' . $data->user_image) . '">';
                    }
                } else {
                    return 'no-foto';
                }
            })
            ->addColumn('action', function ($data) {
                return '
                <a title="Reset Password" onclick="reset(' .
                    $data->id .
                    ')" href="javascript:void(0)" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="material-symbols:lock-reset-sharp"></iconify-icon>
                </a>
                <a onclick="editData(' .
                    $data->id .
                    ')" href="javascript:void(0)" class="w-32-px h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="lucide:edit"></iconify-icon>
                </a>
                <a onclick="deleteData(' .
                    $data->id .
                    ')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a>';
            })
            ->rawColumns(['action', 'user_image', 'provinsi'])
            ->addIndexColumn()
            ->make(true);
    }
}
