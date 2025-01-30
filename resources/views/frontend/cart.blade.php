@extends('frontend.master')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">



    </div>
    <!-- Page Banner End -->

    <!-- About Start -->
    <div class="section">

        <div class="section-padding-02 mt-n10">
            <div class="container">
                <div class="section-title shape-03 text-center">
                    <h2 class="main-judul">Cart</h2>
                    <div style="margin-top:30px"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @if ($cart->count() > 0)
                            <table class="table table-striped table-bordered" style="font-size: 14px;">
                                @php
                                    $total_harga = 0;
                                @endphp

                                @foreach ($cart as $index => $c)
                                    <tr style="vertical-align: middle">
                                        
                                        @if($c->type == 1)
                                        <td width="8%">
                                            
                                            <img class="image-cart"
                                            @if($c->product->image == null)
                                            src="{{ asset('template/frontend/assets/umum/product.png') }}"
                                            @else 
                                            src="{{ asset('template/frontend/assets/kompetisi/' . $c->competition->image) }}"
                                            @endif
                                            >
                                        </td>
                                        @php
                                            $session = \App\Models\ExamSession::where('userid', $c->user->id)
                                                ->where('competition_id', $c->competition->id)
                                                ->where('study_id', $c->study->id)
                                                ->first();
                                        @endphp
                                        <td width="35%"><strong>{{ strtoupper($c->product->product_name) }}</strong>
                                            <br>{{ $c->user->name }} - {{ $c->user->nama_sekolah }}
                                            <br>{{ $c->competition->title }} - {{ $c->study->pelajaran->name }} - {{ $session->medali }}
                                            <br><span style="font-size:13px;color:blue;">{{ $c->product->description }}</span>
                                        </td>
                                        @else 
                                        <td width="8%"><img class="image-cart"
                                            src="{{ asset('template/frontend/assets/kompetisi/' . $c->competition->image) }}">
                                        </td>
                                        <td width="35%">Pendaftaran {{ $c->competition->title }}
                                            {{ $c->premium == 1 ? 'Berbayar' : 'Gratis' }} + (Bonus
                                            Pembahasan)<br>{{ $c->user->name }} - SMAN 1 Tanjung Morawa</td>
                                        @endif
                                       
                                        <td width="25%">
                                            {{-- @php
                                                $detail = \App\Models\Cart::with('study.pelajaran', 'study.level')
                                                    ->where('userid', Auth::user()->id)
                                                    ->where('competition_id', $c->competition_id)
                                                    ->get();

                                                $html = "<ul style='list-style:inside'>";
                                                $subtotal = 0;
                                                foreach ($detail as $d) {
                                                    $html .=
                                                        '<li>' .
                                                        $d->study->pelajaran->name .
                                                        '  ' .
                                                        $d->study->level->level_name .
                                                        '<br><strong> Rp. ' .
                                                        number_format($c->competition->price) .
                                                        '</strong></li>';
                                                    $subtotal = $subtotal + $c->competition->price;
                                                    $total_harga = $total_harga + $c->competition->price;
                                                }
                                            @endphp --}}

                                            @if($c->type == 1) 
                                                <div class="tambahan-unit"><span onclick="kurangi({{ $c->id }})" class="btn-kurang-unit">-</span><span id="unit_cart_{{ $c->id }}" class="unit-cart">{{ $c->quantity }}</span><span onclick="tambahi({{ $c->id }})" class="btn-tambah-unit">+</span></div>            
                                            @else

                                            @endif

                                        </td>
                                        <td><span class="cart-total-price" id="cart_total_text_{{ $c->id }}"><strong>{{ "Rp. ".number_format($c->total_purchase) }}</strong></span>
                                        <input type="hidden" id="cart_total_{{$c->id}}" value="{{ $c->total_purchase }}">
                                        <input type="hidden" id="unit_total_{{$c->id}}" value="{{ $c->unit_price }}">
                                        </td>
                                        <td>
                                            <center><button onclick="hapus_cart({{ $c->competition_id }})"
                                                    class="btn-insoft bg-danger btn-cart-delete">Hapus</button></center>
                                        </td>
                                    </tr>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <th colspan="3" style="text-align: right;">Total Harga</th>

                                        <th>Rp. {{ number_format($total_harga) }}</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        @else
                            <center><img src="{{ asset('template/frontend/assets/umum/empty_cart.png') }}"
                                    class="empty-image"></center>
                            <center>
                                <p style="color: red;">Belum ada Pesanan</p>
                            </center>
                            <center><a href="{{ url('main') }}"><span style="color:blue">Buat pesanan sekarang</span></a>
                            </center>
                            <br>
                            <br>
                        @endif
                        @if ($cart->count() > 0)
                            <button onclick="pesan_sekarang()" class="btn btn-success">Pesan Sekarang</button>
                        @endif
                        <div style="margin-top:50px"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- About End -->


@endsection
