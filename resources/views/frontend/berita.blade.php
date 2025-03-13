@extends('frontend.master')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">


    </div>
    <!-- Page Banner End -->

    <!-- Blog Start -->
    <div class="section section-padding mt-n10">
        <div class="container">

            <div class="row gx-10">
                <div class="col-lg-8">

                    <!-- Blog Wrapper Start -->
                    <div class="blog-wrapper">
                        <div class="row">
                            @foreach($data as $d)
                            <div class="col-md-6">

                                <!-- Single Blog Start -->
                                <div class="single-blog">
                                    <div class="blog-image">
                                        <a href="{{ url('berita-detail/'.$d->slug) }}"><img src="{{ asset('storage/image_files/berita/'.$d->image) }}"
                                                alt="Berita"></a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-author">
                                            <div class="author">
                                                <div class="author-thumb">
                                                   
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="{{ url('berita-detail/'.$d->slug) }}">{{ $d->admin->name }}</a>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <a href="#">{{ $d->kategori->category }}</a>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="{{ url('berita-detail/'.$d->slug) }}">{{ $d->title }}</a></h4>

                                        <div class="blog-meta">
                                            <span> <i class="icofont-calendar"></i>{{ date('d F Y', strtotime($d->created_at)) }}</span>
                                            <span> <i class="icofont-heart"></i></span>
                                        </div>

                                        <a href="{{ url('berita-detail/'.$d->slug) }}"
                                            class="btn btn-secondary btn-hover-primary">Selengkapnya</a>
                                    </div>
                                </div>
                                <!-- Single Blog End -->

                            </div>
                           @endforeach
                        </div>
                    </div>
                    <!-- Blog Wrapper End -->

                    <!-- Page Pagination End -->
                    <div class="page-pagination">
                        <ul class="pagination justify-content-center">
                            {{ $data->links() }}
                        </ul>
                    </div>
                    <!-- Page Pagination End -->

                </div>
                <div class="col-lg-4">

                    <!-- Blog Sidebar Start -->
                    <div class="sidebar">
                        <!-- Sidebar Widget Category Start -->
                        <div class="sidebar-widget">
                            <h4 class="widget-title">Kategori Berita</h4>

                            <div class="widget-category">
                                <ul class="category-list">
                                    @foreach($cat as $c)
                                    <li><a href="{{ url('berita-category/'.$c->slug) }}">{{ $c->category }} <span>({{ $c->berita->count() }})</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Widget Category End -->

                        <!-- Sidebar Widget Post Start -->
                        <div class="sidebar-widget">
                            <h4 class="widget-title">Berita Terbaru</h4>

                            <div class="widget-post">
                                <ul class="post-items">
                                    @foreach($terbaru as $t)
                                    <li>
                                        <!-- Sidebar Widget Post Start -->
                                        <div class="single-post">
                                            <div class="post-thumb">
                                                <a href="{{ url('berita-detail/'.$t->slug) }}"><img
                                                        src="{{ asset('storage/image_files/berita/'.$t->image) }}"></a>
                                            </div>
                                            <div class="post-content">
                                                <h5 class="title"><a href="{{ url('berita-detail/'.$t->slug) }}">{{ $t->title }}</a></h5>
                                                <span class="date"><i class="icofont-calendar"></i> {{ date('d F Y', strtotime($t->created_at)) }}</span>
                                            </div>
                                        </div>
                                        <!-- Sidebar Widget Post End -->
                                    </li>
                                   @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Widget Post End -->

                       

                        <!-- Sidebar Widget Share Start -->
                        
                        <!-- Sidebar Widget Share End -->

                    </div>
                    <!-- Blog Sidebar End -->

                </div>
            </div>

        </div>
    </div>
    <!-- Blog End -->
@endsection
