@extends('frontend.master')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">

        <img class="shape-1 animation-round" src="{{ asset('template/frontend') }}/assets/images/shape/shape-8.png" alt="Shape">

        <img class="shape-2" src="{{ asset('template/frontend') }}/assets/images/shape/shape-23.png" alt="Shape">

        <div class="container">
            <!-- Page Banner Start -->
            <div class="page-banner-content">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Tentang</li>
                </ul>
                <h2 class="title">Tentang <span>Pusat Olimpiade Sains Indonesia (POSI)</span></h2>
            </div>
            <!-- Page Banner End -->
        </div>

        <!-- Shape Icon Box Start -->
        <div class="shape-icon-box">

            <img class="icon-shape-1 animation-left" src="{{ asset('template/frontend') }}/assets/images/shape/shape-5.png" alt="Shape">

            <div class="box-content">
                <div class="box-wrapper">
                    <i class="flaticon-badge"></i>
                </div>
            </div>

            <img class="icon-shape-2" src="{{ asset('template/frontend') }}/assets/images/shape/shape-6.png" alt="Shape">

        </div>
        <!-- Shape Icon Box End -->

        <img class="shape-3" src="{{ asset('template/frontend') }}/assets/images/shape/shape-24.png" alt="Shape">

        <img class="shape-author" src="{{ asset('template/frontend') }}/assets/umum/sd.png" alt="Shape">

    </div>
    <!-- Page Banner End -->

    <!-- About Start -->
    <div class="section">

        <div class="section-padding-02 mt-n10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">

                        <!-- About Images Start -->
                        <div class="about-images">
                            <div class="images">
                                <img src="{{ asset('template/frontend') }}/assets/umum/1.webp" alt="About">
                            </div>

                            <div class="about-years">
                                <div class="years-icon">
                                    <img src="{{ asset('template/frontend') }}/assets/images/logo-icon.png" alt="About">
                                </div>
                                <p><strong>5+</strong> Tahun Pengalaman</p>
                            </div>
                        </div>
                        <!-- About Images End -->

                    </div>
                    <div class="col-lg-6">

                        <!-- About Content Start -->
                        <div class="about-content">
                           
                            <h2 class="main-title">Tentang <span>Kami.</span></h2>
                            <p>POSI merupakan perusahaan rintisan (startup) platform pendidikan berskala nasional.
                                POSI hadir sebagai wadah bagi para calon juara masa depan dengan menyelenggarakan berbagai kompetisi dan pelatihan olimpiade sains, persiapan UTBK dan AKM, baik secara daring maupun luring.
                                POSI merupakan wadah bagi para profesional muda yang memiliki jiwa kompetitif dan cinta pendidikan. Tim POSI merupakan tim yang berpegang teguh pada nilai-nilai JUARA yang berarti (A)dillah untuk Allah dan Bangsa, (B)erkreativitas Tanpa Batas, (A)daptif, (R)ealisasi Hasil Maksimal serta (A)ktivitas dan Pembelajaran yang Berkesinambungan. Dengan visi “Mewujudkan Sejuta Manusia Berprestasi”, POSI optimis dapat menjadi media pengembangan dan peningkatan mutu pendidikan bagi masyarakat Indonesia, baik bagi guru maupun peserta didik.</p>
                            
                        </div>
                        <!-- About Content End -->

                    </div>
                </div>
            </div>
        </div>

        <div class="section-padding-02 mt-n6">
            <div class="container">

                <!-- About Items Wrapper Start -->
                <div class="about-items-wrapper">
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- About Item Start -->
                            <div class="about-item">
                                <div class="item-icon-title">
                                    <div class="item-icon">
                                        <i class="flaticon-tutor"></i>
                                    </div>
                                    <div class="item-title">
                                        <h3 class="title">Aksesibilitas yang Luas</h3>
                                    </div>
                                </div>
                                <p>Peserta dari seluruh dunia bisa ikut serta dalam kompetisi tanpa terkendala oleh lokasi fisik. Ini membuka peluang bagi siapa saja untuk berpartisipasi.</p>
                                <p>Banyak kompetisi online yang memungkinkan peserta mengerjakan tugas atau mengikuti tahapan lomba sesuai waktu yang mereka miliki.</p>
                            </div>
                            <!-- About Item End -->
                        </div>
                        <div class="col-lg-4">
                            <!-- About Item Start -->
                            <div class="about-item">
                                <div class="item-icon-title">
                                    <div class="item-icon">
                                        <i class="flaticon-coding"></i>
                                    </div>
                                    <div class="item-title">
                                        <h3 class="title">Biaya Lebih Terjangkau</h3>
                                    </div>
                                </div>
                                <p>Peserta tidak perlu mengeluarkan biaya untuk perjalanan atau akomodasi, yang sering kali menjadi hambatan dalam kompetisi tatap muka.</p>
                                <p>Banyak kompetisi online yang menawarkan biaya pendaftaran lebih murah dibandingkan dengan kompetisi fisik.</p>
                            </div>
                            <!-- About Item End -->
                        </div>
                        <div class="col-lg-4">
                            <!-- About Item Start -->
                            <div class="about-item">
                                <div class="item-icon-title">
                                    <div class="item-icon">
                                        <i class="flaticon-increase"></i>
                                    </div>
                                    <div class="item-title">
                                        <h3 class="title">Persaingan Lebih Kompetitif</h3>
                                    </div>
                                </div>
                                <p>Karena dapat diikuti oleh peserta dari seluruh dunia, kompetisi online sering kali menciptakan persaingan yang lebih ketat dan beragam  untuk meningkatkan kualitas diri dan inovasi.</p>
                                <p>Bagi penyelenggara, kompetisi online memungkinkan mereka untuk menjangkau audiens yang lebih besar.</p>
                            </div>
                            <!-- About Item End -->
                        </div>
                    </div>
                </div>
                <!-- About Items Wrapper End -->

            </div>
        </div>

    </div>
    <!-- About End -->

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
                            <a class="btn btn-primary btn-hover-dark" href="contact.html">Daftar Sekarang Juga</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Call to Action Wrapper End -->

        </div>
    </div>
    <!-- Call to Action End -->

    <!-- Team Member's Start -->
    <div class="section section-padding mt-n1">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title shape-03 text-center">
                <h5 class="sub-title">Team Member’s</h5>
                <h2 class="main-title">Edule Skilled <span> Instructor</span></h2>
            </div>
            <!-- Section Title End -->

            <!-- Team Wrapper Start -->
            <div class="team-wrapper">
                <div class="row row-cols-lg-5 row-cols-sm-3 row-cols-2 ">
                    <div class="col">

                        <!-- Single Team Start -->
                        <div class="single-team">
                            <div class="team-thumb">
                                <img src="{{ asset('template/frontend') }}/assets/images/author/author-01.jpg" alt="Author">
                            </div>
                            <div class="team-content">
                                <div class="rating">
                                    <span class="count">4.9</span>
                                    <i class="icofont-star"></i>
                                    <span class="text">(rating)</span>
                                </div>
                                <h4 class="name">Margarita James</h4>
                                <span class="designation">MSC, Instructor</span>
                            </div>
                        </div>
                        <!-- Single Team End -->

                    </div>
                    <div class="col">

                        <!-- Single Team Start -->
                        <div class="single-team">
                            <div class="team-thumb">
                                <img src="{{ asset('template/frontend') }}/assets/images/author/author-02.jpg" alt="Author">
                            </div>
                            <div class="team-content">
                                <div class="rating">
                                    <span class="count">4.9</span>
                                    <i class="icofont-star"></i>
                                    <span class="text">(rating)</span>
                                </div>
                                <h4 class="name">Mitchell Colon</h4>
                                <span class="designation">BBA, Instructor</span>
                            </div>
                        </div>
                        <!-- Single Team End -->

                    </div>
                    <div class="col">

                        <!-- Single Team Start -->
                        <div class="single-team">
                            <div class="team-thumb">
                                <img src="{{ asset('template/frontend') }}/assets/images/author/author-03.jpg" alt="Author">
                            </div>
                            <div class="team-content">
                                <div class="rating">
                                    <span class="count">4.9</span>
                                    <i class="icofont-star"></i>
                                    <span class="text">(rating)</span>
                                </div>
                                <h4 class="name">Sonya Gordon</h4>
                                <span class="designation">MBA, Instructor</span>
                            </div>
                        </div>
                        <!-- Single Team End -->

                    </div>
                    <div class="col">

                        <!-- Single Team Start -->
                        <div class="single-team">
                            <div class="team-thumb">
                                <img src="{{ asset('template/frontend') }}/assets/images/author/author-04.jpg" alt="Author">
                            </div>
                            <div class="team-content">
                                <div class="rating">
                                    <span class="count">4.9</span>
                                    <i class="icofont-star"></i>
                                    <span class="text">(rating)</span>
                                </div>
                                <h4 class="name">Archie Neal</h4>
                                <span class="designation">BBS, Instructor</span>
                            </div>
                        </div>
                        <!-- Single Team End -->

                    </div>
                    <div class="col">

                        <!-- Single Team Start -->
                        <div class="single-team">
                            <div class="team-thumb">
                                <img src="{{ asset('template/frontend') }}/assets/images/author/author-05.jpg" alt="Author">
                            </div>
                            <div class="team-content">
                                <div class="rating">
                                    <span class="count">4.9</span>
                                    <i class="icofont-star"></i>
                                    <span class="text">(rating)</span>
                                </div>
                                <h4 class="name">Randal Ramsey</h4>
                                <span class="designation">MBBS, Instructor</span>
                            </div>
                        </div>
                        <!-- Single Team End -->

                    </div>
                    <div class="col">

                        <!-- Single Team Start -->
                        <div class="single-team">
                            <div class="team-thumb">
                                <img src="{{ asset('template/frontend') }}/assets/images/author/author-06.jpg" alt="Author">
                            </div>
                            <div class="team-content">
                                <div class="rating">
                                    <span class="count">4.9</span>
                                    <i class="icofont-star"></i>
                                    <span class="text">(rating)</span>
                                </div>
                                <h4 class="name">Rochelle Thomas</h4>
                                <span class="designation">MSC, Instructor</span>
                            </div>
                        </div>
                        <!-- Single Team End -->

                    </div>
                    <div class="col">

                        <!-- Single Team Start -->
                        <div class="single-team">
                            <div class="team-thumb">
                                <img src="{{ asset('template/frontend') }}/assets/images/author/author-07.jpg" alt="Author">
                            </div>
                            <div class="team-content">
                                <div class="rating">
                                    <span class="count">4.9</span>
                                    <i class="icofont-star"></i>
                                    <span class="text">(rating)</span>
                                </div>
                                <h4 class="name">Della Salazar</h4>
                                <span class="designation">BBA, Instructor</span>
                            </div>
                        </div>
                        <!-- Single Team End -->

                    </div>
                    <div class="col">

                        <!-- Single Team Start -->
                        <div class="single-team">
                            <div class="team-thumb">
                                <img src="{{ asset('template/frontend') }}/assets/images/author/author-08.jpg" alt="Author">
                            </div>
                            <div class="team-content">
                                <div class="rating">
                                    <span class="count">4.9</span>
                                    <i class="icofont-star"></i>
                                    <span class="text">(rating)</span>
                                </div>
                                <h4 class="name">Ricardo Patrick</h4>
                                <span class="designation">MBA, Instructor</span>
                            </div>
                        </div>
                        <!-- Single Team End -->

                    </div>
                    <div class="col">

                        <!-- Single Team Start -->
                        <div class="single-team">
                            <div class="team-thumb">
                                <img src="{{ asset('template/frontend') }}/assets/images/author/author-09.jpg" alt="Author">
                            </div>
                            <div class="team-content">
                                <div class="rating">
                                    <span class="count">4.9</span>
                                    <i class="icofont-star"></i>
                                    <span class="text">(rating)</span>
                                </div>
                                <h4 class="name">Kurt Stewart</h4>
                                <span class="designation">BBS, Instructor</span>
                            </div>
                        </div>
                        <!-- Single Team End -->

                    </div>
                    <div class="col">

                        <!-- Single Team Start -->
                        <div class="single-team">
                            <div class="team-thumb">
                                <img src="{{ asset('template/frontend') }}/assets/images/author/author-10.jpg" alt="Author">
                            </div>
                            <div class="team-content">
                                <div class="rating">
                                    <span class="count">4.9</span>
                                    <i class="icofont-star"></i>
                                    <span class="text">(rating)</span>
                                </div>
                                <h4 class="name">Rodney Terry</h4>
                                <span class="designation">MBBS, Instructor</span>
                            </div>
                        </div>
                        <!-- Single Team End -->

                    </div>
                </div>
            </div>
            <!-- Team Wrapper End -->

        </div>
    </div>
    <!-- Team Member's End -->

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

                <img class="shape-1 animation-right" src="{{ asset('template/frontend') }}/assets/images/shape/shape-14.png" alt="Shape">

                <!-- Download App Button End -->
                <div class="download-app-btn">
                    <ul class="app-btn">
                        <li><a href="#"><img src="{{ asset('template/frontend') }}/assets/images/google-play.png" alt="Google Play"></a></li>
                        <li><a href="#"><img src="{{ asset('template/frontend') }}/assets/images/app-store.png" alt="App Store"></a></li>
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
                                    <img src="{{ asset('template/frontend') }}/assets/testi/st1.png"
                                        alt="Author">

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
                                   <img src="{{ asset('template/frontend') }}/assets/testi/st2.png"
                                        alt="Author">

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
                                   <img src="{{ asset('template/frontend') }}/assets/testi/st3.png"
                                        alt="Author">

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
    <div class="section section-padding">
        <div class="container">

            <!-- Brand Logo Wrapper Start -->
            <div class="brand-logo-wrapper">

                <img class="shape-1" src="{{ asset('template/frontend') }}/assets/images/shape/shape-19.png" alt="Shape">

                <img class="shape-2 animation-round" src="{{ asset('template/frontend') }}/assets/images/shape/shape-20.png" alt="Shape">

                <!-- Section Title Start -->
                <div class="section-title shape-03">
                    <h2 class="main-title">Mitra <span> Kami.</span></h2>
                </div>
                <!-- Section Title End -->

                <!-- Brand Logo Start -->
                <div class="brand-logo brand-active">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            <div class="single-brand swiper-slide">
                                <img src="{{ asset('template/frontend') }}/assets/mitra/1.webp" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="{{ asset('template/frontend') }}/assets/mitra/2.webp" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="{{ asset('template/frontend') }}/assets/mitra/3.webp" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="{{ asset('template/frontend') }}/assets/mitra/4.webp" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="{{ asset('template/frontend') }}/assets/mitra/5.webp" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                        </div>
                    </div>
                </div>
                <!-- Brand Logo End -->

            </div>
            <!-- Brand Logo Wrapper End -->

        </div>
    </div>
    <!-- Brand Logo End -->
@endsection
