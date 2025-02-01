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
                                      
                                        @if ($s->userid == Auth::user()->id && $s->invoices->payment_status == 1 && $s->invoices->transaction_status == 1)
                                            <div
                                                class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">


                                                <div class="vertical-timeline-item vertical-timeline-element">
                                                    <div>
                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                            <img src="{{ asset('template/frontend/assets/umum/pulpen.png') }}"
                                                                class="timeline-icons">
                                                        </span>
                                                        <div class="vertical-timeline-element-content bounce-in">
                                                            <h4 class="timeline-title">{{ $s->study->pelajaran->name }}</h4>

                                                            <p class="timeline-subtitle">Sebagai Peserta Aktif</p>
                                                            <div class="list-tools" style="margin-left: -8px;">

                                                                <div class="riwayat-tools">
                                                                    <img class="riwayat-tools-image"
                                                                        src="{{ asset('template/frontend/assets/umum/pengumuman.png') }}"><span
                                                                        class="riwayat-text">Pengumuman</span>
                                                                </div>
                                                                @php
                                                                $transaction = \App\Models\Transaction::where('competition_id', $c->id)
                                                                    ->where('study_id', $s->study->id)
                                                                    ->where('userid', Auth::user()->id)
                                                                    ->where('product_id', '!=', null)
                                                                    ->get(); 

                                                                @endphp
                                                                @foreach($transaction as $tt)
                                                                @php
                                                                $product = \App\Models\Product::findorFail($tt->product_id);
                                                                @endphp

                                                                @if($product->is_combo == 1)
                                                                @php
                                                                    $products = explode(",", $product->composition);                
                                                                @endphp
                                                                @foreach($products as $pid)
                                                                @php
                                                                    $barang = \App\Models\Product::findorFail($pid);
                                                                @endphp
                                                                @if($barang->is_fisik !== 1)
                                                                <div class="riwayat-tools">
                                                                    <img class="riwayat-tools-image"
                                                                        @if($barang->image == null)
                                                                        src="{{ asset('template/frontend/assets/umum/product.png') }}"
                                                                        @else
                                                                        src="{{ asset('storage/image_files/product/'.$barang->image) }}"
                                                                        @endif
                                                                     >
                                                                        <span
                                                                        class="riwayat-text">{{ $barang->product_name }}</span>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @else
                                                                @if($product->is_fisik !== 1)
                                                                <div class="riwayat-tools">
                                                                    <img class="riwayat-tools-image"
                                                                        @if($product->image == null)
                                                                        src="{{ asset('template/frontend/assets/umum/product.png') }}"
                                                                        @else
                                                                        src="{{ asset('storage/image_files/product/'.$product->image) }}"
                                                                        @endif
                                                                     >
                                                                    <span
                                                                        class="riwayat-text">{{ $product->product_name }}</span>
                                                                </div>
                                                                @endif
                                                                @endif 

                                                                @endforeach

                                                                <div class="riwayat-tools">
                                                                    <img class="riwayat-tools-image"
                                                                        src="{{ asset('template/frontend/assets/umum/forum.png') }}"><span
                                                                        class="riwayat-text">Forum</span>
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
