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

                    @php
                        $ada = 0;

                    @endphp
                    @foreach ($com as $c)
                        @php


                            $cek = \App\Models\ExamSession::where('competition_id', $c->id)
                                ->where('userid', Auth::user()->id)
                                ->where('is_finish', 1)
                                ->count();

                            
                           
                        @endphp

                        
                        @if ($cek > 0)
                            <div class="col-md-4">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $c->title }}</h5>
                                        <div style="margin-top:-10px;"></div>
                                        @php
                                            $lavel = \App\Models\Level::find(Auth::user()->level_id);
                                        @endphp
                                        <p>{{ $lavel->level_name }}</p>
                                        <div style="margin-top:-13px;"></div>
                                        <hr />
                                        @foreach ($c->transaction as $s)
                                            @php
                                                $session = \App\Models\ExamSession::where(
                                                    'competition_id',
                                                    $s->competition_id,
                                                )
                                                    ->where('study_id', $s->study_id)
                                                    ->where('is_finish', 1)
                                                    ->where('userid', Auth::user()->id)
                                                    ->count();
                                            @endphp
                                            @if ($s->userid == Auth::user()->id && $s->invoices->payment_status == 1 && $s->invoices->transaction_status == 1)
                                                @if ($session > 0)
                                                    @php $ada++;  @endphp
                                                    <div
                                                        class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">


                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <img src="{{ asset('template/frontend/assets/umum/pulpen.png') }}"
                                                                        class="timeline-icons">
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">
                                                                        {{ $s->study->pelajaran->name }}</h4>

                                                                    <p class="timeline-subtitle">Sebagai Peserta Aktif</p>
                                                                    <div class="list-tools" style="margin-left: -8px;">

                                                                        <div onclick="show_pengumuman({{ $c->id }},{{ $s->study->id }})"
                                                                            class="riwayat-tools">
                                                                            <img class="riwayat-tools-image"
                                                                                src="{{ asset('template/frontend/assets/umum/pengumuman.png') }}"><span
                                                                                class="riwayat-text">Pengumuman</span>
                                                                        </div>
                                                                        @php
                                                                            $transaction = \App\Models\Transaction::where(
                                                                                'competition_id',
                                                                                $c->id,
                                                                            )
                                                                                ->where('study_id', $s->study->id)
                                                                                ->where('userid', Auth::user()->id)
                                                                                ->where('product_id', '!=', null)
                                                                                ->get();

                                                                        @endphp

                                                                        @foreach ($transaction as $tt)
                                                                            @php
                                                                                $product = \App\Models\Product::find(
                                                                                    $tt->product_id,
                                                                                );
                                                                            @endphp

                                                                            @if ($product->is_combo == 1)
                                                                                @php
                                                                                    $products = explode(
                                                                                        ',',
                                                                                        $product->composition,
                                                                                    );
                                                                                @endphp
                                                                                @foreach ($products as $pid)
                                                                                    @php
                                                                                        $barang = \App\Models\Product::find(
                                                                                            $pid,
                                                                                        );
                                                                                    @endphp
                                                                                    @if ($barang->is_fisik !== 1)
                                                                                        <div onclick="get_facility({{ $tt->id }} , {{ $barang->id }})"
                                                                                            class="riwayat-tools">
                                                                                            <img class="riwayat-tools-image"
                                                                                                @if ($barang->image == null) src="{{ asset('template/frontend/assets/umum/product.png') }}"
                                                                        @else
                                                                        src="{{ asset('storage/image_files/product/' . $barang->image) }}" @endif>
                                                                                            <span
                                                                                                class="riwayat-text">{{ $barang->product_name }}</span>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            @else
                                                                                @if ($product->is_fisik !== 1)
                                                                                    <div onclick="get_facility({{ $tt->id }}, {{ $product->id }})"
                                                                                        class="riwayat-tools">
                                                                                        <img class="riwayat-tools-image"
                                                                                            @if ($product->image == null) src="{{ asset('template/frontend/assets/umum/product.png') }}"
                                                                        @else
                                                                        src="{{ asset('storage/image_files/product/' . $product->image) }}" @endif>
                                                                                        <span
                                                                                            class="riwayat-text">{{ $product->product_name }}</span>
                                                                                    </div>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach


                                                                        <a href="{{ $s->study->forum_link }}"
                                                                            target="_blank">
                                                                            <div class="riwayat-tools">
                                                                                <img class="riwayat-tools-image"
                                                                                    src="{{ asset('template/frontend/assets/umum/forum.png') }}"><span
                                                                                    class="riwayat-text">Forum</span>
                                                                            </div>
                                                                        </a>
                                                                        @php
                                                                            $cek_bonus = \App\Models\CompetitionBonusProduct::where(
                                                                                'competition_id',
                                                                                $c->id,
                                                                            );
                                                                            $claim = \App\Models\BonusClaimed::where(
                                                                                'userid',
                                                                                Auth::user()->id,
                                                                            )
                                                                                ->where('competition_id', $c->id)
                                                                                ->where('study_id', $s->study->id)
                                                                                ->count();

                                                                        @endphp
                                                                        @if ($cek_bonus->count() > 0 && $claim <= 0)
                                                                            @php $bonus_list = $cek_bonus->first();  @endphp
                                                                            <div onclick="bonus_claim({{ $c->id }}, {{ $s->study->id }})"
                                                                                class="riwayat-tools">
                                                                                <img class="riwayat-tools-image"
                                                                                    src="{{ asset('template/frontend/assets/umum/bonus.png') }}"><span
                                                                                    class="riwayat-text">Claim Bonus</span>
                                                                            </div>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach




                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @if ($ada == 0)
                        <center><img src="{{ asset('template/frontend/assets/umum/empty_transaction.png') }}"
                                class="empty-image"></center>
                        <center>
                            <p style="color: red;">Belum ada Riwayat</p>
                        </center>
                        <center><a href="{{ url('main') }}"><span style="color:blue">Buat pesanan sekarang</span></a>
                        </center>
                        <br>
                        <br>
                    @endif
                </div>

            </div>
        </div>
        <div style="margin-top:50px;"></div>
    </div>
    </div>
    <!-- Blog End -->

    <!-- Modal -->
    <div class="modal fade" id="modal-pengumuman" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


                <div class="modal-header">
                    <p class="modal-title"><span class="modal-head-title"></span><br><span class="modal-subtitle"
                            id="modal-subtitle"></span></p>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="pengumuman-competition-id">
                        <input type="hidden" id="pengumuman-study-id">
                        <input type="text" class="form-control search-text" id="text-cari"
                            placeholder="Cari nama peserta">
                    </div>
                    <div id="pemenang-content"></div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal-product" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-600">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title"><span class="modal-head-title"></span><br><span class="modal-subtitle"
                            id="modal-subtitle"></span></p>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="product-user-id">
                    <input type="hidden" id="product-competition-id">
                    <input type="hidden" id="product-study-id">
                    <div id="product-list-content"></div>
                </div>
                <div class="modal-footer">
                    <button onclick="simpan_product_keranjang()" type="button" class="btn btn-primary btn-sm">Buka
                        Keranjang</button>
                </div>

            </div>
        </div>
    </div>
@endsection
