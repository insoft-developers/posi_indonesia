<!-- Page Banner Start -->
@extends('frontend.master')

@section('content')

<div class="section page-banner">

    

</div>
<!-- Page Banner End -->

<!-- Blog Details Start -->
<div class="section section-padding mt-n10">
    <div class="container">

        <div class="row flex-row-reverse gx-10">
            <div class="col-lg-8">

                <!-- Blog Details Wrapper Start -->
                <div class="blog-details-wrapper">
                    <div class="blog-details-admin-meta">
                        <div class="author">
                            <div class="author-thumb">
                               
                            </div>
                            <div class="author-name">
                                <a class="name" href="#">{{ $data->admin->name ?? null }}</a>
                            </div>
                        </div>
                        <div class="blog-meta">
                            <span> <i class="icofont-calendar"></i> {{ date('d F Y', strtotime($data->created_at)) }}</span>
                            <span class="tag"><a href="#">{{ $data->kategori->category }}</a></span>
                        </div>
                    </div>

                    <h2 class="title">{{ $data->title }}.</h2>

                    <div class="blog-details-description" style="text-align: justify">
                        <img src="{{ asset('storage/image_files/berita/'.$data->image) }}" alt="Blog Details">

                        <?= $data->content  ;?>

                    </div>

                   

                </div>
                <!-- Blog Details Wrapper End -->

                <!-- Blog Details Comment End -->
               
                <!-- Blog Details Comment End -->

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
<!-- Blog Details End -->
@endsection