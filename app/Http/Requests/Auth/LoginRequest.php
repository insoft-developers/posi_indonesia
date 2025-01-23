<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        
        $pilihan_login = $this->only('flexRadioDefault')['flexRadioDefault'];
        
        if($pilihan_login == 'username'){
            return [
                'flexRadioDefault' => ['required'],
                'username' => ['required', 'string'],
                'password' => ['required', 'string'],
            ];
        }
        else if($pilihan_login == 'email'){
            return [
                'flexRadioDefault' => ['required'],
                'email' => ['required', 'string'],
                'password' => ['required', 'string'],
            ];
        }
        if($pilihan_login == 'wa'){
            return [
                'flexRadioDefault' => ['required'],
                'whatsapp' => ['required', 'string'],
                'password' => ['required', 'string'],
            ];
        }

        
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $pilihan_login = $this->only('flexRadioDefault')['flexRadioDefault'];
        
        if($pilihan_login == 'username') {
            if (! Auth::attempt($this->only('username', 'password'), $this->boolean('remember'))) {
                RateLimiter::hit($this->throttleKey());
    
                throw ValidationException::withMessages([
                    'username' => trans('auth.failed'),
                ]);
            }
    

        } else if($pilihan_login == 'email') {
            if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
                RateLimiter::hit($this->throttleKey());
    
                throw ValidationException::withMessages([
                    'email' => trans('auth.failed'),
                ]);
            }

        } else if($pilihan_login == 'wa') {
            if (! Auth::attempt($this->only('whatsapp', 'password'), $this->boolean('remember'))) {
                RateLimiter::hit($this->throttleKey());
    
                throw ValidationException::withMessages([
                    'whatsapp' => trans('auth.failed'),
                ]);
            }
        }
        
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        $pilihan_login = $this->only('flexRadioDefault')['flexRadioDefault'];
        
        
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        if($pilihan_login == 'username') {
            throw ValidationException::withMessages([
                'username' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]),
            ]);
        }
        else if($pilihan_login == 'email') {
            throw ValidationException::withMessages([
                'email' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]),
            ]);
        }
        if($pilihan_login == 'wa') {
            throw ValidationException::withMessages([
                'whatsapp' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]),
            ]);
        }
        
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        $pilihan_login = $this->only('flexRadioDefault')['flexRadioDefault'];

        if($pilihan_login == 'username') {
            return Str::transliterate(Str::lower($this->string('username')).'|'.$this->ip());
        }
        else if($pilihan_login == 'email') {
            return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
        }
        else if($pilihan_login == 'wa') {
            return Str::transliterate(Str::lower($this->string('whatsapp')).'|'.$this->ip());
        }
        
    }
}
