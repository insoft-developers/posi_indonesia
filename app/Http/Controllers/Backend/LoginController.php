<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }

    public function login_post(Request $request)
    {
        $input = $request->all();

        $rules = [
            'email' => 'email|required',
            'password' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $input = $request->all();
        $rules = [
            'email' => 'string|required',
            'password' => 'required|min:6',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            $account = Admin::where(function ($query) use ($input) {
                $query->where('email', $input['email']);
            })->first();

            if (!$account) {
                return redirect()->back()->withInput()->withErrors('Akun anda belum terdaftar..!');
            }

            if (Hash::check($input['password'], $account->password)) {
                $generate_token = Str::random(36);
                session(['id' => $account->id, 'name' => $account->name, 'email' => $account->email, 'token' => $generate_token, 'adminid' => $account->id, 'level' => $account->level]);

                Admin::where('id', $account->id)->update(['token' => $generate_token]);
                return redirect('/posiadmin');
            } else {
                return redirect()->back()->withInput()->withErrors('Username atau password masih salah..!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }


    public function logout(Request $request)
    {
        $request->session()->regenerate();
        $request->session()->invalidate();
        $request->session()->flush();
        return redirect(route('admin.login'));
    }
}


