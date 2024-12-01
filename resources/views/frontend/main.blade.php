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
                    <div class="col-lg-4 col-md-6">

                        <!-- Single Blog Start -->
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="blog-details-left-sidebar.html"><img src="{{asset('template/frontend')}}/assets/images/blog/blog-01.jpg"
                                        alt="Blog"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-author">
                                    <div class="author">
                                        <div class="author-thumb">
                                            <a href="#"><img src="{{asset('template/frontend')}}/assets/images/author/author-01.jpg"
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

                                <h4 class="title"><a href="blog-details-left-sidebar.html">Data Science and Machine
                                        Learning with Python - Hands On!</a></h4>

                                <div class="blog-meta">
                                    <span> <i class="icofont-calendar"></i> 21 March, 2021</span>
                                    <span> <i class="icofont-heart"></i> 2,568+ </span>
                                </div>

                                <a href="blog-details-left-sidebar.html" class="btn btn-secondary btn-hover-primary">Read
                                    More</a>
                            </div>
                        </div>
                        <!-- Single Blog End -->

                    </div>
                    
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
@endsection
