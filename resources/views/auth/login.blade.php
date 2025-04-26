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
                            @if ($errors->any())
                                <div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-0 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between"
                                    role="alert">
                                    <div class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mingcute:delete-2-line" class="icon text-xl"></iconify-icon>
                                        <?= implode('', $errors->all('<div>:message</div>')) ?>
                                    </div>
                                    
                                </div>
                            @endif
                            <div class="form-wrapper">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

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
                                        <input type="password" id="password" name="password" placeholder="Password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->

                                    <!-- Remember Me -->
                                    <div class="block mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                                name="remember" onclick="show_password()">
                                            <span class="ms-2 text-sm text-gray-600">Show Password</span>
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
                                        <a href="{{ route('google-auth') }}"><button type="button"
                                                class="btn login-google"><img class="img-google"
                                                    src="{{ asset('template/frontend/assets/umum/google_icons.png') }}">Login
                                                dengan Google</button></a>

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
