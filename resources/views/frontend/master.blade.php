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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

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

            <!-- Header Top Start -->
            <div class="header-top d-none d-lg-block">
                <div class="container">

                    <!-- Header Top Wrapper Start -->
                    <div class="header-top-wrapper">
                        @php
                        $setting = \App\Models\Setting::find(1);
                        @endphp
                        <!-- Header Top Left Start -->
                        <div class="header-top-left">
                            <p>{{ $setting->header_note }}</p>
                        </div>
                        <!-- Header Top Left End -->

                        <!-- Header Top Medal Start -->
                       
                        <div class="header-top-medal">
                            <div class="top-info">
                                <p><i class="flaticon-phone-call"></i> <a href="tel:{{ $setting->admin_wa }}">{{ $setting->admin_wa }}</a>
                                </p>
                                <p><i class="flaticon-email"></i> <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                                </p>
                            </div>
                        </div>
                        <!-- Header Top Medal End -->

                        <!-- Header Top Right Start -->
                        <div class="header-top-right">
                            <ul class="social">
                                <li><a target="_blank"
                                        href="https://www.facebook.com/@posipelatihanolimpiade/?locale=id_ID"><i
                                            class="flaticon-facebook"></i></a></li>
                                <li><a target="_blank" href="https://x.com/posi_idn?mx=2"><i
                                            class="flaticon-twitter"></i></a></li>

                                <li><a target="_blank" href="https://www.instagram.com/posi.idn"><i
                                            class="flaticon-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- Header Top Right End -->

                    </div>
                    <!-- Header Top Wrapper End -->

                </div>
            </div>
            <!-- Header Top End -->

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
                            <ul class="nav-menu">
                                @if (Auth::check())
                                    <li><a href="{{ url('/main') }}">Kompetisi</a></li>
                                    <li>
                                        <a href="{{ url('/jadwal') }}">Jadwal</a>
                                    </li>
                                    <li><a href="{{ url('/riwayat') }}">Riwayat</a></li>
                                    <li>
                                        <a href="{{ url('/transaction') }}">Transaksi</a>
                                    </li>
                                @else
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li>
                                        <a href="{{ url('/about') }}">Tentang</a>
                                    </li>

                                    <li>
                                        <a href="#">Info</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="#">Berita</a>

                                            </li>
                                            <li>
                                                <a href="#">Event</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li><a href="{{ url('/contact') }}">Kontak</a></li>
                                    <li><a href="#">Pengumuman</a></li>
                                @endif
                            </ul>

                        </div>
                        <!-- Header Menu End -->

                        <!-- Header Sing In & Up Start -->
                        <div class="header-sign-in-up d-none d-lg-block">
                            @if (Auth::check())
                                @php
                                    $user = \App\Models\User::findorFail(Auth::user()->id);
                                @endphp
                                <ul>
                                    <li>

                                        <img class="profile-image"
                                            src="{{ asset('template/frontend') }}/assets/umum/notif.png"
                                            alt="notif"><span class="notif-number">0</span>

                                    </li>
                                    @php
                                        $jumlah = \App\Models\Cart::where('buyer', Auth::user()->id)
                                            
                                            ->get();
                                        if ($jumlah->count() > 0) {
                                            $style = '';
                                        } else {
                                            $style = 'display:none;';
                                        }
                                    @endphp
                                    <li>

                                        <a href="{{ url('cart') }}"><img class="profile-image"
                                                src="{{ asset('template/frontend') }}/assets/umum/keranjang.png"
                                                alt="cart"><span class="cart-number"
                                                style="{{ $style }}">{{ $jumlah->count() }}</span> </a>



                                    </li>
                                    <li>
                                        @if ($user->user_image == null)
                                            @if ($user->jenis_kelamin == 'Laki Laki')
                                                <img class="profile-image"
                                                    src="{{ asset('template/frontend/assets/umum/profile2.png') }}"
                                                    alt="Author">
                                            @else
                                                <img class="profile-image"
                                                    src="{{ asset('template/frontend/assets/umum/profile1.png') }}"
                                                    alt="Author">
                                            @endif
                                        @else
                                            @if ($user->google_id == null)
                                                <img class="profile-image"
                                                    src="{{ asset('storage/image_files/profile/' . $user->user_image) }}"
                                                    alt="Author">
                                            @else
                                                <img class="profile-image" src="{{ $user->user_image }}"
                                                    alt="Author">
                                            @endif
                                        @endif

                                    </li>
                                    <li>
                                        <div class="login-header-action ml-auto">


                                            <div class="dropdown">
                                                <button class="action more" data-bs-toggle="dropdown">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </button>
                                                <ul class="dropdown-menu menu-user">
                                                    <li><a class=""
                                                            href="{{ url('after_register/' . Auth::user()->id) }}">
                                                            Profile</a></li>
                                                    <li><a class="" href="{{ url('/main') }}"> Kompetisi</a>
                                                    </li>
                                                    <li><a class="" href="#"> Pengaturan</a></li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <li
                                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                            <a class="" href="{{ route('logout') }}"><i
                                                                    class="icofont-logout"></i> Keluar</a>
                                                        </li>
                                                    </form>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            @else
                                <ul>
                                    <li><a class="sign-in" href="{{ route('login') }}">Masuk</a></li>
                                    <li><a class="sign-up" href="{{ route('register') }}">Daftar</a></li>
                                </ul>
                            @endif
                        </div>
                        <!-- Header Sing In & Up End -->

                        <!-- Header Mobile Toggle Start -->
                        <div class="header-toggle d-lg-none">
                            <a class="menu-toggle" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <!-- Header Mobile Toggle End -->

                    </div>
                    <!-- Header Main End -->

                </div>
            </div>
            <!-- Header Main End -->

        </div>
        <!-- Header Section End -->

        <!-- Mobile Menu Start -->
        <div class="mobile-menu">

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

        </div>
        <!-- Mobile Menu End -->

        <!-- Overlay Start -->
        <div class="overlay"></div>
        <!-- Overlay End -->

        <!-- Slider Start -->


        @yield('content')



        <div class="section footer-section">

            <!-- Footer Widget Section Start -->
            <div class="footer-widget-section">

                <img class="shape-1 animation-down"
                    src="{{ asset('template/frontend') }}/assets/images/shape/shape-21.png" alt="Shape">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 order-md-1 order-lg-1">

                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <div class="widget-logo">
                                    <a href="#"><img
                                            src="{{ asset('template/frontend') }}/assets/images/logo.png"
                                            alt="Logo"></a>
                                </div>

                                <div class="widget-address">
                                    <h4 class="footer-widget-title">POSI Indonesia</h4>
                                    <p>Jl. Eka Surya No.49, Deli Tua, Kec. Namorambe, Kabupaten Deli Serdang, Sumatera
                                        Utara 20147</p>
                                </div>

                                <ul class="widget-info">
                                    <li>
                                        <p> <i class="icofont-email pos-icon"></i> <a
                                                href="mailto:address@gmail.com">info@posi.id</a> </p>
                                    </li>
                                    <li>
                                        <p> <i class="icofont-ui-dial-phone pos-icon"></i> <a
                                                href="tel:9702621413">0852-7622-2453</a> </p>
                                    </li>
                                    <li>
                                        <p> <i class="icofont-whatsapp pos-icon"></i> <a
                                                href="tel:9702621413">0852-7622-2453</a> </p>
                                    </li>
                                </ul>

                                <ul class="widget-social">
                                    <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                                    <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                                    <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- Footer Widget End -->

                        </div>
                        <div class="col-lg-6 order-md-3 order-lg-2">

                            <!-- Footer Widget Link Start -->
                            <div class="footer-widget-link">

                                <!-- Footer Widget Start -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget-title">Menu Utama</h4>

                                    <ul class="widget-link">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Tentang</a></li>
                                        <li><a href="#">Info</a></li>
                                        <li><a href="#">Kontak</a></li>
                                        <li><a href="#">Pengumuman</a></li>

                                    </ul>

                                </div>
                                <!-- Footer Widget End -->

                                <!-- Footer Widget Start -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget-title">Kebijakan</h4>

                                    <ul class="widget-link">
                                        <li><a href="#">Kebijakan Privasi</a></li>
                                        <li><a href="#">Syarat & Ketentuan</a></li>
                                        <li><a href="#">Kebijakan Refund</a></li>

                                    </ul>

                                </div>
                                <!-- Footer Widget End -->

                            </div>
                            <!-- Footer Widget Link End -->

                        </div>
                        <div class="col-lg-3 col-md-6 order-md-2 order-lg-3">

                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Kontak Kami</h4>

                                <div class="widget-subscribe">
                                    <p>Masukkan no. Whatsapp dan Email Anda</p>

                                    <div class="widget-form">
                                        <form action="#">
                                            <input type="text" placeholder="Masukkan No. Whatsapp">
                                            <div style="margin-top: 10px"></div>
                                            <input type="text" placeholder="Masukkan emal anda">
                                            <button class="btn btn-primary btn-hover-dark">Kirim</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Footer Widget End -->

                        </div>
                    </div>
                </div>

                <img class="shape-2 animation-left"
                    src="{{ asset('template/frontend') }}/assets/images/shape/shape-22.png" alt="Shape">

            </div>
            <!-- Footer Widget Section End -->

            <!-- Footer Copyright Start -->
            <div class="footer-copyright">
                <div class="container">

                    <!-- Footer Copyright Start -->
                    <div class="copyright-wrapper">
                        <div class="copyright-link">
                            <a href="#">Syarat & Ketentuan</a>
                            <a href="#">Kebijakan Privasi</a>
                            <a href="#">Kebijakan Refund</a>
                        </div>
                        <div class="copyright-text">
                            <p>&copy; {{ date('Y') }} <span> Pusat Olimpiade Sains Indonesia </span> ( POSI )</p>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->

                </div>
            </div>
            <!-- Footer Copyright End -->

        </div>
        <!-- Footer End -->

        <!--Back To Start-->
        <a href="#" class="back-to-top">
            <i class="icofont-simple-up"></i>
        </a>
        <!--Back To End-->

    </div>
    @php
    $setting = \App\Models\Setting::findorFail(1);
    @endphp
    <a href="https://api.whatsapp.com/send/?phone={{ $setting->whatsapp }}&text&type=phone_number&app_absent=0" target="_blank"><img class="wa-chat" src="{{ asset('template/frontend/assets/umum/wa_icon.png') }}"></a>



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
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6790d0ff825083258e091ad3/1ii6r0qam';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

</body>

</html>
