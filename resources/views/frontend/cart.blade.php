@extends('frontend.master')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">



    </div>
    <!-- Page Banner End -->

    <!-- About Start -->
    <div class="section">

        <div class="section-padding-02 mt-n10">
            <div class="container">
                <div class="section-title shape-03 text-center">
                    <h2 class="main-judul">Cart</h2>
                    <div style="margin-top:30px"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @if ($cart->count() > 0)
                            <table class="table table-striped" style="font-size: 14px;">
                                @php
                                    $total_harga = 0;
                                @endphp

                                @foreach ($cart as $index => $c)
                                    @php
                                        $total_harga = $total_harga + $c->total_purchase;

                                    @endphp

                                    <tr style="vertical-align: middle">

                                        @if ($c->type == 1)
                                            <td width="8%">

                                                <img class="image-cart"
                                                    @if ($c->product->image == null) src="{{ asset('template/frontend/assets/umum/product.png') }}"
                                            @else 
                                            src="{{ asset('storage/image_files/product/' . $c->product->image) }}" @endif>
                                            </td>
                                            @php

                                                $session = \App\Models\ExamSession::where('userid', $c->user->id)
                                                    ->where('competition_id', $c->competition->id)
                                                    ->where('study_id', $c->study->id)
                                                    ->first();
                                            @endphp
                                            <td width="35%"><strong><span class="m-title">{{ strtoupper($c->product->product_name) }}</strong>
                                                <br>{{ $c->user->name }} - {{ $c->user->nama_sekolah }}
                                                <br>{{ $c->competition->title }} - {{ $c->study->pelajaran->name }} -
                                                {{ $session->medali ?? null }}
                                                <br><span
                                                    style="font-size:13px;color:blue;">{{ $c->product->description }}</span>
                                            </span>
                                            </td>
                                        @else
                                            <td width="8%"><img class="image-cart"
                                                    src="{{ asset('template/frontend/assets/kompetisi/' . $c->competition->image) }}">
                                            </td>
                                            <td width="35%"><span class="m-title">Pendaftaran {{ $c->competition->title }}
                                                {{ $c->premium == 1 ? 'Berbayar' : 'Gratis' }}<br>{{ $c->user->name }} -
                                                {{ $c->user->nama_sekolah }}
                                                <br>
                                                @php
                                                    $lvl = \App\Models\Level::findorfail(Auth::user()->level_id);   
                                                @endphp
                                                <span style="font-size: 13px; color:blue;">{{ $c->study->pelajaran->name }}
                                                    - {{ $c->user->level->level_name ?? null }}</span></span>
                                            </td>
                                        @endif

                                        <td width="25%">
                                            <div class="tambahan-unit">
                                                @if ($c->is_fisik == 1 && $c->total_purchase > 0)
                                                    <span onclick="kurangi({{ $c->id }})"
                                                        class="btn-kurang-unit">-</span>
                                                @else
                                                    <span style="background-color: grey;" class="btn-kurang-unit">-</span>
                                                @endif
                                                <span id="unit_cart_{{ $c->id }}"
                                                    class="unit-cart">{{ $c->quantity }}</span>
                                                @if ($c->is_fisik == 1 && $c->total_purchase > 0)
                                                    <span onclick="tambahi({{ $c->id }})"
                                                        class="btn-tambah-unit">+</span>
                                                @else
                                                    <span style="background: grey;" class="btn-tambah-unit">+</span>
                                                @endif
                                            </div>

                                        </td>
                                        <td><span class="cart-total-price"
                                                id="cart_total_text_{{ $c->id }}"><strong>{{ 'Rp. ' . number_format($c->total_purchase) }}</strong></span>
                                            <input class="subtotal" type="hidden" id="cart_total_{{ $c->id }}"
                                                value="{{ $c->total_purchase }}">
                                            <input type="hidden" id="unit_total_{{ $c->id }}"
                                                value="{{ $c->unit_price }}">
                                        </td>
                                        <td>
                                            <center><button onclick="hapus_cart({{ $c->id }})"
                                                    class="btn-insoft bg-danger btn-cart-delete">Hapus</button></center>
                                        </td>
                                    </tr>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <th colspan="3" style="text-align: right;">Total Harga</th>

                                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="grand-total">Rp.
                                                {{ number_format($total_harga) }}</span></th>
                                        <th><input type="hidden" value="{{ $total_harga }}" id="grand-total-value"></th>
                                    </tr>
                                </tfoot>
                            </table>



                           
                        @else
                            <center><img src="{{ asset('template/frontend/assets/umum/empty_cart.png') }}"
                                    class="empty-image"></center>
                            <center>
                                <p style="color: red;">Belum ada Pesanan</p>
                            </center>
                            <center><a href="{{ url('main') }}"><span style="color:blue">Buat pesanan sekarang</span></a>
                            </center>
                            <br>
                            <br>
                        @endif
                       


                        @php
                        $fisik = \App\Models\Cart::where('buyer', Auth::user()->id)
                            ->where('product_id', '!=', null)
                            ->where('is_fisik', 1)->count();    


                        @endphp
                        @if($fisik > 0)
                        <div style="margin-top:20px"></div>
                        <div class="ongkir-form">
                            <p><strong>Pengaturan Ongkos Kirim</strong></p>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="single-form">
                                        <div class="courses-select">
                                            <select class="register-input" id="provinsi" name="provinsi">
                                                <option value="">Pilih provinsi Tujuan</option>
                                                @foreach ($provinsi as $p)
                                                    <option value="{{ $p->province_id }}">{{ $p->province }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('provinsi')" class="mt-2" />
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="single-form">
                                        <div class="courses-select">
                                            <select class="register-input" id="kota" name="kota">
                                                <option value="">Pilih Provinsi Dahulu</option>

                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('kota')" class="mt-2" />
                                    </div>
                                </div>



                                <div class="col-md-3">
                                    <div class="single-form">
                                        <div class="courses-select">
                                            <select class="register-input" id="kecamatan" name="kecamatan">
                                                <option value="">Pilih Kota Dahulu</option>

                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('kecamatan')" class="mt-2" />
                                    </div>
                                </div>




                                <div class="col-md-3">
                                    <div class="single-form">
                                        <div class="courses-select">
                                            <select class="register-input" id="courier" name="courier">
                                                <option value="">Pilih Kecamatan Dahulu</option>
                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('courier')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form">
                                        <div class="courses-select">
                                            <select class="register-input" id="service" name="service">
                                                <option value="">Pilih Kurir Dahulu</option>
                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('service')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form">
                                        <input type="text" id="receiver_name" name="receiver_name" placeholder="Masukkan Nama Penerima" value="">

                                        <x-input-error :messages="$errors->get('receiver_name')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form">
                                        <input type="text" id="receiver_phone" name="receiver_phone" placeholder="Masukkan No HP Penerima" value="">

                                        <x-input-error :messages="$errors->get('receiver_name')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form">
                                        <textarea id="alamat" name="alamat" style="height: 120px" placeholder="Masukkan alamat lengkap penerima" value=""></textarea>

                                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endif
                        <div style="margin-top:50px"></div>
                        @if ($cart->count() > 0)
                            <button onclick="pesan_sekarang()" class="btn btn-success">Pesan Sekarang</button>
                        @endif
                        <div style="margin-top:50px"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- About End -->


@endsection
