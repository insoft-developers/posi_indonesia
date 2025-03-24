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

                    <div class="col-lg-4">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            <strong><?= $message ?></strong>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>

                        </div>
                    @endif



                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                            <strong><?= $message ?></strong>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>

                        </div>
                    @endif

                        <!-- Register & Login Form Start -->
                        <div class="register-login-form">
                            <h3 class="main-title">Ganti <span>Password</span></h3>

                            <div class="form-wrapper">
                                <form method="POST" action="{{ route('password.frontend.change') }}">
                                    @csrf

                                    <div class="single-form" id="user-input-model">
                                        <label class="register-label">Password Lama :</label>
                                        <input type="password" name="old_password"
                                            placeholder="masukkan password lama anda..">
                                        <x-input-error :messages="$errors->get('old_password')" class="mt-2" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="register-label">Password Baru :</label>
                                        <input type="password" id="password" name="password"
                                            placeholder="masukkan Password baru anda">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="single-form">
                                        <label class="register-label">Konfirmasi Password Baru :</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            placeholder="masukkan Konfirmasi Password baru anda">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->

                                    <!-- Remember Me -->


                                    <div class="single-form">
                                        <button type="submit" class="btn btn-primary btn-hover-dark w-100">Login</button>
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
