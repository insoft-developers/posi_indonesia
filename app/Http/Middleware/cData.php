<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::findorFail(Auth::user()->id);
        if($user->tanggal_lahir == null || $user->whatsapp == null || $user->agama == null || $user->jenis_kelamin == null || $user->provinsi == null || $user->kabupaten == null || $user->kecamatan == null || $user->nama_sekolah == null || $user->email_status != 1 || $user->tanggal_lahir == null || $user->kelas_id == null ) {
            return redirect('after_register/'.Auth::user()->id);
        }
        else {
            return $next($request);
        }
        
        
    }
}
