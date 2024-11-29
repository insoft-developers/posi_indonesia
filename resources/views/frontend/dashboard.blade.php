@extends('frontend.master')

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
                <a class="btn btn-primary btn-hover-dark" href="#">Daftar Sekarang</a>
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
                    <div class="courses-wrapper">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/event/1.webp"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">

                                                <div class="author-name">
                                                    <a class="name" href="#">29 November 2024</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">EDUNAS 1.0 - INTERMEDIATE
                                            </a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08:00 WIB</span>
                                            <span> <i class="icofont-read-book"></i> 50 Soal </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">Rp.120.000</span>
                                                <span class="old-parice">Rp.150.000</span>
                                            </div>
                                            <div class="courses-review">

                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/event/2.webp"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">

                                                <div class="author-name">
                                                    <a class="name" href="#">29 November 2024</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">EDUNAS 1.0 - INTERMEDIATE
                                            </a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08:00 WIB</span>
                                            <span> <i class="icofont-read-book"></i> 50 Soal </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">Rp.120.000</span>
                                                <span class="old-parice">Rp.150.000</span>
                                            </div>
                                            <div class="courses-review">

                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/event/3.webp"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">

                                                <div class="author-name">
                                                    <a class="name" href="#">29 November 2024</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">EDUNAS 1.0 - INTERMEDIATE
                                            </a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08:00 WIB</span>
                                            <span> <i class="icofont-read-book"></i> 50 Soal </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">Rp.120.000</span>
                                                <span class="old-parice">Rp.150.000</span>
                                            </div>
                                            <div class="courses-review">

                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>

                        </div>
                    </div>
                    <!-- All Courses Wrapper End -->

                </div>
                <div class="tab-pane fade" id="tabs2">

                    <!-- All Courses Wrapper Start -->
                    <div class="courses-wrapper">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-02.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-01.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Data Science and Machine
                                                Learning with Python - Hands On!</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$385.00</span>
                                                <span class="old-parice">$440.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-05.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-02.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Pamela Foster</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Create Amazing Color
                                                Schemes for Your UX Design Projects</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$420.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-01.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-03.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Rose Simmons</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Culture & Leadership:
                                                Strategies for a Successful Business</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$295.00</span>
                                                <span class="old-parice">$340.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-04.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-04.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Finance</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Finance Series: Learn to
                                                Budget and Calculate your Net Worth.</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">Free</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-06.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-05.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Marketing</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Build Brand Into
                                                Marketing: Tackling the New Marketing Landscape</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$136.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-03.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-06.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Design</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Graphic Design:
                                                Illustrating Badges and Icons with Geometric Shapes</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$237.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                        </div>
                    </div>
                    <!-- All Courses Wrapper End -->

                </div>
                <div class="tab-pane fade" id="tabs3">

                    <!-- All Courses Wrapper Start -->
                    <div class="courses-wrapper">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-05.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-01.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Data Science and Machine
                                                Learning with Python - Hands On!</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$385.00</span>
                                                <span class="old-parice">$440.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-06.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-02.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Pamela Foster</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Create Amazing Color
                                                Schemes for Your UX Design Projects</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$420.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-03.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-03.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Rose Simmons</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Culture & Leadership:
                                                Strategies for a Successful Business</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$295.00</span>
                                                <span class="old-parice">$340.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-01.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-04.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Finance</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Finance Series: Learn to
                                                Budget and Calculate your Net Worth.</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">Free</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-02.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-05.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Marketing</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Build Brand Into
                                                Marketing: Tackling the New Marketing Landscape</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$136.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-04.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-06.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Design</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Graphic Design:
                                                Illustrating Badges and Icons with Geometric Shapes</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$237.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                        </div>
                    </div>
                    <!-- All Courses Wrapper End -->

                </div>
                <div class="tab-pane fade" id="tabs4">

                    <!-- All Courses Wrapper Start -->
                    <div class="courses-wrapper">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-06.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-01.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Data Science and Machine
                                                Learning with Python - Hands On!</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$385.00</span>
                                                <span class="old-parice">$440.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-05.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-02.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Pamela Foster</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Create Amazing Color
                                                Schemes for Your UX Design Projects</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$420.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-04.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-03.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Rose Simmons</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Culture & Leadership:
                                                Strategies for a Successful Business</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$295.00</span>
                                                <span class="old-parice">$340.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-03.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-04.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Finance</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Finance Series: Learn to
                                                Budget and Calculate your Net Worth.</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">Free</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-02.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-05.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Marketing</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Build Brand Into
                                                Marketing: Tackling the New Marketing Landscape</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$136.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-01.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-06.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Design</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Graphic Design:
                                                Illustrating Badges and Icons with Geometric Shapes</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$237.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                        </div>
                    </div>
                    <!-- All Courses Wrapper End -->

                </div>
                <div class="tab-pane fade" id="tabs5">

                    <!-- All Courses Wrapper Start -->
                    <div class="courses-wrapper">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-03.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-01.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Data Science and
                                                Machine Learning with Python - Hands On!</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$385.00</span>
                                                <span class="old-parice">$440.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-02.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-02.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Pamela Foster</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Create Amazing Color
                                                Schemes for Your UX Design Projects</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$420.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-01.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-03.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Rose Simmons</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Culture & Leadership:
                                                Strategies for a Successful Business</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$295.00</span>
                                                <span class="old-parice">$340.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-06.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-04.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Finance</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Finance Series: Learn
                                                to Budget and Calculate your Net Worth.</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">Free</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-05.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-05.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Marketing</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Build Brand Into
                                                Marketing: Tackling the New Marketing Landscape</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$136.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-04.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-06.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Design</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Graphic Design:
                                                Illustrating Badges and Icons with Geometric Shapes</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$237.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                        </div>
                    </div>
                    <!-- All Courses Wrapper End -->

                </div>
                <div class="tab-pane fade" id="tabs6">

                    <!-- All Courses Wrapper Start -->
                    <div class="courses-wrapper">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-03.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-01.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Data Science and
                                                Machine Learning with Python - Hands On!</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$385.00</span>
                                                <span class="old-parice">$440.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-05.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-02.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Pamela Foster</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Create Amazing Color
                                                Schemes for Your UX Design Projects</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$420.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-01.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-03.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Rose Simmons</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Culture & Leadership:
                                                Strategies for a Successful Business</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$295.00</span>
                                                <span class="old-parice">$340.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-04.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-04.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Finance</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Finance Series: Learn
                                                to Budget and Calculate your Net Worth.</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">Free</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-06.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-05.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Marketing</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Build Brand Into
                                                Marketing: Tackling the New Marketing Landscape</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$136.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-02.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-06.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Design</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Graphic Design:
                                                Illustrating Badges and Icons with Geometric Shapes</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$237.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                        </div>
                    </div>
                    <!-- All Courses Wrapper End -->

                </div>
                <div class="tab-pane fade" id="tabs7">

                    <!-- All Courses Wrapper Start -->
                    <div class="courses-wrapper">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-04.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-01.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Data Science and
                                                Machine Learning with Python - Hands On!</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$385.00</span>
                                                <span class="old-parice">$440.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-02.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-02.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Pamela Foster</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Create Amazing Color
                                                Schemes for Your UX Design Projects</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$420.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-06.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-03.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Rose Simmons</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Science</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Culture & Leadership:
                                                Strategies for a Successful Business</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$295.00</span>
                                                <span class="old-parice">$340.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-05.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-04.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Finance</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Finance Series: Learn
                                                to Budget and Calculate your Net Worth.</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">Free</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-01.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-05.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Marketing</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Build Brand Into
                                                Marketing: Tackling the New Marketing Landscape</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$136.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="courses-details.html"><img
                                                src="{{ asset('template/frontend') }}/assets/images/courses/courses-03.jpg"
                                                alt="Courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('template/frontend') }}/assets/images/author/author-06.jpg"
                                                            alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">Jason Williams</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">Design</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="courses-details.html">Graphic Design:
                                                Illustrating Badges and Icons with Geometric Shapes</a></h4>
                                        <div class="courses-meta">
                                            <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                            <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                        </div>
                                        <div class="courses-price-review">
                                            <div class="courses-price">
                                                <span class="sale-parice">$237.00</span>
                                            </div>
                                            <div class="courses-review">
                                                <span class="rating-count">4.9</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                        </div>
                    </div>
                    <!-- All Courses Wrapper End -->

                </div>
            </div>
            <!-- All Courses tab content End -->

            <!-- All Courses BUtton Start -->
            <div class="courses-btn text-center">
                <a href="courses.html" class="btn btn-secondary btn-hover-primary">Kompetisi Lainnya</a>
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
                            <a class="btn btn-primary btn-hover-dark" href="contact.html">Daftar Sekarang Juga</a>
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


                            <!-- Single Brand Start -->
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
                                <a href="blog-details-left-sidebar.html"><img
                                        src="{{ asset('template/frontend') }}/assets/event/1.webp" alt="Blog"></a>
                            </div>
                            <div class="blog-content">

                                <h4 class="title"><a href="blog-details-left-sidebar.html">Penyerahan Piagam dan Trofi
                                        Kepada Juara 1 Kompetisi Olimpiade Sains Nasional</a></h4>

                                <div class="blog-meta">
                                    <span> <i class="icofont-calendar"></i> 21 November, 2024</span>
                                    <span> <i class="icofont-heart"></i> 2,568+ </span>
                                </div>

                                <a href="blog-details-left-sidebar.html"
                                    class="btn btn-secondary btn-hover-primary">Selanjutnya</a>
                            </div>
                        </div>
                        <!-- Single Blog End -->

                    </div>
                    <div class="col-lg-4 col-md-6">

                        <!-- Single Blog Start -->
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="blog-details-left-sidebar.html"><img
                                        src="{{ asset('template/frontend') }}/assets/event/2.webp" alt="Blog"></a>
                            </div>
                            <div class="blog-content">


                                <h4 class="title"><a href="blog-details-left-sidebar.html">Penyerahan Piagam dan Trofi
                                        Kepada Juara 1 Kompetisi Olimpiade Sains Nasional</a></h4>

                                <div class="blog-meta">
                                    <span> <i class="icofont-calendar"></i> 21 November, 2021</span>
                                    <span> <i class="icofont-heart"></i> 2,568+ </span>
                                </div>

                                <a href="blog-details-left-sidebar.html"
                                    class="btn btn-secondary btn-hover-primary">Selanjutnya</a>
                            </div>
                        </div>
                        <!-- Single Blog End -->

                    </div>
                    <div class="col-lg-4 col-md-6">

                        <!-- Single Blog Start -->
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="blog-details-left-sidebar.html"><img
                                        src="{{ asset('template/frontend') }}/assets/event/3.webp" alt="Blog"></a>
                            </div>
                            <div class="blog-content">


                                <h4 class="title"><a href="blog-details-left-sidebar.html">Penyerahan Piagam dan Trofi
                                        Kepada Juara 1 Kompetisi Olimpiade Sains Nasional</a></h4>

                                <div class="blog-meta">
                                    <span> <i class="icofont-calendar"></i> 21 November, 2021</span>
                                    <span> <i class="icofont-heart"></i> 2,568+ </span>
                                </div>

                                <a href="blog-details-left-sidebar.html"
                                    class="btn btn-secondary btn-hover-primary">Selanjutnya</a>
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
