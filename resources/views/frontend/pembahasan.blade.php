@extends('frontend.master')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">



    </div>
    <!-- Page Banner End -->

    <!-- About Start -->
    <div class="section" style="background: rgb(237, 235, 235);">

        <div class="section-padding-02 mt-n10">
            <div class="container">
                <embed src="{{ asset('storage/image_files/pembahasan') }}/{{ $ujian->file_pembahasan }}#toolbar=0"
                    frameBorder="0" scrolling="auto" height="900px" width="100%"></embed>
                <div class="toolbar-hide"></div>
            </div>
        </div>
        <div style="margin-top: 50px;"></div>

    </div>
    <!-- About End -->
@endsection
