<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/frontend') }}/assets/images/pav.png">
    <style>
        @media only screen and (max-width: 768px) {
            .sheet-outer {
                zoom: 0.46;
                margin-top: 50px !important;
            }

            #btn-tutup {
                position: relative;
                top: 12px !important;
                left: 20px !important;
            }

            #btn-print {
                position: relative;
                top: 12px !important;
                left: 10px !important;
            }

        }
    </style>

    <style>
        body {
            margin: 0;

        }

        .lunas-image {
            width: 500px;
            position: absolute;
            left: 27%;
            top: 35%;
            right: auto;
            opacity: 0.2;
        }

        .sheet-outer {
            margin: 0;
        }

        .sheet {
            margin: 0;
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
            page-break-after: always;
        }

        @media screen {
            #btn-print {
                position: relative;
                left: 279px;
                top: 12px;
            }

            #btn-tutup {
                position: relative;
                left: 284px;
                top: 12px;
            }

            body {
                background: #e0e0e0
            }

            .sheet {
                background: white;
                box-shadow: 0 .5mm 2mm rgba(0, 0, 0, .3);
                margin: 5mm auto;
            }
        }

        .sheet-outer.A4 .sheet {
            width: 210mm;
            height: auto;
        }

        .sheet.padding-5mm {
            padding: 5mm
        }

        @page {
            size: A4;
            margin-top: 30;
            margin-left: 0;
            margin-right: 0;
            margin-bottom: 20;
        }

        @page :first {
            size: A4;
            margin-top: 0;
            margin-left: 0;
            margin-right: 0;
            margin-bottom: 20;
        }

        @media print {

            .sheet-outer.A4,
            .sheet-outer.A5.landscape {
                width: 210mm
            }

            body {
                margin: 20px !important;
            }

            #btn-print,
            #btn-tutup {
                display: none;
            }

        }

        .minus {
            margin-top: -20px;
        }

        .minus-15 {
            margin-top: -15px;
        }

        .minus-10 {
            margin-top: -10px;
        }

        .logo-invoice {
            float: right;
            margin-top: -63px;
            height: 40px;
        }

        .font-kecil {
            font-size: 14px !important;
        }
    </style>
</head>

<body>
    <button onclick="window.print();" id="btn-print" class="btn btn-success">Print</button>
    <a href="{{ url('transaction') }}"><button id="btn-tutup" class="btn btn-warning">Tutup</button></a>
    <div class="sheet-outer A4">
        <section class="sheet padding-5mm">
            <h4>#{{ $data->invoice }}</h4>
            <h5>{{ $data->user->name }}</h5>
            <img class="logo-invoice" src="{{ asset('template/frontend/assets/images/logo.png') }}">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <p><strong>Transfer Ke :</strong></p>
                    <div class="minus"></div>
                    <p class="font-kecil">{{ $setting->bank_name }}</p>
                    <div class="minus"></div>
                    <p class="font-kecil">No. Rek. {{ $setting->bank_account_number }}</p>
                    <div class="minus"></div>
                    <p class="font-kecil">A/n. {{ $setting->bank_owner }}</p>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <p><strong>Jumlah Tagihan :</strong></p>
                    <div class="minus"></div>
                    <p><strong>Rp. {{ number_format($data->total_amount) }}</strong></p>

                </div>
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <p><strong>Status Pembayaran :</strong></p>
                    <div class="minus"></div>
                    <p><?= $data->payment_status == 1 ? "<span style='color:green;'><strong>PAID</strong></span>" : "<span style='color:red;'><strong>UNPAID</strong></span>" ?>
                    </p>

                </div>
                @if($data->payment_status == 1)
                <img class="lunas-image" src="{{ asset('template/frontend/assets/umum/lunas.png') }}">
                @endif
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <p><strong>Jatuh Tempo :</strong></p>
                    <div class="minus"></div>
                    <p class="font-kecil">{{ date('d-m-Y H:i:s', strtotime($data->expired_time)) }}</p>

                </div>
            </div>


            <div class="row desc" style="margin-top:20px;">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th style="background-color: rgb(219, 241, 234);">Description</th>
                                <th style="background-color: rgb(219, 241, 234);">Price</th>
                                <th style="background-color: rgb(219, 241, 234);">Quantity</th>
                                <th style="background-color: rgb(219, 241, 234);">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data->transaction as $key)
                                @php

                                @endphp
                                <tr>
                                    <td width="50%">
                                        @if ($key->type == 1)
                                            @php
                                                $sesi = \App\Models\ExamSession::where('userid', $key->userid)
                                                    ->where('competition_id', $key->competition_id)
                                                    ->where('study_id', $key->study_id)
                                                    ->first();
                                            @endphp
                                            <strong>{{ $key->product->product_name }}</strong><br><span
                                                class="font-kecil">{{ $key->tuser->name }} -
                                                {{ $key->tuser->nama_sekolah }}</span><br><span
                                                class="font-kecil">{{ $key->competition->title }} -
                                                {{ $key->study->pelajaran->name }} -
                                                {{ $sesi->medali ?? null }}</span>
                                            <br><span
                                                style="color:green;font-size:13px;">({{ $key->product->description }})</span>
                                        @else
                                            @php
                                                $lavel = \App\Models\Level::findorFail(Auth::user()->level_id);
                                            @endphp
                                            <strong>Pendaftaran {{ $key->competition->title }}</strong><br><span
                                                class="font-kecil">{{ $key->tuser->name }} -
                                                {{ $key->tuser->nama_sekolah }}</span><br><span
                                                class="font-kecil">{{ $key->study->pelajaran->name }} -
                                                {{ $key->tuser->level->level_name }}</span>
                                        @endif

                                    </td>
                                    <td><strong>Rp. {{ number_format($key->unit_price) }}</strong></td>
                                    <td>{{ $key->quantity }}</td>
                                    <td><strong>Rp. {{ number_format($key->amount) }}</strong></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <thead>
                            <tr>
                                <th></th>
                                <th colspan="2">Total</th>
                                <th>Rp. {{ number_format($data->total_amount) }}</th>
                            </tr>

                            <tr>
                                <th><span style="font-weight: normal; font-size:12px;">
                                        Penerima : <strong>{{ $data->receiver_name }}</strong><br>
                                        HP Penerima : <strong>{{ $data->receiver_phone }}</strong><br>
                                        Alamat : {{ $data->address }}</span></th>

                                <th colspan="2">Discount</th>
                                <th>Rp. 0</th>
                            </tr>
                            @if ($data->delivery_cost !== null)
                                <tr>
                                    <th><span style="font-weight: normal; font-size:12px;">[
                                            {{ $data->service }}<br>{{ $data->province_name }} -
                                            {{ $data->city_name }} - {{ $data->district_name }} ]</span></th>

                                    <th colspan="2">Ongkos Kirim </th>
                                    <th>Rp. {{ number_format($data->delivery_cost) }}</th>
                                </tr>
                            @endif
                            <tr>
                                <th></th>

                                <th colspan="2">Kode Unik</th>
                                <th>Rp. {{ number_format($data->angka_unik) }}</th>
                            </tr>
                            <tr>
                                <th style="color: green;">Net Amount</th>
                                <th></th>
                                <th></th>
                                <th style="color: green;">Rp. {{ number_format($data->grand_total) }}</th>
                            </tr>

                        </thead>
                    </table>
                </div>
            </div>
            <div class="row" style="font-size: 13px;color:red;font-style:italic;">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <span><strong>Note:</strong></span>
                    <ol>
                        <li>Mohon ditransfer sebelum jatuh tempo</li>
                        <li>Pastikan nominal transfer sesuai dengan yang tertera pada Net Amount (jumlah tagihan pada
                            invoice ini)</li>
                        <li>Jika transfer anda tidak terkonfirmasi dalam waktu 1 x 24 jam. Mohon segera hubungi Tim
                            Service Kami. Terima Kasih</li>
                    </ol>
                </div>
            </div>


        </section>

    </div>

</body>

</html>
