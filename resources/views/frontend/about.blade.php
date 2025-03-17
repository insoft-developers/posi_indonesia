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
                <div class="row">
                    <div class="col-lg-6">

                        <!-- About Images Start -->
                        <div class="about-images">
                            <div class="images">
                                <img src="{{ asset('storage/image_files/about/'.$about->image) }}" alt="About">
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
                           
                            <h2 class="main-title">{{ $about->title }}</h2>
                            <?= $about->about_text ;?>
                            
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
                                        <h3 class="title">{{ $about->sub1 }}</h3>
                                    </div>
                                </div>
                                <?= $about->content1 ;?>
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
                                        <h3 class="title">{{ $about->sub2 }}</h3>
                                    </div>
                                </div>
                                <?= $about->content2 ;?>
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
                                        <h3 class="title">{{ $about->sub3 }}</h3>
                                    </div>
                                </div>
                                <?= $about->content3 ;?>
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
                                <li>{{ $homepage->visi }}
                                </li>
                            </ul>
                            <br>
                            <h2 class="main-title">MI<span>SI</span></h2>
                            <br>
                            <?= $homepage->misi ;?>

                        </div>
                        <!-- Section Title End -->

                    </div>
                    <div class="col-md-6">
                        <div class="call-to-action-btn">
                            <a class="btn btn-primary btn-hover-dark" href="{{ url('register') }}">Daftar Sekarang Juga</a>
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
                <h5 class="sub-title"> Tim utama dalam pengembangan dan operasi perusahaan</h5>
                <h2 class="main-title">Super <span> Team</span></h2>
            </div>
            <!-- Section Title End -->

            <!-- Team Wrapper Start -->
            <div class="team-wrapper">
                <div class="row row-cols-lg-5 row-cols-sm-3 row-cols-2 ">
                    
                    @foreach($teams as $team)
                    <div class="col">

                        <!-- Single Team Start -->
                        <div class="single-team">
                            <div class="team-thumb">
                                <img src="{{ asset('storage/image_files/teams/'.$team->image) }}" alt="Author">
                            </div>
                            <div class="team-content">
                                
                                <h4 class="name">{{ $team->name }}</h4>
                                <span class="designation">{{ $team->title }}</span>
                            </div>
                        </div>
                        <!-- Single Team End -->

                    </div>
                    
                    @endforeach
                    

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
                        @foreach($testimony as $t)
                        <div class="single-testimonial swiper-slide">
                            <div class="testimonial-author">
                                <div class="author-thumb">
                                    <img src="{{ asset('storage/image_files/testimony/'.$t->image) }}" alt="Testi">

                                    <i class="icofont-quote-left"></i>
                                </div>

                                <span class="rating-star">
                                    <span class="rating-bar" style="width: 80%;"></span>
                                </span>
                            </div>
                            <div class="testimonial-content">
                                <p>{{ $t->message }}</p>
                                <h4 class="name">{{ $t->name }}</h4>
                                <span class="designation">{{ $t->title }}</span>
                            </div>
                        </div>
                        @endforeach
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


                            @foreach($partners as $partner)
                            <div class="single-brand swiper-slide">
                                <img src="{{ asset('storage/image_files/partners/'.$partner->image) }}" alt="">
                            </div>
                            @endforeach

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
