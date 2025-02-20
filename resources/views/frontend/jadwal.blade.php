@php
    function hari_ini($tanggal)
    {
        $hari = date('D', strtotime($tanggal));

        switch ($hari) {
            case 'Sun':
                $hari_ini = 'Minggu';
                break;

            case 'Mon':
                $hari_ini = 'Senin';
                break;

            case 'Tue':
                $hari_ini = 'Selasa';
                break;

            case 'Wed':
                $hari_ini = 'Rabu';
                break;

            case 'Thu':
                $hari_ini = 'Kamis';
                break;

            case 'Fri':
                $hari_ini = 'Jumat';
                break;

            case 'Sat':
                $hari_ini = 'Sabtu';
                break;

            default:
                $hari_ini = 'Tidak di ketahui';
                break;
        }

        return $hari_ini;
    }

    function selisih_hari($tanggal)
    {
        $tanggal_1 = new DateTime();
        $tanggal_2 = new DateTime($tanggal);
        $selisih = $tanggal_1->diff($tanggal_2);
        return $selisih->d;
    }

@endphp



@extends('frontend.master')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">


    </div>
    <!-- Page Banner End -->

    <!-- Blog Start -->
    <div class="section section-padding mt-n10">
        <div class="container">
            <div class="section-title shape-03">
                <h2 class="main-judul">Jadwal Ujian</h2>
            </div>
           
            <!-- Blog Wrapper Start -->
            <div class="blog-wrapper">
                @php
                    $nomor = 0;
                    $ada = 0;
                @endphp
                @if ($data->count() > 0)
                    <div class="row">
                        @php
                            $nomor = -1;
                            $sekarang = date('Y-m-d');
                        @endphp
                        @foreach ($data as $d)
                           
                           
                            @php
                            $ada++;
                            @endphp
                            <div class="col-lg-6 col-md-6">

                                <!-- Single Blog Start -->

                                <div class="single-blog">

                                    <div class="row">
                                        <div class="col-md-5 col-md-5">
                                            <a href="#"><img class="jadwal-image"
                                                    src="{{ asset('template/frontend/assets/kompetisi/' . $d->image . '') }}"
                                                    alt="Competition Image"></a>
                                            <div class="blog-content">
                                                <h4 class="jadwal-title"><a
                                                        href="#">{{ $d->title }}</a></h4>
                                                <div class="author-name">
                                                    <a class="name" href="#">{{ hari_ini($d->date) }},
                                                        {{ date('d F Y', strtotime($d->date)) }}</a>
                                                </div>
                                                <div class="author-name">
                                                    @php
                                                        $lavel = \App\Models\Level::findorFail(Auth::user()->level_id);
                                                    @endphp
                                                    <a class="name" href="#">{{ $lavel->level_name }},
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-md-7">
                                            <div class="blog-content">

                                                @foreach ($d->transaction as $index => $t)
                                                    @if ($t->invoices->payment_status == 1 && $t->invoices->transaction_status == 1)
                                                        @php

                                                            $session = \App\Models\ExamSession::where(
                                                                'competition_id',
                                                                $t->competition_id,
                                                            )
                                                                ->where('study_id', $t->study_id)
                                                                ->where('userid', Auth::user()->id);
                                                            if ($session->count() > 0) {
                                                                $sess = $session->first();
                                                                if ($sess->is_finish == 1) {
                                                                    $selesai = 1;
                                                                } else {
                                                                    $selesai = 0;
                                                                }
                                                            } else {
                                                                $selesai = 0;
                                                            }
                                                            $nomor++;
                                                        @endphp

                                                        <div> <img class="icon-utama"
                                                                src="{{ asset('template/frontend/assets/umum/icon_buku.png') }}"><span
                                                                style="color: #53b8ed;font-weight:bold;">
                                                                {{ $t->study->pelajaran->name }}</span>
                                                        </div>
                                                        <div class="sub-info"> {{ date('d F Y', strtotime($d->date)) }} -
                                                            {{ date('H:i', strtotime($t->study->start_time)) }} s/d
                                                            {{ date('H:i', strtotime($t->study->finish_time)) }}</div>
                                                        <div class="sub-info">
                                                            <div class="row">
                                                                <div style="color: #0fa4c9;" class="col-lg-6 col-md-6">
                                                                    <strong><img class="icon-telegram"
                                                                            src="{{ asset('template/frontend/assets/umum/icon_telegram.png') }}"><a
                                                                            href="{{ $t->study->forum_link }}" target="_blank">Link Group</a></strong>
                                                                </div>
                                                                @if ($selesai == 1)
                                                                    <div style="color:green" class="col-lg-6 col-md-6">
                                                                        <strong><i class="fa fa-check"></i> <span>Ujian
                                                                                Selesai</span></strong>
                                                                    </div>
                                                                @else
                                                                    <div style="color: #ce0404;" class="col-lg-6 col-md-6">
                                                                        <strong><img class="icon-telegram"
                                                                                src="{{ asset('template/frontend/assets/umum/icon_jam.png') }}"><span
                                                                                id="countdown_{{ $nomor }}"></span></strong>
                                                                    </div>
                                                                @endif
                                                                <input type="hidden" id="tanggal_{{ $nomor }}"
                                                                    value="{{ $d->date }}">
                                                                <input type="hidden" id="jam_{{ $nomor }}"
                                                                    value="{{ $t->study->start_time }}">
                                                                <input type="hidden" id="selesai_{{ $nomor }}"
                                                                    value="{{ $t->study->finish_time }}">
                                                                @if ($selesai == 1)
                                                                @else
                                                                    <p onclick="ikut_ujian({{ $t->id }})"
                                                                        style="display: none;" class="button-ujian"
                                                                        id="tombol_ujian_{{ $nomor }}">Mulai Ujian
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="minus-15"></div>
                                                        <hr />
                                                    @endif
                                                @endforeach


                                                {{-- <a href="#"
                                                class="btn btn-secondary btn-hover-primary">Read
                                                More</a> --}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Single Blog End -->

                            </div>
                            
                        @endforeach
                    </div>
                @endif
                @if($ada <= 0)    
                <center><img src="{{ asset('template/frontend/assets/umum/empty_transaction.png') }}"
                            class="empty-image"></center>
                    <center>
                        <p style="color: red;">Belum ada Jadwal</p>
                    </center>
                    <center><a href="{{ url('main') }}"><span style="color:blue">Buat pesanan sekarang</span></a>
                    </center>
                    <br>
                    <br>
                @endif
            </div>
            <div style="margin-top:100px;"></div>
            <!-- Blog Wrapper End -->
            <div class="section-title shape-03">
                <h2 class="main-judul">Pengumuman Hasil Kompetisi</h2>
            </div>
            <div class="blog-wrapper">


                <div class="row">
                    @foreach ($umum as $um)
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <!-- Single Blog Start -->
                            <div class="single-blog box-pengumuman">
                                <div class="row">
                                    <div class="col-md-4"><img class="img-pengumuman"
                                            src="{{ asset('template/frontend/assets/kompetisi/' . $um->image) }}"></div>
                                    <div class="col-md-8 bagian-dua">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="title-pengumuman">Pengumuman {{ $um->title }}</div>
                                                @php
                                                $lavel = \App\Models\Level::findorFail(Auth::user()->level_id);
                                            @endphp
                                                <div class="subtitle-pengumuman">{{ $lavel->level_name }}</div>
                                            </div>
                                        </div>
                                        <div style="margin-top:-25px"></div>
                                        <hr />
                                        <div class="row">
                                            @foreach ($um->study as $s)
                                                <div onclick="show_pengumuman({{ $s->competition_id }} , {{ $s->id }})"
                                                    class="col-md-4 study-item"><img class="icon-n"
                                                        src="{{ asset('template/frontend/assets/umum/mega_phone.png') }}">
                                                    {{ $s->pelajaran->name }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Single Blog End -->

                        </div>
                    @endforeach
                </div>
            </div>
            <div style="margin-top:50px;"></div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Modal -->
    <div class="modal fade" id="modal-pengumuman" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


                <div class="modal-header">
                    <p class="modal-title"><span class="modal-head-title"></span><br><span class="modal-subtitle"
                            id="modal-subtitle"></span></p>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="pengumuman-competition-id">
                        <input type="hidden" id="pengumuman-study-id">
                        <input type="text" class="form-control search-text" id="text-cari"
                            placeholder="Cari nama peserta">
                    </div>
                    <div id="pemenang-content"></div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal-product" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-600">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title"><span class="modal-head-title"></span><br><span class="modal-subtitle"
                            id="modal-subtitle"></span></p>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="product-user-id">
                    <input type="hidden" id="product-competition-id">
                    <input type="hidden" id="product-study-id">
                    <div id="product-list-content"></div>
                </div>
                <div class="modal-footer">
                    <button onclick="simpan_product_keranjang()" type="button" class="btn btn-primary btn-sm">Buka
                        Keranjang</button>
                </div>

            </div>
        </div>
    </div>



@endsection
