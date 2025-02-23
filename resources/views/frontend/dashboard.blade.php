@extends('frontend.master')
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

@section('content')
    <div class="section slider-section">

        <!-- Slider Shape Start -->
        <div class="slider-shape">
            <img class="shape-1 animation-round" src="{{ asset('template/frontend') }}/assets/images/shape/shape-8.png"
                alt="Shape">
        </div>
        <!-- Slider Shape End -->

        <div class="container">

            <!-- Slider Content Start -->
            <div class="slider-content">
                <h4 class="sub-title">Pusat Olimpiade Sains Indonesia (POSI)</h4>
                <h2 class="main-title">Platform Kompetisi Olimpiade <span> Sains Terbaik</span></h2>
                <p>Penyelenggara event ilmu pengetahuan terbesar di Indonesia.</p>
                <a class="btn btn-primary btn-hover-dark" href="{{ url('register') }}">Daftar Sekarang</a>
            </div>
            <!-- Slider Content End -->

        </div>

        <!-- Slider Courses Box Start -->
        <div class="slider-courses-box">

            <img class="shape-1 animation-left" src="{{ asset('template/frontend') }}/assets/images/shape/shape-5.png"
                alt="Shape">

            <div class="box-content">
                <div class="box-wrapper">
                    <i class="flaticon-open-book"></i>
                    <span class="count">935</span>
                    <p>Kompetisi</p>
                </div>
            </div>

            <img class="shape-2" src="{{ asset('template/frontend') }}/assets/images/shape/shape-6.png" alt="Shape">

        </div>
        <!-- Slider Courses Box End -->

        <!-- Slider Rating Box Start -->
        <div class="slider-rating-box">

            <div class="box-rating">
                <div class="box-wrapper">
                    <span class="count">4.8 <i class="flaticon-star"></i></span>
                    <p>Rating (86K)</p>
                </div>
            </div>

            <img class="shape animation-up" src="{{ asset('template/frontend') }}/assets/images/shape/shape-7.png"
                alt="Shape">

        </div>
        <!-- Slider Rating Box End -->

        <!-- Slider Images Start -->
        <div class="slider-images">
            <div class="images">
                <img src="{{ asset('template/frontend') }}/assets/umum/anak2.png" alt="Slider">
            </div>
        </div>
        <!-- Slider Images End -->

        <!-- Slider Video Start -->
        <div class="slider-video">
            <img class="shape-1" src="{{ asset('template/frontend') }}/assets/images/shape/shape-9.png" alt="Shape">

            <div class="video-play">
                <img src="{{ asset('template/frontend') }}/assets/images/shape/shape-10.png" alt="Shape">
                <a href="https://www.youtube.com/watch?v=BRvyWfuxGuU" class="play video-popup"><i
                        class="flaticon-play"></i></a>
            </div>
        </div>
        <!-- Slider Video End -->

    </div>
    <!-- Slider End -->

    <!-- All Courses Start -->
    <div class="section section-padding-02">
        <div class="container">

            <!-- All Courses Top Start -->
            <div class="courses-top">

                <!-- Section Title Start -->
                <div class="section-title shape-01">
                    <h2 class="main-title">Kompetisi <span>Berjalan</span></h2>
                </div>
                <!-- Section Title End -->



            </div>
            <!-- All Courses Top End -->


            <!-- All Courses tab content Start -->
            <div class="tab-content courses-tab-content">
                <div class="tab-pane fade show active" id="tabs1">

                    <!-- All Courses Wrapper Start -->
                    <div class="blog-wrapper">
                        <div class="row">
                            <input type="hidden" id="jumlah_kompetisi" value="{{ count($kompetisi) }}">
                            @foreach ($kompetisi as $index => $k)
                                @php
                                    $query = \App\Models\Transaction::where('competition_id', $k->id)
                                        ->distinct('userid')
                                        ->count('id');

                                    $transaction = $query;

                                @endphp
                                <div class="col-lg-4 col-md-6">

                                    <!-- Single Blog Start -->
                                    <div class="single-blog">
                                        <div class="blog-image">
                                            <a href="#"><img class="gambar-kompetisi"
                                                    src="{{ asset('template/frontend') }}/assets/kompetisi/{{ $k->image }}"
                                                    alt="Blog"></a>
                                        </div>
                                        <div class="blog-content">


                                            @php
                                                $bonus = \App\Models\CompetitionBonusProduct::where(
                                                    'competition_id',
                                                    $k->id,
                                                );
                                                if ($bonus->count() > 0) {
                                                    $bns = $bonus->first();
                                                    $free_products = explode(',', $bns->free_register_product);
                                                    $premium_products = explode(',', $bns->premium_register_product);

                                                    $html1 = '';
                                                    foreach ($free_products as $index1 => $fp) {
                                                        $barang = \App\Models\Product::findorFail($fp);
                                                        if ($index1 + 1 == count($free_products)) {
                                                            if ($barang->is_combo == 1) {
                                                                $html1 .=
                                                                    '<span> ' .
                                                                    $barang->product_name .
                                                                    ' ( ' .
                                                                    $barang->description .
                                                                    ' )</span>';
                                                            } else {
                                                                $html1 .= '<span> ' . $barang->product_name . '</span>';
                                                            }
                                                        } else {
                                                            if ($barang->is_combo == 1) {
                                                                $html1 .=
                                                                    '<span> ' .
                                                                    $barang->product_name .
                                                                    ' ( ' .
                                                                    $barang->description .
                                                                    ' )</span>,';
                                                            } else {
                                                                $html1 .=
                                                                    '<span> ' . $barang->product_name . '</span>,';
                                                            }
                                                        }
                                                    }

                                                    $html2 = '';
                                                    foreach ($premium_products as $index1 => $pp) {
                                                        $barang = \App\Models\Product::findorFail($pp);
                                                        if ($index1 + 1 == count($premium_products)) {
                                                            if ($barang->is_combo == 1) {
                                                                $html2 .=
                                                                    '<span> ' .
                                                                    $barang->product_name .
                                                                    ' ( ' .
                                                                    $barang->description .
                                                                    ' )</span>';
                                                            } else {
                                                                $html2 .= '<span> ' . $barang->product_name . '</span>';
                                                            }
                                                        } else {
                                                            if ($barang->is_combo == 1) {
                                                                $html2 .=
                                                                    '<span> ' .
                                                                    $barang->product_name .
                                                                    ' ( ' .
                                                                    $barang->description .
                                                                    ' )</span>,';
                                                            } else {
                                                                $html2 .=
                                                                    '<span> ' . $barang->product_name . '</span>,';
                                                            }
                                                        }
                                                    }
                                                }

                                            @endphp

                                            @if ($bonus->count() > 0)
                                                <h4 class="title"><a href="#">{{ $k->title }} <br><span
                                                            style="font-weight:bold;font-size:13px;">FASILITAS</span> : <span
                                                            class="bonus-text"><?= $html2 ?>(Premium
                                                            Register).</span><br><span
                                                            class="bonus-text2"><?= $html1 ?>(Free Register).</span></a>
                                                </h4>
                                            @else
                                                <h4 class="title"><a href="#">{{ $k->title }}</a></h4>
                                            @endif

                                            <div class="blog-meta">
                                                <span> <i class="icofont-calendar"></i>{{ hari_ini($k->date) }},
                                                    {{ date('d F Y', strtotime($k->date)) }}</span>
                                                <input type="hidden" id="waktu_{{ $index }}"
                                                    value="{{ $k->finish_registration_date }} {{ $k->finish_registration_time }}">
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
                                                <span> <i class="icofont-link"></i>Links</span>
                                            </div>
                                            <div class="blog-note">
                                                <a target="_blank" href="{{ $k->link_juknis }}">Link juknis</a>
                                                <a target="_blank" style="margin-left:15px;" href="{{ $k->link_twibbon }}">Link Twibbon</a>
                                            </div>
                                            <div class="garis"></div>
                                            <a href="{{ url('main') }}"><button id="btn_daftar_{{ $index }}"
                                                    class="btn btn-secondary btn-hover-primary">Daftar</button></a>

                                            <span class="foot-note">{{ $transaction }} Pedaftar</span>
                                        </div>
                                    </div>
                                    <!-- Single Blog End -->

                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- All Courses Wrapper End -->

                </div>

            </div>
            <!-- All Courses tab content End -->

            <!-- All Courses BUtton Start -->
            <div class="courses-btn text-center">
                <a href="{{ url('main') }}" class="btn btn-secondary btn-hover-primary">Kompetisi Lainnya</a>
            </div>
            <!-- All Courses BUtton End -->

        </div>
    </div>
    <!-- All Courses End -->

    <!-- Call to Action Start -->
    <div class="section section-padding-02">
        <div class="container">

            <!-- Call to Action Wrapper Start -->
            <div class="call-to-action-wrapper">

                <img class="cat-shape-01 animation-round"
                    src="{{ asset('template/frontend') }}/assets/images/shape/shape-12.png" alt="Shape">
                <img class="cat-shape-02" src="{{ asset('template/frontend') }}/assets/images/shape/shape-13.svg"
                    alt="Shape">
                <img class="cat-shape-03 animation-round"
                    src="{{ asset('template/frontend') }}/assets/images/shape/shape-12.png" alt="Shape">

                <div class="row align-items-center">
                    <div class="col-md-6">

                        <!-- Section Title Start -->
                        <div class="section-title shape-02">
                            <h5 class="sub-title">POSI EDUCATION</h5>
                            <h2 class="main-title">VI<span>SI</span></h2>
                            <br>

                            <ul>
                                <li>PENYELENGGARA KOMPETISI SAINS TERPERCAYA
                                </li>
                            </ul>
                            <br>
                            <h2 class="main-title">MI<span>SI</span></h2>
                            <br>
                            <table class="table table-striped">
                                <tr>
                                    <td>
                                        <li>MEWUJUDKAN SDM YANG PEMBELAJAR</li>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <li>MENEBARKAN ILMU PENGETAHUAN DAN MELAKSANAKAN KEGIATAN YANG BERMANFAAT</li>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <li>MENYEDIAKAN SISTEM DAN FASILITAS MODERN YANG RAMAH PENGGUNA SERTA MENDUKUNG
                                            SUSTAINABILITY</li>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <li>SALING BELAJAR, MELINDUNGI, DAN MENGAPRESIASI UNTUK KEBAHAGIAAN DAN KEMAJUAN
                                            BERSAMA</li>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <li>MENJALIN SINERGI UNTUK KEBERMANFAATAN JANGKA PANJANG</li>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <!-- Section Title End -->

                    </div>
                    <div class="col-md-6">
                        <div class="call-to-action-btn">
                            <a class="btn btn-primary btn-hover-dark" href="{{ url('register') }}">Daftar Sekarang
                                Juga</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Call to Action Wrapper End -->

        </div>
    </div>
    <!-- Call to Action End -->

    <!-- How It Work End -->
    <div class="section section-padding mt-n1">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title shape-03 text-center">

                <h2 class="main-title">Prosesnya <span> Sangat Mudah</span></h2>
            </div>
            <!-- Section Title End -->

            <!-- How it Work Wrapper Start -->
            <div class="how-it-work-wrapper">

                <!-- Single Work Start -->
                <div class="single-work">
                    <img class="shape-1" src="{{ asset('template/frontend') }}/assets/images/shape/shape-15.png"
                        alt="Shape">

                    <div class="work-icon">
                        <i class="flaticon-transparency"></i>
                    </div>
                    <div class="work-content">
                        <h3 class="title">Daftar</h3>
                        <p>Lakukan pendaftaran dan cari kompetisi yang ingin anda ikuti.</p>
                    </div>
                </div>
                <!-- Single Work End -->

                <!-- Single Work Start -->
                <div class="work-arrow">
                    <img class="arrow" src="{{ asset('template/frontend') }}/assets/images/shape/shape-17.png"
                        alt="Shape">
                </div>
                <!-- Single Work End -->

                <!-- Single Work Start -->
                <div class="single-work">
                    <img class="shape-2" src="{{ asset('template/frontend') }}/assets/images/shape/shape-15.png"
                        alt="Shape">

                    <div class="work-icon">
                        <i class="flaticon-forms"></i>
                    </div>
                    <div class="work-content">
                        <h3 class="title">Pilih Kompetisi</h3>
                        <p>Pilih kompetisi yang ingin anda ikuti dan ikuti petunjuk-petunjuk nya</p>
                    </div>
                </div>
                <!-- Single Work End -->

                <!-- Single Work Start -->
                <div class="work-arrow">
                    <img class="arrow" src="{{ asset('template/frontend') }}/assets/images/shape/shape-17.png"
                        alt="Shape">
                </div>
                <!-- Single Work End -->

                <!-- Single Work Start -->
                <div class="single-work">
                    <img class="shape-3" src="{{ asset('template/frontend') }}/assets/images/shape/shape-16.png"
                        alt="Shape">

                    <div class="work-icon">
                        <i class="flaticon-badge"></i>
                    </div>
                    <div class="work-content">
                        <h3 class="title">Sertifikat</h3>
                        <p>Dapatkan sertifikat sesuai dengan kompetisi online yang anda ikuti.</p>
                    </div>
                </div>
                <!-- Single Work End -->

            </div>

        </div>
    </div>
    <!-- How It Work End -->

    <!-- Download App Start -->
    <div class="section section-padding download-section">

        <div class="app-shape-1"></div>
        <div class="app-shape-2"></div>
        <div class="app-shape-3"></div>
        <div class="app-shape-4"></div>

        <div class="container">

            <!-- Download App Wrapper Start -->
            <div class="download-app-wrapper mt-n6">

                <!-- Section Title Start -->
                <div class="section-title section-title-white">
                    <h5 class="sub-title">Anda Siap?</h5>
                    <h2 class="main-title">Download app kami untuk mendapatkan lebih banyak kemudahan.</h2>
                </div>
                <!-- Section Title End -->

                <img class="shape-1 animation-right"
                    src="{{ asset('template/frontend') }}/assets/images/shape/shape-14.png" alt="Shape">

                <!-- Download App Button End -->
                <div class="download-app-btn">
                    <ul class="app-btn">
                        <li><a href="#"><img src="{{ asset('template/frontend') }}/assets/images/google-play.png"
                                    alt="Google Play"></a>
                        </li>
                        <li><a href="#"><img src="{{ asset('template/frontend') }}/assets/images/app-store.png"
                                    alt="App Store"></a></li>
                    </ul>
                </div>
                <!-- Download App Button End -->

            </div>
            <!-- Download App Wrapper End -->

        </div>
    </div>
    <!-- Download App End -->

    <!-- Testimonial End -->
    <div class="section section-padding-02 mt-n1">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title shape-03 text-center">
                <h5 class="sub-title">Testimonial</h5>
                <h2 class="main-title">Apa Kata <span> Mereka</span></h2>
            </div>
            <!-- Section Title End -->

            <!-- Testimonial Wrapper End -->
            <div class="testimonial-wrapper testimonial-active">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!-- Single Testimonial Start -->
                        <div class="single-testimonial swiper-slide">
                            <div class="testimonial-author">
                                <div class="author-thumb">
                                    <img src="{{ asset('template/frontend') }}/assets/testi/st1.png" alt="Author">

                                    <i class="icofont-quote-left"></i>
                                </div>

                                <span class="rating-star">
                                    <span class="rating-bar" style="width: 80%;"></span>
                                </span>
                            </div>
                            <div class="testimonial-content">
                                <p>Sebelumnya sudah pernah ikut POSI untuk mewakili sekolah. POSI menurut saya sangat
                                    mendukung anak-anak yang berminat dengan sains. Kedepannya semoga POSI terus berkembang
                                    dan kualitas kompetisinya makin baik untuk menyalurkan bakat dan minat anak di bidang
                                    sains dan membantu siswa untuk berprestasi</p>
                                <h4 class="name">Sarah Ayu Lestari</h4>
                                <span class="designation">Juara 1 Kompetisi Online</span>
                            </div>
                        </div>
                        <!-- Single Testimonial End -->

                        <!-- Single Testimonial Start -->
                        <div class="single-testimonial swiper-slide">
                            <div class="testimonial-author">
                                <div class="author-thumb">
                                    <img src="{{ asset('template/frontend') }}/assets/testi/st2.png" alt="Author">

                                    <i class="icofont-quote-left"></i>
                                </div>

                                <span class="rating-star">
                                    <span class="rating-bar" style="width: 80%;"></span>
                                </span>
                            </div>
                            <div class="testimonial-content">
                                <p>Saya ikut kompetisi POSI udah dari kelas 10 (3 tahun yang lalu). Soal-soalnya menantang
                                    banget, membantu mengasah High Order Think Skill, bagus banget untuk persiapan OSN.</p>
                                <h4 class="name">Andika Putra </h4>
                                <span class="designation">Juara II Kompetisi Online</span>
                            </div>
                        </div>
                        <!-- Single Testimonial End -->

                        <!-- Single Testimonial Start -->
                        <div class="single-testimonial swiper-slide">
                            <div class="testimonial-author">
                                <div class="author-thumb">
                                    <img src="{{ asset('template/frontend') }}/assets/testi/st3.png" alt="Author">

                                    <i class="icofont-quote-left"></i>
                                </div>

                                <span class="rating-star">
                                    <span class="rating-bar" style="width: 80%;"></span>
                                </span>
                            </div>
                            <div class="testimonial-content">
                                <p>Terima kasih kepada Kakak MC yang sangat humble, para pengawas yang baik dan sabar, serta
                                    seluruh panitia yang telah bekerja keras sehingga seluruh rangkaian acara dapat
                                    berlangsung dengan sukses. Saya juga ingin mengucapkan terima kasih kepada POSI,
                                    khususnya Bapak Fahruroji Panjaitan, yang telah berkenan memberikan kesempatan kepada
                                    anak-anak Nias untuk berkompetisi. Semua kesan yang kami terima sangat positif.
                                </p>
                                <h4 class="name">Sari Mega Putri</h4>
                                <span class="designation">Juara III Kompetisi Online</span>
                            </div>
                        </div>
                        <!-- Single Testimonial End -->
                    </div>

                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!-- Testimonial Wrapper End -->

        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Brand Logo Start -->
    <div class="section section-padding-02">
        <div class="container">

            <!-- Brand Logo Wrapper Start -->
            <div class="brand-logo-wrapper">

                <img class="shape-1" src="{{ asset('template/frontend') }}/assets/images/shape/shape-19.png"
                    alt="Shape">

                <img class="shape-2 animation-round"
                    src="{{ asset('template/frontend') }}/assets/images/shape/shape-20.png" alt="Shape">

                <!-- Section Title Start -->
                <div class="section-title shape-03">
                    <h2 class="main-title">Partner <span> Kami.</span></h2>
                </div>
                <!-- Section Title End -->

                <!-- Brand Logo Start -->
                <div class="brand-logo brand-active">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">


                            <div class="single-brand swiper-slide">
                                <img src="{{ asset('template/frontend') }}/assets/mitra/mitra1.png" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="{{ asset('template/frontend') }}/assets/mitra/mitra2.png" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="{{ asset('template/frontend') }}/assets/mitra/mitra3.png" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="{{ asset('template/frontend') }}/assets/mitra/mitra4.png" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="{{ asset('template/frontend') }}/assets/mitra/mitra5.png" alt="Brand">
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Brand Logo End -->

            </div>
            <!-- Brand Logo Wrapper End -->

        </div>
    </div>
    <!-- Brand Logo End -->

    <!-- Blog Start -->
    <div class="section section-padding mt-n1">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title shape-03 text-center">
                <h5 class="sub-title">Portofolio</h5>
                <h2 class="main-title">Event Offline<span> Kami</span></h2>
            </div>
            <!-- Section Title End -->

            <!-- Blog Wrapper Start -->
            <div class="blog-wrapper">
                <div class="row">
                    <div class="col-lg-4 col-md-6">

                        <!-- Single Blog Start -->
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="#"><img src="{{ asset('template/frontend') }}/assets/event/1.webp"
                                        alt="Blog"></a>
                            </div>
                            <div class="blog-content">

                                <h4 class="title"><a href="#">Penyerahan Piagam dan Trofi
                                        Kepada Juara 1 Kompetisi Olimpiade Sains Nasional</a></h4>

                                <div class="blog-meta">
                                    <span> <i class="icofont-calendar"></i> 21 November, 2024</span>
                                    <span> <i class="icofont-heart"></i> 2,568+ </span>
                                </div>

                                <a href="#" class="btn btn-secondary btn-hover-primary">Selanjutnya</a>
                            </div>
                        </div>
                        <!-- Single Blog End -->

                    </div>
                    <div class="col-lg-4 col-md-6">

                        <!-- Single Blog Start -->
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="#"><img src="{{ asset('template/frontend') }}/assets/event/2.webp"
                                        alt="Blog"></a>
                            </div>
                            <div class="blog-content">


                                <h4 class="title"><a href="#">Penyerahan Piagam dan Trofi
                                        Kepada Juara 1 Kompetisi Olimpiade Sains Nasional</a></h4>

                                <div class="blog-meta">
                                    <span> <i class="icofont-calendar"></i> 21 November, 2021</span>
                                    <span> <i class="icofont-heart"></i> 2,568+ </span>
                                </div>

                                <a href="#" class="btn btn-secondary btn-hover-primary">Selanjutnya</a>
                            </div>
                        </div>
                        <!-- Single Blog End -->

                    </div>
                    <div class="col-lg-4 col-md-6">

                        <!-- Single Blog Start -->
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="#"><img src="{{ asset('template/frontend') }}/assets/event/3.webp"
                                        alt="Blog"></a>
                            </div>
                            <div class="blog-content">


                                <h4 class="title"><a href="#">Penyerahan Piagam dan Trofi
                                        Kepada Juara 1 Kompetisi Olimpiade Sains Nasional</a></h4>

                                <div class="blog-meta">
                                    <span> <i class="icofont-calendar"></i> 21 November, 2021</span>
                                    <span> <i class="icofont-heart"></i> 2,568+ </span>
                                </div>

                                <a href="#" class="btn btn-secondary btn-hover-primary">Selanjutnya</a>
                            </div>
                        </div>
                        <!-- Single Blog End -->

                    </div>
                </div>
            </div>
            <!-- Blog Wrapper End -->

        </div>
    </div>
    <!-- Blog End -->

    <!-- Footer Start  -->
@endsection
