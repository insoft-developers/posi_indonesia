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
               <div class="row" style="text-align: justify">
                <?= $data->refund ;?>
               </div>
            </div>
            <!-- Blog Wrapper End -->

            <!-- Page Pagination End -->
           

        </div>
    </div>
    <!-- Blog End -->
@endsection
