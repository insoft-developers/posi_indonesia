<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Level;
use App\Models\PhoneCode;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $view = 'register';
        $level = Level::all();
        $kelas = Kelas::all();
        $code = PhoneCode::all();
        return view('auth.register', compact('level','view','kelas','code'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        
       
        $request->validate([
            'username' => ['required', 'min:6', 'unique:'.User::class],
            'name' => ['required','string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'whatsapp'=> ['numeric','required','unique:'.User::class],
            'level_id' => ['required'],
            'tanggal_lahir' => ['required'],
            'kelas_id' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'whatsapp' => $request->whatsapp,
            'level_id' => $request->level_id,
            'kelas_id' => $request->kelas_id
        ]);

        event(new Registered($user));

        $id = $user->id;

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);

        return redirect('after_register/'.$id);
    }
}
