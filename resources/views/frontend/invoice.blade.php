<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            
        }

        .sheet-outer {
            margin: 0;
        }

        .sheet {
            margin: 0;
            overflow:hidden;
            position: relative;
            box-sizing: border-box;
            page-break-after: always;
        }

        @media screen {
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
            body{
                margin:20px !important;
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
    <div class="sheet-outer A4">
        <section class="sheet padding-5mm">
            <h4>INVOICE #{{ $data->invoice }}</h4>
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
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <p><strong>Jatuh Tempo :</strong></p>
                    <div class="minus"></div>
                    <p class="font-kecil">{{ date('d-m-Y H:i:s', strtotime($data->expired_time)) }}</p>

                </div>
            </div>

           
            <div class="row desc"  style="margin-top:20px;">
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
                          
                            @foreach($data->transaction as $key)
                           
                            <tr>
                                <td><strong>Pendaftaran {{ $key->competition->title }}</strong><br><span class="font-kecil">{{ $data->user->name }} - {{ $data->user->nama_sekolah }}</span><br><span class="font-kecil">{{ $key->study->pelajaran->name }} - {{ $key->competition->levels->level_name }}</span></td>
                                <td><strong>Rp. {{ number_format($key->amount) }}</strong></td>
                                <td>1</td>
                                <td><strong>Rp. {{ number_format($key->amount) }}</strong></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Total</th>
                                <th>Rp. {{ number_format($data->total_amount) }}</th>
                            </tr>
                           
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Discount</th>
                                <th>Rp. 0</th>
                            </tr>
                            <tr>
                                <th style="color: green;">Net Amount</th>
                                <th></th>
                                <th></th>
                                <th style="color: green;">Rp. {{ number_format($data->total_amount) }}</th>
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
                        <li>Pastikan nominal transfer sesuai dengan yang tertera pada Net Amount (jumlah tagihan pada invoice ini)</li>
                        <li>Jika transfer anda tidak terkonfirmasi dalam waktu 1 x 24 jam. Mohon segera hubungi Tim Service Kami. Terima Kasih</li>
                    </ol>   
                </div>
            </div>


        </section>

    </div>
</body>

</html>