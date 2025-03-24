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
                            <h3 class="main-title">Form <span>Pendaftaran</span></h3>

                            <div class="form-wrapper">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="register-label">Username :</label>
                                        <input type="text" class="register-input" name="username" placeholder="Username"
                                            value="{{ old('username') }}">
                                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                    </div>
                                    <div class="single-form">
                                        <label class="register-label">Nama lengkap :</label>
                                        <input type="text" class="register-input" name="name"
                                            placeholder="Nama Lengkap" value="{{ old('name') }}">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div class="single-form">
                                        <label class="register-label">Tanggal lahir :</label>
                                        <input type="date" class="register-input" name="tanggal_lahir"
                                            placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}">
                                        <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="register-label">Email :</label>
                                        <input class="register-input" name="email" type="email" placeholder="Email"
                                            value="{{ old('email') }}">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="register-label">Password :</label>
                                        <input class="register-input" name="password" type="password" placeholder="Password"
                                            value="{{ old('password') }}">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="register-label">Konfirmasi Password : </label>
                                        <input class="register-input" name="password_confirmation" type="password"
                                            placeholder="Confirm Password">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <label class="register-label">Kode Negara :</label>
                                                <div class="courses-select">
                                                    <select class="register-input" name="country_code" id="country_code">
                                                        <option value=""> - Pilih - </option>
                                                        @foreach($code as $c)
                                                        <option <?php if($c->code == '62') echo 'selected' ;?> value="{{ $c->code }}">{{ str_replace("?", "", $c->country_name) }}<br>({{ $c->code }}) </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <x-input-error :messages="$errors->get('country_code')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <label class="register-label">No Telpon/Whatsapp :</label>
                                                <input class="register-input" name="whatsapp" type="text"
                                                    placeholder="Cth. 81300991122 " value="{{ old('whatsapp') }}" maxlength="14">
                                                <x-input-error :messages="$errors->get('whatsapp')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-form">
                                        <label class="register-label">Jenjang :</label>
                                        <div class="courses-select">
                                            <select class="register-input" name="level_id" id="level_id">
                                                <option value="">Pilih akun sebagai</option>
                                                @foreach ($level as $l)
                                                    <option value="{{ $l->id }}">{{ $l->level_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('level_id')" class="mt-2" />
                                    </div>
                                    <div class="single-form">
                                        <label class="register-label">Kelas :</label>
                                        <div class="courses-select">
                                            <select class="register-input" name="kelas_id" id="kelas_id">
                                                <option value="">Pilih Kelas</option>
                                                @foreach ($kelas as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <button class="btn btn-primary btn-hover-dark w-100">Daftar Sekarang</button>
                                        <a href="{{ route('google-auth') }}"><button type="button"
                                                class="btn login-google"><img class="img-google"
                                                    src="{{ asset('template/frontend/assets/umum/google_icons.png') }}">Login
                                                dengan Google</button></a>
                                    </div>
                                    <div class="im-note">
                                        <p class="im-note-text">Sudah punya akun silahkan <a
                                                href="{{ route('login') }}">Login</a></p>
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
