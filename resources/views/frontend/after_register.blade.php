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
            <form method="POST" action="{{ route('register.after') }}" enctype="multipart/form-data">
                @csrf
                <div class="register-login-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
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
                            <div class="section-title shape-03">
                                <h2 class="main-judul">Profil</h2>
                            </div>
                            <div style="margin-top: 50px"></div>


                            @if ($user->user_image == null)
                                @if ($user->jenis_kelamin == 'Laki Laki')
                                    <img src="{{ asset('template/frontend/assets/umum/profile2.png') }}"
                                        class="profile-image-i" id="profile-image-i">
                                @else
                                    <img src="{{ asset('template/frontend/assets/umum/profile1.png') }}"
                                        class="profile-image-i" id="profile-image-i">
                                @endif
                            @else
                                @if ($user->google_id == null)
                                    <img src="{{ asset('storage/image_files/profile/' . $user->user_image) }}"
                                        class="profile-image-i" id="profile-image-i">
                                @else
                                    <img src="{{ $user->user_image }}" class="profile-image-i" id="profile-image-i">
                                @endif
                            @endif

                            <input style="display: none;" type="file" id="user-image" name="user_image"
                                accept="*jpg, *.jpeg, *.png">

                            <p class="user-name-display">{{ $user->name }}</p>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-wrapper">


                                        <!-- Single Form Start -->
                                       
                                        
                                        <div class="single-form">
                                            <label class="label-form">Nama Lengkap</label>
                                            @if(! empty($user->name))
                                            <input readonly type="text" id="name" name="name" placeholder="Masukkan nama sesuai KTP (nama ini yang tampil di sertifikat)"
                                                value="{{old('name') ?? $user->name }}">
                                            @else
                                            <input type="text" id="name" name="name" placeholder="Masukkan nama sesuai KTP (nama ini yang tampil di sertifikat)"
                                            value="{{old('name') ?? $user->name }}">
                                            @endif
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                       

                                        <div class="single-form">
                                            <label class="label-form">Username</label>
                                            <input type="text" id="username" name="username" placeholder="Username"
                                                value="{{ old('username') ??  $user->username }}">
                                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="label-form">Email Anda</label>
                                            <input id="email" name="email" readonly type="email" placeholder="Email"
                                                value="{{ old('email') ?? $user->email }}">
                                            @if ($user->email_status == 1)
                                                <small style="font-weight: bold; color:green;"><i class="fa fa-check"></i>
                                                    verified</small>
                                            @else
                                                <a id="btn-email-verif" onclick="verif_email({{ Auth::user()->id }})"
                                                    href="javascript:void(0);"><small style="color: red;"><i
                                                            class="fa fa-exclamation"></i> <strong>Verifikasi
                                                            Email Anda</strong></small></a>
                                                <a style="display: none;" id="btn-email-verif2"
                                                    href="javascript:void(0);"><small
                                                        style="color: red;"><strong>Loading........</strong></small></a>
                                            @endif
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->

                                        <div class="single-form">
                                            <label class="label-form">Akun Sebagai</label>
                                            <div class="courses-select">
                                                <select id="level_id" name="level_id">
                                                    <option value=""> - Pilih - </option>
                                                    @foreach ($level as $l)
                                                        <option <?php if ($user->level_id == $l->id) {
                                                            echo 'selected';
                                                        } ?> value="{{ $l->id }}">
                                                            {{ $l->level_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <x-input-error :messages="$errors->get('level_id')" class="mt-2" />
                                        </div>
                                        @php
                                        if($user->level_id != 0) {
                                            $vel = \App\Models\Level::find($user->level_id);
                                            if($vel !== null) {
                                                $kelas = \App\Models\Kelas::where('jenjang',$vel->jenjang)->get();
                                                $jenjang = $vel->jenjang;
                                            } else {
                                                $jenjang = "";
                                                $kelas = [];
                                            }
                                            
                                        } else {
                                            $jenjang = "";
                                            $kelas = [];
                                        }
                                        
                                        @endphp
                                        <div class="single-form">
                                            <input type="hidden" id="tingkat" name="tingkat" value="{{ $jenjang }}">
                                            <label class="label-form">Kelas</label>
                                            <div class="courses-select">
                                                <select id="kelas_id" name="kelas_id">
                                                    <option value="">Pilih</option>
                                                    @if($user->level_id !== 0)
                                                    @foreach ($kelas as $k)
                                                        <option <?php if ($user->kelas_id == $k->id) {
                                                            echo 'selected';
                                                        } ?> value="{{ $k->id }}">
                                                            {{ $k->nama_kelas }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
                                        </div>
                                        <div class="single-form">
                                            <label class="label-form">Tanggal Lahir</label>
                                            <input name="tanggal_lahir" id="tanggal_lahir" type="date"
                                                value="{{ $user->tanggal_lahir }}">
                                            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                                        </div>
                                        <div class="single-form">
                                            <label class="label-form">Agama</label>
                                            <div class="courses-select">
                                                <select id="agama" name="agama">
                                                    <option value=""> - Pilih - </option>
                                                    <option <?php if ($user->agama == 'Islam') {
                                                        echo 'selected';
                                                    } ?> value="Islam">Islam</option>
                                                    <option <?php if ($user->agama == 'Protestan') {
                                                        echo 'selected';
                                                    } ?> value="Protestan">Protestan</option>
                                                    <option <?php if ($user->agama == 'Katholik') {
                                                        echo 'selected';
                                                    } ?> value="Katholik">Katholik</option>
                                                    <option <?php if ($user->agama == 'Hindu') {
                                                        echo 'selected';
                                                    } ?> value="Hindu">Hindu</option>
                                                    <option <?php if ($user->agama == 'Budha') {
                                                        echo 'selected';
                                                    } ?>value="Budha">Budha</option>
                                                    <option <?php if ($user->agama == 'Kong Hu Cu') {
                                                        echo 'selected';
                                                    } ?> value="Kong Hu Cu">Kong Hu Cu</option>
                                                    <option <?php if ($user->agama == 'Lainnya') {
                                                        echo 'selected';
                                                    } ?> value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <x-input-error :messages="$errors->get('agama')" class="mt-2" />
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-wrapper">

                                        <div class="single-form">
                                            <label class="label-form">Jenis Kelamin</label>
                                            <div class="courses-select">
                                                <select id="jenis_kelamin" name="jenis_kelamin">
                                                    <option value=""> - Pilih - </option>
                                                    <option <?php if ($user->jenis_kelamin == 'Laki Laki') {
                                                        echo 'selected';
                                                    } ?> value="Laki Laki">Laki Laki</option>
                                                    <option <?php if ($user->jenis_kelamin == 'Perempuan') {
                                                        echo 'selected';
                                                    } ?> value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                                        </div>
                                        <div class="single-form">
                                            <label class="label-form">Nomor Whatsapp</label>
                                            <input id="whatsapp" name="whatsapp" type="text"
                                                placeholder="No. Whatsapp" value="{{ $user->whatsapp }}" maxlength="14">
                                            <!--@if ($user->wa_status == 1)-->
                                            <!--    <small style="font-weight: bold; color:green;"><i class="fa fa-check"></i>-->
                                            <!--        verified</small>-->
                                            <!--@else-->
                                            <!--    <a onclick="verif_wa({{ Auth::user()->id }})"-->
                                            <!--        href="javascript:void(0);"><small style="color: red;"><i-->
                                            <!--                class="fa fa-exclamation"></i> <strong>Verifikasi-->
                                            <!--                nomor whatsapp Anda</strong></small></a>-->
                                            <!--@endif-->
                                        </div>

                                        <div class="single-form">
                                            <label class="label-form">Provinsi Sekolah</label>
                                            <div class="courses-select">
                                                <select class="select2-choice" id="provinsi" name="provinsi">
                                                    <option value=""> - Pilih Provinsi - </option>
                                                    @foreach ($province as $p)
                                                        <option <?php if ($user->provinsi == $p->province_code) {
                                                            echo 'selected';
                                                        } ?> value="{{ $p->province_code }}">
                                                            {{ $p->province_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <x-input-error :messages="$errors->get('provinsi')" class="mt-2" />
                                        </div>
                                        <div class="single-form">
                                            <label class="label-form">Kabupaten Sekolah</label>
                                            <div class="courses-select">
                                                <select id="kabupaten" name="kabupaten">
                                                    <option value=""> - Pilih Provinsi Dahulu - </option>

                                                    <?php
                                                    if($user->provinsi != null) { 
                                                        $kabs = \App\Models\Province::where('province_code', $user->provinsi)->groupBy('regency_code')->get();             
                                                        
                                                        foreach($kabs as $kab) { ?>
                                                    <option <?php if ($user->kabupaten == $kab->regency_code) {
                                                        echo 'selected';
                                                    } ?> value="{{ $kab->regency_code }}">
                                                        {{ $kab->regency_name }}</option>
                                                    <?php }
                                                    } ?>

                                                </select>
                                            </div>
                                            <x-input-error :messages="$errors->get('kabupaten')" class="mt-2" />
                                        </div>
                                        <div class="single-form">
                                            <label class="label-form">Kecamatan Sekolah</label>
                                            <div class="courses-select">
                                                <select id="kecamatan" name="kecamatan">
                                                    <option value=""> - Pilih Kabupaten Dahulu - </option>
                                                    <?php
                                                    if($user->kabupaten != null) { 
                                                        $kecs = \App\Models\Province::where('regency_code', $user->kabupaten)->groupBy('district_code')->get();             
                                                        
                                                        foreach($kecs as $kec) { ?>
                                                    <option <?php if ($user->kecamatan == $kec->district_code) {
                                                        echo 'selected';
                                                    } ?> value="{{ $kec->district_code }}">
                                                        {{ $kec->district_name }}</option>
                                                    <?php }
                                                    } ?>

                                                </select>
                                            </div>
                                            <x-input-error :messages="$errors->get('kecamatan')" class="mt-2" />
                                        </div>
                                        <div class="single-form">
                                            <label class="label-form">Nama Sekolah</label>
                                            <div class="courses-select">
                                                <select id="nama_sekolah" name="nama_sekolah">

                                                    @if ($user->nama_sekolah != null)
                                                        <option value="{{ $user->nama_sekolah }}">
                                                            {{ $user->nama_sekolah }}</option>
                                                    @else
                                                        <option value=""> - Pilih Kecamatan Dahulu - </option>
                                                    @endif


                                                </select>
                                            </div>
                                            <x-input-error :messages="$errors->get('nama_sekolah')" class="mt-2" />
                                        </div>
                                        <div class="single-form" id="container-sekolah-lain" style="display: none;">
                                            <label class="label-form">Nama Sekolah Lainnya</label>
                                            <input name="sekolah_lain" id="sekolah_lain" type="text"
                                                placeholder="masukkan nama sekolah anda">

                                        </div>


                                    </div>
                                </div>

                            </div>
                            <div class="row" style="margin-top: 60px;">
                                <div class="col-lg-12">
                                    <div class="single-form">
                                        <button class="btn btn-primary btn-hover-dark w-100">Simpan</button>

                                    </div>
                                </div>
                            </div>

                            <!-- Register & Login Form End -->

                        </div>



                    </div>
                </div>
            </form>
            <!-- Register & Login Wrapper End -->

        </div>
    </div>
    <!-- Register & Login End -->


    <!-- Modal -->
    <div class="modal fade" id="modal-email" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-600">
            <div class="modal-content">


                <div class="modal-header">
                    <p class="modal-title"><span class="modal-head-title">{{ Auth::user()->email }}</span><br><span
                            class="modal-subtitle" id="modal-subtitle">Verifikasi Email</span></p>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="single-form">
                        <label>Masukkan 6 digit angka yang kami kirimkan ke email anda</label>
                        <input style="font-size: 29px;text-align: center;font-weight: bold;" name="email_passcode"
                            id="email_passcode" type="text">

                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="confirm_email({{ Auth::user()->id }})" type="button"
                        class="btn btn-primary btn-sm">Kirim</button>
                </div>

            </div>
        </div>
    </div>
@endsection
