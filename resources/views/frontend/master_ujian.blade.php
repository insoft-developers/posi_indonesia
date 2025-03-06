<!DOCTYPE html>
<html lang="en" translate="no">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>POSI - Indonesia</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="google-site-verification" content="translate-no" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>


    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/frontend') }}/assets/images/pav.png">

    <!-- CSS
 ============================================ -->

    <!-- Google Fonts CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('template/frontend') }}/assets/css/plugins/icofont.min.css">
    <link rel="stylesheet" href="{{ asset('template/frontend') }}/assets/css/plugins/flaticon.css">
    <link rel="stylesheet" href="{{ asset('template/frontend') }}/assets/css/plugins/font-awesome.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('template/frontend') }}/assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="{{ asset('template/frontend') }}/assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('template/frontend') }}/assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('template/frontend') }}/assets/css/plugins/apexcharts.css">
    <link rel="stylesheet" href="{{ asset('template/frontend') }}/assets/css/plugins/jqvmap.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">


    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('template/frontend') }}/assets/css/style.css">


    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <link rel="stylesheet" href="{{ asset('template/frontend') }}/assets/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="{{ asset('template/frontend') }}/assets/css/style.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    @include('frontend.css')

</head>

<body>


    <div class="main-wrapper">

        <!-- Header Section Start -->
        <div class="header-section">

           

            <!-- Header Main Start -->
            <div class="header-main">
                <div class="container">

                    <!-- Header Main Start -->
                    <div class="header-main-wrapper">

                        <!-- Header Logo Start -->
                        <div class="header-logo">
                            <a href="{{ url('/') }}"><img
                                    src="{{ asset('template/frontend') }}/assets/images/logo.png" alt="Logo"></a>
                        </div>
                        <!-- Header Logo End -->

                        <!-- Header Menu Start -->
                        <div class="header-menu d-none d-lg-block">
                            <center><p class="waktu-ujian"><i class="icofont-clock-time"></i> <span id="waktu-ujian"></span></p></center>
                            
                        </div>
                        <div class="header-menu d-none d-lg-block">
                           
                            <h2>{{ $session->competition->title }} - {{ $session->study->pelajaran->name }}</h2>
                        </div>
                      

                        <!-- Header Mobile Toggle Start -->
                        {{-- <div class="header-toggle d-lg-none">
                            <a class="menu-toggle" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div> --}}
                        <!-- Header Mobile Toggle End -->

                    </div>
                    <!-- Header Main End -->

                </div>
            </div>
            <!-- Header Main End -->

        </div>
        <!-- Header Section End -->

        <!-- Mobile Menu Start -->
        {{-- <div class="mobile-menu">

            <!-- Menu Close Start -->
            <a class="menu-close" href="javascript:void(0)">
                <i class="icofont-close-line"></i>
            </a>
            <!-- Menu Close End -->

            <!-- Mobile Top Medal Start -->
            <div class="mobile-top">
                <p><i class="flaticon-phone-call"></i> <a href="tel:9702621413">(970) 262-1413</a></p>
                <p><i class="flaticon-email"></i> <a href="mailto:address@gmail.com">address@gmail.com</a></p>
            </div>
            <!-- Mobile Top Medal End -->

            <!-- Mobile Sing In & Up Start -->
            <div class="mobile-sign-in-up">
                <ul>
                    <li><a class="sign-in" href="login.html">Masuk</a></li>
                    <li><a class="sign-up" href="register.html">Daftar</a></li>
                </ul>
            </div>
            <!-- Mobile Sing In & Up End -->

            <!-- Mobile Menu Start -->
            <div class="mobile-menu-items">
                <ul class="nav-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>
                        <a href="#">Tentang</a>

                    </li>
                    <li>
                        <a href="#">Info </a>
                        <ul class="sub-menu">
                            <li><a href="about.html">Berita</a></li>
                            <li><a href="register.html">Event</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#">Kontak</a>

                    </li>
                    <li><a href="contact.html">Pengumuman</a></li>
                </ul>

            </div>
            <!-- Mobile Menu End -->

            <!-- Mobile Menu End -->
            <div class="mobile-social">
                <ul class="social">
                    <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                    <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                    <li><a href="#"><i class="flaticon-skype"></i></a></li>
                    <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                </ul>
            </div>
            <!-- Mobile Menu End -->

        </div> --}}
        <!-- Mobile Menu End -->

        <!-- Overlay Start -->
        <div class="overlay"></div>
        <!-- Overlay End -->

        <!-- Slider Start -->


        @yield('content')



      

        <!--Back To Start-->
        <a href="#" class="back-to-top">
            <i class="icofont-simple-up"></i>
        </a>
        <!--Back To End-->

    </div>






    <!-- JS
    ============================================ -->

    <!-- Modernizer & jQuery JS -->
    <script src="{{ asset('template/frontend') }}/assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="{{ asset('template/frontend') }}/assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

    <!-- Bootstrap JS -->
    {{-- <script src="{{ asset('template/frontend') }}/assets/js/plugins/popper.min.js"></script>
    <script src="{{ asset('template/frontend') }}/assets/js/plugins/bootstrap.min.js"></script>  --}}

    <!-- Plugins JS -->
    {{-- <script src="{{ asset('template/frontend') }}/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{ asset('template/frontend') }}/assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('template/frontend') }}/assets/js/plugins/video-playlist.js"></script>
    <script src="{{ asset('template/frontend') }}/assets/js/plugins/ajax-contact.js"></script> --}}

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <script src="{{ asset('template/frontend') }}/assets/js/plugins.min.js"></script>


    <!-- Main JS -->
    <script src="{{ asset('template/frontend') }}/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

   

    @include('frontend.js')

</body>

</html>
