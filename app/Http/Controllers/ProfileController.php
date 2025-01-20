<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Mail\RegisMail;
use App\Models\Kelas;
use App\Models\Level;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function after_register($id)
    {
        $view = 'after-register';
        $user = User::findorFail($id);
        $level = Level::all();
        $province = Province::groupBy('province_code')->orderBy('id')->get();
        $kelas = Kelas::all();

        return view('frontend.after_register', compact('view', 'user', 'level', 'province','kelas'));
    }

    public function after_register_store(Request $request)
    {
        $input = $request->all();
        
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'whatsapp' => 'required',
            'level_id' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'nama_sekolah' => 'required',
            'kelas_id' => 'required'
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $pesan = $validator->errors();
            $pesanarr = explode(',', $pesan);
            $find = ['[', ']', '{', '}', '"'];
            $html = '';
            $nomor = 0;
            foreach ($pesanarr as $p) {
                $nomor++;
                $n = str_replace($find, '', $p);
                $o = strstr($n, ':', false);
                $html .= $nomor . '. ' . str_replace(':', '', $o) . '<br>';
            }
            return back()->with('error', $html);
        }

        $user = User::findorFail(Auth::user()->id);

        if ($request->has('user_image')) {
            $path = storage_path('app\public\image_files\profile');
            $manager = new ImageManager(new Driver());
            $file = $request->user_image;
            $filename = uniqid().date('YmdHis') .'.'.$file->getClientOriginalExtension();
            $img = $manager->read($file->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $filename);

            $user->user_image = $filename;
        }

       
        $user->name = $input['name'];
        $user->level_id = $input['level_id'];
        $user->tanggal_lahir = $input['tanggal_lahir'];
        $user->agama = $input['agama'];
        $user->jenis_kelamin = $input['jenis_kelamin'];
        $user->provinsi = $input['provinsi'];
        $user->kabupaten = $input['kabupaten'];
        $user->kecamatan = $input['kecamatan'];
        $user->nama_sekolah = $input['nama_sekolah'] == 'lainnya' ? $input['sekolah_lain'] : $input['nama_sekolah'];
        $user->kelas_id = $input['kelas_id'];
        $user->save();

        return back()->with('success', 'Update data berhasil...');
    }

    protected function sendMail($name, $email, $passcode)
    {
        $details = [
            'nama' => $name,
            'email' => $email,
            'passcode' => $passcode,
        ];

        Mail::to($email)->send(new RegisMail($details));
    }

    public function send_email_passcode(Request $request)
    {
        $passcode = random_int(100000, 999999);
        $input = $request->all();
        $user = User::findorFail($input['id']);
        $user->email_code = $passcode;
        $query = $user->save();

        if ($query) {
            $this->sendMail($user->name, $user->email, $passcode);
        }

        return response()->json([
            'success' => true,
        ]);
    }

    public function verify_email_passcode(Request $request)
    {
        $input = $request->all();

        $user = User::findorFail($input['id']);
        if ($user->email_code === $input['passcode']) {
            $user->email_status = 1;
            $user->save();

            Session::flash('success', 'Verifikasi Email berhasil');
            return response()->json([
                'success' => true,
            ]);
        } else {
            Session::flash('error', 'Passcode anda salah');
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
