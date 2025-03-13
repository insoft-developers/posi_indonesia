@extends('frontend.master')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">


    </div>
    <!-- Page Banner End -->

    <!-- Blog Start -->
    <div class="section section-padding mt-n10">
        <div class="container">

            <!-- Blog Wrapper Start -->
            <div class="blog-wrapper">
                <div class="row">

                    @foreach($data as $d)
                    <div class="col-lg-4 col-md-6">

                        <!-- Single Blog Start -->
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="{{ url('event-detail/'.$d->slug) }}"><img class="event-image" src="{{ asset('storage/image_files/event/'.$d->image) }}"
                                        alt="Blog"></a>
                            </div>
                            <div class="blog-content">
                                

                                <h4 class="title"><a href="{{ url('event-detail/'.$d->slug) }}">{{ $d->title }}</a></h4>

                                <div class="blog-meta">
                                    <span> <i class="icofont-calendar"></i> {{ date('d F Y', strtotime($d->created_at)) }}</span>
                                    <span> <i class="icofont-heart"></i></span>
                                </div>

                                <a href="{{ url('event-detail/'.$d->slug) }}" class="btn btn-secondary btn-hover-primary">Selengkapnya</a>
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
    </div>
    <!-- Blog End -->
@endsection
