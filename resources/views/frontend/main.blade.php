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
                <h2 class="main-title">Kompetisi<span> Online</span></h2>
            </div>
            <!-- Blog Wrapper Start -->
            <div class="blog-wrapper">
                <div class="row">
                    @foreach ($kompetisi as $k)
                        <div class="col-lg-4 col-md-6">

                            <!-- Single Blog Start -->
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="blog-details-left-sidebar.html"><img
                                            src="{{ asset('template/frontend') }}/assets/kompetisi/{{ $k->image }}"
                                            alt="Blog"></a>
                                </div>
                                <div class="blog-content">


                                    <h4 class="title"><a href="blog-details-left-sidebar.html">{{ $k->title }}</a></h4>

                                    <div class="blog-meta">
                                        <span> <i class="icofont-calendar"></i>{{ hari_ini($k->date) }},
                                            {{ date('d F Y', strtotime($k->date)) }}</span>
                                        <span class="sisa-hari"> {{ selisih_hari($k->date) }} hari lagi</span>
                                    </div>
                                    <div class="garis"></div>
                                    <div class="blog-meta">
                                        <span> <i class="icofont-files-stack"></i>Masa Pendaftaran</span>
                                    </div>
                                    <div class="blog-note">
                                        {{ date('d F Y', strtotime($k->start_registration_date)) }}
                                        {{ date('H:i', strtotime($k->start_registration_time)) }} s.d
                                    </div>
                                    <div class="blog-note">
                                        {{ date('d F Y', strtotime($k->finish_registration_date)) }}
                                        {{ date('H:i', strtotime($k->finish_registration_time)) }}
                                    </div>
                                    <div class="blog-meta">
                                        <span> <i class="icofont-money"></i>Biaya Pendaftaran</span>
                                    </div>
                                    <div class="blog-note">
                                        @if ($k->type == 1)
                                            Rp. {{ number_format($k->price) }} atau gratis dengan syarat
                                        @elseif($k->type == 2)
                                            Rp. {{ number_format($k->price) }}
                                        @elseif($k->type == 2)
                                            Gratis
                                        @endif

                                    </div>
                                    <div class="blog-meta">
                                        <span> <i class="icofont-link"></i>Link Juknis</span>
                                    </div>
                                    <div class="blog-note">
                                        <a href="">Lihat juknis disini</a>
                                    </div>
                                    <div class="garis"></div>
                                    <a href="javascript:void(0);" onclick="daftar({{ $k->id }})" class="btn btn-secondary btn-hover-primary">Daftar</a>
                                    <span class="foot-note">1.450 Pedaftar</span>
                                </div>
                            </div>
                            <!-- Single Blog End -->

                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Blog Wrapper End -->

            <!-- Page Pagination End -->
            {{-- <div class="page-pagination">
                    <ul class="pagination justify-content-center">
                        <li><a href="#"><i class="icofont-rounded-left"></i></a></li>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                    </ul>
                </div> --}}
            <!-- Page Pagination End -->

        </div>
    </div>
    <!-- Blog End -->


    <!-- Modal -->
    <div class="modal fade" id="modal-daftar" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content modal-transparent">
                
                <div class="modal-body">
                    <center><div class="tombol-daftar"><i class="fa fa-user"></i> Pendaftaran Personal</div></center>
                    <center><div class="tombol-daftar"><i class="fa fa-users"></i> Pendaftaran Kolektif</div></center>
                </div>
               
            </div>
        </div>
    </div>
    <!-- end Modal -->
@endsection
