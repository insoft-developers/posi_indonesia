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
            <div class="section-title shape-03 text-center">
                <h2 class="main-title">Jadwal Ujian</h2>
            </div>
            <!-- Blog Wrapper Start -->
            <div class="blog-wrapper">
                @php
                    $nomor = 0;
                @endphp
                @if($data->count() > 0)
                <div class="row">
                    @php
                    $nomor = -1;
                    @endphp
                    @foreach ($data as $d)
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
                                                    href="blog-details-left-sidebar.html">{{ $d->title }}</a></h4>
                                            <div class="author-name">
                                                <a class="name" href="#">{{ hari_ini($d->date) }},
                                                    {{ date('d F Y', strtotime($d->date)) }}</a>
                                            </div>
                                            <div class="author-name">
                                                <a class="name" href="#">{{ $d->levels->level_name }},
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-md-7">
                                        <div class="blog-content">

                                            @foreach ($d->transaction  as $index => $t)
                                                @php
                                                $nomor++;
                                                @endphp
                                                <div> <i class="icofont-calendar"></i> {{ $t->study->pelajaran->name }}
                                                </div>
                                                <div class="sub-info"> {{ date('d F Y', strtotime($d->date)) }} -
                                                    {{ date('H:i', strtotime($t->study->start_time)) }} s/d
                                                    {{ date('H:i', strtotime($t->study->finish_time)) }}</div>
                                                <div class="sub-info">
                                                    <div class="row">
                                                        <div style="color: #0fa4c9;" class="col-lg-6 col-md-6"><strong><i class="icofont-telegram"></i><a href="#">Link Group</a></strong></div>
                                                        <div style="color: #ce0404;" class="col-lg-6 col-md-6"><strong><i class="icofont-clock-time"></i> <span id="countdown_{{$nomor}}"></span></strong></div>
                                                        <input type="hidden" id="tanggal_{{$nomor}}" value="{{ $d->date }}">
                                                        <input type="hidden" id="jam_{{$nomor}}" value="{{ $t->study->start_time }}">
                                                        <input type="hidden" id="selesai_{{$nomor}}" value="{{ $t->study->finish_time }}">
                                                        <p onclick="ikut_ujian({{ $t->id }})" style="display: none;" class="button-ujian" id="tombol_ujian_{{ $nomor }}">Mulai Ujian</p>
                                                    </div>
                                                </div>
                                                <div class="minus-15"></div>
                                                <hr />
                                            @endforeach


                                            {{-- <a href="blog-details-left-sidebar.html"
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
                @else
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
            <!-- Blog Wrapper End -->


        </div>
    </div>
    <!-- Blog End -->
@endsection
