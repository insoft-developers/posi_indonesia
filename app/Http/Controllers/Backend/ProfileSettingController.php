<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProfileSettingController extends Controller
{
    public function index() {
        $view = 'profile-setting';

        $admin = Admin::find(session('id'));
        return view('backend.profile_setting', compact('view','admin'));
    }

    public function update(Request $request) {

        $input = $request->all();
        
        $data = Admin::find(session('id'));

        $input['image'] = $data->image;
        $unik = uniqid();
        if ($request->hasFile('image')) {
            $input['image'] = Str::slug($unik, '-') . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/storage/image_files/profile'), $input['image']);
        }

        $data->update($input);


        return Redirect::back()->with('success', 'Sukses Simpan Data');

    }


    public function change_password() {
        $view = 'change-password';
        return view('backend.change_password', compact('view'));
    }


    public function password_update(Request $request) {
        $input = $request->all();

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = Admin::find(session('id'));

        if (!Hash::check($request->old_password, $user->password)) {
            return Redirect::back()->with('error', 'Password Lama Masih salah...!');

        }

        $user->password = Hash::make($request->password);
        $user->save();

        return Redirect::back()->with('success', 'Sukses Ubah Password');
    }
}
