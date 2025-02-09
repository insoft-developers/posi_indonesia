<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->product_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/frontend') }}/assets/images/pav.png">
    <style>
        body {
            margin: 0;

        }




        .sheet.padding-5mm {
            padding: 5mm;
            background: url('{{ asset('storage/image_files/product/document/' . $product->document) }}');
            background-size: cover;
            display: block;
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


        @page {
            margin-top: 0.2in;
            margin-bottom: 0.05in;
            margin-left: 0.05in;
            margin-right: 0.05in;
        }

        @media screen {
            @if ($product->document_type == 'piagam')
                .doc-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 225px;
                    font-weight: bold;
                    color: #555555;

                    font-size: 20px;
                }

                .school-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 240px;
                    font-weight: bold;
                    color: #555555;

                }

                .province-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 260px;
                    font-weight: bold;
                    color: #555555;

                }

                .bidang-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 280px;
                    font-weight: bold;
                    color: #555555;

                }

                .jenjang-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 300px;
                    font-weight: bold;
                    color: #555555;

                }

                .prestasi {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 320px;
                    font-weight: bold;
                    color: #555555;

                }

            @elseif($product->document_type == 'sertifikat')
                .doc-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 200px;
                    font-weight: bold;
                    color: #555555;

                    font-size: 20px;
                }

                .school-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 217px;
                    font-weight: bold;
                    color: #555555;

                }

                .province-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 235px;
                    font-weight: bold;
                    color: #555555;

                }

                .bidang-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 254px;
                    font-weight: bold;
                    color: #555555;

                }

                .jenjang-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 275px;
                    font-weight: bold;
                    color: #555555;

                }

                .prestasi {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 292px;
                    font-weight: bold;
                    color: #555555;

                }

            @endif
            .sheet-outer.A4 .sheet {
                width: 297mm;
                height: 210mm;
            }

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




        @media print {

            @if ($product->document_type == 'piagam')
                .doc-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 212px;
                    font-weight: bold;
                    color: #555555;

                    font-size: 20px;
                }

                .school-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 225px;
                    font-weight: bold;
                    color: #555555;

                }

                .province-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 245px;
                    font-weight: bold;
                    color: #555555;

                }

                .bidang-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 260px;
                    font-weight: bold;
                    color: #555555;

                }

                .jenjang-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 280px;
                    font-weight: bold;
                    color: #555555;

                }

                .prestasi {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 300px;
                    font-weight: bold;
                    color: #555555;

                }

            @elseif($product->document_type == 'sertifikat')
                .doc-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 190px;
                    font-weight: bold;
                    color: #555555;

                    font-size: 20px;
                }

                .school-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 202px;
                    font-weight: bold;
                    color: #555555;

                }

                .province-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 220px;
                    font-weight: bold;
                    color: #555555;

                }

                .bidang-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 240px;
                    font-weight: bold;
                    color: #555555;

                }

                .jenjang-name {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 255px;
                    font-weight: bold;
                    color: #555555;

                }

                .prestasi {
                    position: relative;
                    width: 102%;
                    /* background: orange; */
                    text-align: center;
                    top: 272px;
                    font-weight: bold;
                    color: #555555;

                }

            @endif

            .sheet-outer.A4 .sheet {
                width: 297mm;
                height: 200mm;
            }

            body {
                margin: 0px !important;
            }

            #btn-print,
            #btn-tutup {
                display: none;
            }

            .sheet.padding-5mm {
                padding: 5mm;
                background: url('{{ asset('storage/image_files/product/document/' . $product->document) }}');
                background-size: contain;
                visibility: visible;
                background-repeat: no-repeat;
                -webkit-print-color-adjust: exact;
                background-position: center;
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
    <a href="{{ url('riwayat') }}"><button id="btn-tutup" class="btn btn-warning">Tutup</button></a>
    <div class="sheet-outer A4">
        <div class="sheet padding-5mm" id="document">
            <div class="doc-name">{{ strtoupper($transaction->tuser->name) }}</div>
            <div class="school-name">{{ strtoupper($transaction->tuser->nama_sekolah) }}</div>
            <div class="province-name">{{ strtoupper($transaction->tuser->wilayah->province_name) }}</div>
            <div class="bidang-name">{{ strtoupper($transaction->study->pelajaran->name) }}</div>
            <div class="jenjang-name">{{ strtoupper($transaction->study->level->level_name) }}</div>


            @php
                $session = \App\Models\ExamSession::where('competition_id', $transaction->competition_id)
                    ->where('study_id', $transaction->study_id)
                    ->where('userid', Auth::user()->id)
                    ->first();

                if ($session->medali == 'emas') {
                    $juara = 'Peraih Medali Emas';
                } elseif ($session->medali == 'perak') {
                    $juara = 'Peraih Medali Perak';
                } elseif ($session->medali == 'perunggu') {
                    $juara = 'Peraih Medali Perunggu';
                } else {
                    $juara = 'Peserta Aktif';
                }

            @endphp

            @if ($product->document_type == 'piagam')
                <div class="prestasi">{{ strtoupper($juara) }}</div>
            @else
                <div class="prestasi">{{ strtoupper($session->total_score) }}</div>
            @endif
        </div>
    </div>

</body>

</html>
