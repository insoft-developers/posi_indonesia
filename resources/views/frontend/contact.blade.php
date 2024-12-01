@extends('frontend.master')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">

      

    </div>
    <!-- Page Banner End -->

    <!-- Contact Map Start -->
    <div class="section section-padding-02">
        <div class="container">

            <!-- Contact Map Wrapper Start -->
            <div class="contact-map-wrapper">
                <iframe id="gmap_canvas"
                    src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
            </div>
            <!-- Contact Map Wrapper End -->

        </div>
    </div>
    <!-- Contact Map End -->

    <!-- Contact Start -->
    <div class="section section-padding">
        <div class="container">

            <!-- Contact Wrapper Start -->
            <div class="contact-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6">

                        <!-- Contact Info Start -->
                        <div class="contact-info">

                            <img class="shape animation-round" src="{{ asset('template/frontend') }}/assets/images/shape/shape-12.png" alt="Shape">

                            <!-- Single Contact Info Start -->
                            <div class="single-contact-info">
                                <div class="info-icon">
                                    <i class="flaticon-phone-call"></i>
                                </div>
                                <div class="info-content">
                                    <h6 class="title">No Telepon</h6>
                                    <p><a href="tel:88193326867">0852-7622-2453</a></p>
                                </div>
                            </div>
                            <!-- Single Contact Info End -->
                            <!-- Single Contact Info Start -->
                            <div class="single-contact-info">
                                <div class="info-icon">
                                    <i class="flaticon-email"></i>
                                </div>
                                <div class="info-content">
                                    <h6 class="title">Alamat Email.</h6>
                                    <p><a href="mailto:edule100@gmail.com">info@posi.id</a></p>
                                </div>
                            </div>
                            <!-- Single Contact Info End -->
                            <!-- Single Contact Info Start -->
                            <div class="single-contact-info">
                                <div class="info-icon">
                                    <i class="flaticon-pin"></i>
                                </div>
                                <div class="info-content">
                                    <h6 class="title">Alamat Kantor.</h6>
                                    <p>Jl. Eka Surya No.49, Deli Tua, Kec. Namorambe, Kabupaten Deli Serdang, Sumatera Utara 20147</p>
                                </div>
                            </div>
                            <!-- Single Contact Info End -->
                        </div>
                        <!-- Contact Info End -->

                    </div>
                    <div class="col-lg-6">

                        <!-- Contact Form Start -->
                        <div class="contact-form">
                            <h3 class="title">Hubungi <span>Kami</span></h3>

                            <div class="form-wrapper">
                                <form id="contact-form" action="https://htmlmail.hasthemes.com/humayun/edule-contact.php"
                                    method="POST">
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="text" name="name" placeholder="Nama Anda">
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="email" name="email" placeholder="Email Anda">
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="text" name="subject" placeholder="Judul">
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <textarea name="message" placeholder="Pesan Anda"></textarea>
                                    </div>
                                    <!-- Single Form End -->
                                    <p class="form-message"></p>
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <button class="btn btn-primary btn-hover-dark w-100">Kirim <i
                                                class="flaticon-right"></i></button>
                                    </div>
                                    <!-- Single Form End -->
                                </form>
                            </div>
                        </div>
                        <!-- Contact Form End -->

                    </div>
                </div>
            </div>
            <!-- Contact Wrapper End -->

        </div>
    </div>
    <!-- Contact End -->
@endsection
