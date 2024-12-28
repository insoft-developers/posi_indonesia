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
                    <input type="hidden" id="jumlah_kompetisi" value="{{ count($kompetisi) }}">
                    @foreach ($kompetisi as $index => $k)
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
                                        <input type="hidden" id="waktu_{{ $index }}" value="{{ $k->date }}">
                                        <span class="sisa-hari" id="countdown_{{ $index }}"></span>
                                        
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
                                    <a href="javascript:void(0);" onclick="daftar({{ $k->id }})"
                                        class="btn btn-secondary btn-hover-primary">Daftar</a>
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
    <div class="modal fade" id="modal-daftar" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content modal-transparent">
                <input type="hidden" id="competition_id">

                <div class="modal-body">
                    <center>
                        <div onclick="personal_register()" class="tombol-daftar"><i class="fa fa-user"></i> Pendaftaran
                            Personal</div>
                    </center>
                    <center>
                        <div onclick="collective_register()" class="tombol-daftar"><i class="fa fa-users"></i> Pendaftaran
                            Kolektif</div>
                    </center>
                </div>

            </div>
        </div>
    </div>
    <!-- end Modal -->


    <!-- Modal -->
    <div class="modal fade" id="modal-daftar-list" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-600">
            <div class="modal-content">


                <div class="modal-header">
                    <p class="modal-title"><span class="modal-head-title">{{ Auth::user()->name }}</span><br><span
                            class="modal-subtitle" id="modal-subtitle">Pendaftaran Event</span></p>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modal-daftar-list-content"></div>
                </div>
                <div class="modal-footer">
                    <button onclick="syarat_gratis()" type="button" class="btn btn-warning btn-sm">Gratis</button>
                    <button onclick="simpan_bayar()" type="button" class="btn btn-primary btn-sm">Berbayar</button>
                </div>

            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modal-gratis" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-600">
            <div class="modal-content">

                <form method="POST" id="form-gratis-submit" name="form-gratis-submit" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <p class="modal-title"><span class="modal-head-title">{{ Auth::user()->name }}</span><br><span
                                class="modal-subtitle" id="modal-subtitle">Syarat Pendaftaran</span></p>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Follow Instagram @posi</label>
                            <div style="margin-top:10px;"></div>
                            <input type="file" id="file1" name="files[]" accept="*.jpg, *.jpeg, *.png" required
                                style="display: none;">
                            <img id="image-syarat1" src="{{ asset('template/frontend/assets/umum/upload_icon.png') }}"
                                class="upload-syarat">
                        </div>
                        <hr />
                        <div class="form-group">
                            <label>Unduh aplikasi Posi di Playstore</label>
                            <div style="margin-top:10px;"></div>
                            <input type="file" id="file2" name="files[]" accept="*.jpg, *.jpeg, *.png" required
                                style="display: none;">
                            <img id="image-syarat2" src="{{ asset('template/frontend/assets/umum/upload_icon.png') }}"
                                class="upload-syarat">
                        </div>
                        <hr />
                        <div class="form-group">
                            <label>Komen pendapat posiitf kamu tentang POSI kemudian tag 5 teman kamu di positingan
                                ini.</label>
                            <div style="margin-top:10px;"></div>
                            <input type="file" id="file3" name="files[]" accept="*.jpg, *.jpeg, *.png" required
                                style="display: none;">
                            <img id="image-syarat3" src="{{ asset('template/frontend/assets/umum/upload_icon.png') }}"
                                class="upload-syarat">
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary btn-sm">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Modal -->
@endsection
