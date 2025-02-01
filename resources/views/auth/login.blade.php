{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('frontend.master')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">


    </div>
    <!-- Page Banner End -->

    <!-- Register & Login Start -->
    <div class="section section-padding">
        <div class="container">

            <!-- Register & Login Wrapper Start -->
            <div class="register-login-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6">

                        <!-- Register & Login Images Start -->
                        <div class="register-login-images">

                            <div class="images">
                                <img src="{{ asset('template/frontend') }}/assets/umum/logo_600.png" alt="Register Login">
                            </div>
                        </div>
                        <!-- Register & Login Images End -->

                    </div>
                    <div class="col-lg-6">

                        <!-- Register & Login Form Start -->
                        <div class="register-login-form">
                            <h3 class="main-title">Login <span>Sekarang</span></h3>

                            <div class="form-wrapper">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    {{-- <div class="kartu">
                                        <p class="login-title">Silahkan login dengan :</p>
                                        
                                        
                                        <div class="form-check" id="radio-username-c">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="radio-username" checked value="username">
                                            <label class="form-check-label" for="radio-username">
                                                Username
                                            </label>
                                        </div>


                                        <div class="form-check" id="radio-email-c">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="radio-email" value="email">
                                            <label class="form-check-label" for="radio-email">
                                                Email
                                            </label>
                                        </div>
                                        <div class="form-check" id="radio-wa-c">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" value="wa"
                                                id="radio-wa">
                                            <label class="form-check-label" for="radio-wa">
                                                Whatsapp
                                            </label>
                                        </div>
                                    </div> --}}
                                    <div class="single-form" id="user-input-model">
                                        <select name="flexRadioDefault" id="login-option" required>
                                            <option value="">Pilih login menggunakan</option>
                                            <option value="email">Email</option>
                                            <option value="username">Username</option>
                                            <option value="wa">Nomor Whatsapp</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('flexRadioDefault')" class="mt-2" />
                                    </div>
                                    <!-- Single Form Start -->
                                    <div class="single-form" id="user-input-model">
                                        <input type="text" name="username" placeholder="masukkan username anda..">
                                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="password" name="password" placeholder="Password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->

                                    <!-- Remember Me -->
                                    <div class="block mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                                name="remember">
                                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                        @if (Route::has('password.request'))
                                            <a class="pull-right underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                href="{{ route('password.request') }}">
                                                Lupa Password
                                            </a>
                                        @endif
                                    </div>


                                    <div class="single-form">
                                        <button class="btn btn-primary btn-hover-dark w-100">Login</button>
                                        <a href="{{ route('google-auth') }}"><button type="button" class="btn login-google"><img class="img-google" src="{{ asset('template/frontend/assets/umum/google_icons.png') }}">Login dengan Google</button></a>

                                    </div>
                                    <div class="im-note" style="margin-top:20px;">
                                        <p class="im-note-text">Belum punya akun silahkan <a
                                                href="{{ route('register') }}">Daftar</a></p>
                                    </div>
                                    <!-- Single Form End -->
                                </form>
                            </div>
                        </div>
                        <!-- Register & Login Form End -->

                    </div>
                </div>
            </div>
            <!-- Register & Login Wrapper End -->

        </div>
    </div>
    <!-- Register & Login End -->
@endsection
