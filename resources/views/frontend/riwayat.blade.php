@extends('frontend.master')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">


    </div>
    <!-- Page Banner End -->

    <!-- Blog Start -->
    <div class="section section-padding mt-n10">
        <div class="container">

            <!-- Blog Wrapper End -->
            <div class="section-title shape-03">
                <h2 class="main-judul">Riwayat</h2>
            </div>
            <div class="blog-wrapper">

                <div style="margin-top:30px;"></div>
                <div class="row">
                  
                       

                            @foreach ($com as $c)
                              
                                <div class="col-md-4">

                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $c->title }}</h5>
                                            <div style="margin-top:-10px;"></div>
                                            <p>{{ $c->levels->level_name }}</p>
                                            <div style="margin-top:-13px;"></div>
                                            <hr />
                                            @foreach ($c->transaction as $s)
                                                @if($s->userid == Auth::user()->id)
                                                <div
                                                    class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">


                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                        <div>
                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                <img src="{{ asset('template/frontend/assets/umum/pulpen.png') }}" class="timeline-icons">
                                                            </span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <h4 class="timeline-title">{{ $s->study->pelajaran->name }}</h4>

                                                                <p class="timeline-subtitle">Sebagai Peserta Aktif</p>
                                                                <div class="list-tools" style="margin-left: -8px;">
                                                                    <div class="riwayat-tools">
                                                                    <img class="riwayat-tools-image" src="{{ asset('template/frontend/assets/umum/pengumuman.png') }}"><span class="riwayat-text">Pengumuman</span>
                                                                    </div>
                                                                    <div class="riwayat-tools">
                                                                        <img class="riwayat-tools-image" src="{{ asset('template/frontend/assets/umum/sertifikat2.png') }}"><span class="riwayat-text">Sertifikat Digital</span>
                                                                        </div>
                                                                        <div class="riwayat-tools">
                                                                            <img class="riwayat-tools-image" src="{{ asset('template/frontend/assets/umum/piagam.png') }}"><span class="riwayat-text">Piagam Digital</span>
                                                                            </div>
                                                                            <div class="riwayat-tools">
                                                                                <img class="riwayat-tools-image" src="{{ asset('template/frontend/assets/umum/pembahasan.png') }}"><span class="riwayat-text">Pembahasan</span>
                                                                                </div>
                                                                                <div class="riwayat-tools">
                                                                                    <img class="riwayat-tools-image" src="{{ asset('template/frontend/assets/umum/forum.png') }}"><span class="riwayat-text">Forum</span>
                                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               @endif
                                            @endforeach




                                        </div>
                                    </div>
                                </div>

                       
                        @endforeach
                    
                </div>

            </div>
        </div>
        <div style="margin-top:50px;"></div>
    </div>
    </div>
    <!-- Blog End -->
@endsection
