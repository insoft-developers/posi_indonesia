<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
           
            $user = User::where('google_id', $google_user->getId())->first();
            if(!$user) {
                $new_user = User::create([
                    'name' => '',
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'user_image' => $google_user->getAvatar(),
                    'email_status' => 1,
                    'username' => ''
                ]);
                Auth::login($new_user);
                return redirect()->intended('main');
            }
            else {
                Auth::login($user);
                return redirect()->intended('main');
            }
        }catch(\Throwable $th){
            return redirect(route('login'))->withErrors("Login menggunakan akun google gagal, Silahkan Login menggunakan email..!");
        }
    }
}
