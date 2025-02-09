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
                <div class="section-title shape-03">
                    <h2 class="main-judul">Daftar Transaksi</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @if ($transaction->count() > 0)
                            <table id="table-transaction" class="table table-bordered" style="font-size: 14px;">
                                <thead>
                                    <tr>
                                        <th>No Invoice</th>
                                        <th>Status</th>
                                        <th>Bukti Transfer</th>
                                        <th>Jumlah</th>
                                        <th>Bayar Dengan</th>
                                        <th>Berlaku Hingga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                @foreach ($transaction as $t)
                                    {{-- @php
                                        $inv_amount = \App\Models\Transaction::where('invoice', $t->invoice)->sum(
                                            'amount',
                                        );

                                    @endphp --}}

                                    <tr style="vertical-align: middle">
                                        <td width="20%"><a href="{{ url('show-invoice/' . $t->invoice) }}"><span
                                                    style="color:blue;text-decoration:underline">{{ $t->invoice }}</span></a>
                                        </td>
                                        <td width="15%">
                                            @if ($t->total_amount > 0)
                                                @if ($t->payment_status == 1)
                                                    <span style="color: green"><strong><i class="fa fa-check"></i>
                                                            PAID</strong></span>
                                                @else
                                                    <span style="color: orange">UNPAID</span>
                                                @endif
                                            @else
                                                @if ($t->payment_status == 1)
                                                    <span style="color: green"><strong><i class="fa fa-check"></i>
                                                            APPROVED</strong></span>
                                                @else
                                                    <span style="color: orange">NOT APPROVED</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td width="15%">
                                            <center>
                                                @if ($t->total_amount > 0)
                                                    @if ($t->image == null && $t->payment_status != 1)
                                                        <span><a onclick="bayar({{ $t->id }})"
                                                                href="javascript:void(0);"><img class="small-upload"
                                                                    src="{{ asset('template/frontend/assets/umum/upload_icon.png') }}"><span
                                                                    class="upload-click">Upload</span></a></span>
                                                    @elseif($t->image == null && $t->payment_status == 1)
                                                        <span>Online Payment</span>
                                                    @else
                                                        <a href="{{ asset('template/frontend/assets/bukti_transfer/' . $t->image) }}"
                                                            target="_blank"><img class="image-bukti"
                                                                src="{{ asset('template/frontend/assets/bukti_transfer/' . $t->image) }}"></a>
                                                    @endif
                                                @else
                                                    <span style="color: green"><strong><i class="fa fa-check"></i>
                                                            Gratis</strong></span>
                                                @endif
                                            </center>
                                        </td>
                                        <td width="15%">
                                            <strong>
                                              
                                                    Rp. {{ number_format($t->grand_total) }}
                                              
                                            </strong>
                                        </td>
                                        <td width="15%">{{ $t->payment_with == null ? 'no-payment' : $t->payment_with }}
                                        </td>
                                        <td width="25%">{{ date('d F Y H:i', strtotime($t->expired_time)) }}</td>
                                        <td>
                                            @if ($t->total_amount > 0)
                                                @if ($t->payment_status == 1)
                                                @else
                                                    <center><button onclick="payment({{ $t->id }})"
                                                            class="btn-insoft bg-success">Bayar</button></center>
                                                @endif
                                            @else
                                                
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align: right;"></th>

                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        @else
                            <center><img src="{{ asset('template/frontend/assets/umum/empty_transaction.png') }}"
                                    class="empty-image"></center>
                            <center>
                                <p style="color: red;">Belum ada Transaksi</p>
                            </center>
                            <center><a href="{{ url('main') }}"><span style="color:blue">Buat pesanan sekarang</span></a>
                            </center>
                            <br>
                            <br>
                        @endif


                        <div style="margin-top:50px"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- About End -->
    <!-- Modal -->
    <div class="modal fade" id="modal-pembayaran" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-600">
            <div class="modal-content">


                <div class="modal-header">
                    <p class="modal-title"><span class="modal-head-title">Transfer Manual</span><br><span
                            class="modal-subtitle" id="modal-subtitle">Upload Bukti Transfer</span></p>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('upload.bukti') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="transaction_id" name="transaction_id">
                        <center><img id="image-upload" class="upload-image"
                                src="{{ asset('template/frontend/assets/umum/upload_icon.png') }}"></center>
                        <input style="display: none;" type="file" id="image" name="image"
                            accept="*.jpg, *.jpeg, *.png" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-insoft bg-success">Submit</button>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-insoft">Tutup</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- end Modal -->

@endsection
