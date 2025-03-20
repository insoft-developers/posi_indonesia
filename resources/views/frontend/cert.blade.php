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
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,700,900');
    </style>
    <style>
        body {
            margin: 0;

        }

        .sheet.padding-5mm {
            padding: 5mm;
            background: url('{{ asset('storage/image_files/product/document/' . $file) }}');
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
            margin-top: 0in;
            margin-bottom: 0in;
            margin-left: 0.05in;
            margin-right: 0.05in;
        }

        @media screen {

            .doc-name {
                position: relative;
                width: 102%;
                text-align: center;
                top: {{ $setting1->name_top }}px;
                left: {{ $setting1->name_left }}px;
                bottom: {{ $setting1->name_bottom }}px;
                right: {{ $setting1->name_right }}px;
                font-weight: {{ $setting1->name_font_weight }};
                font-size: {{ $setting1->name_font_size }}px;
                color: {{ $setting1->name_font_color }};
                font-style: {{ $setting1->name_font_style }};
                font-family: {{ $setting1->name_font_family }};
            }

            .school-name {
                position: relative;
                width: 102%;
                /* background: orange; */
                text-align: center;
                top: {{ $setting1->school_top }}px;
                left: {{ $setting1->school_left }}px;
                bottom: {{ $setting1->school_bottom }}px;
                right: {{ $setting1->school_right }}px;
                font-weight: {{ $setting1->school_font_weight }};
                font-size: {{ $setting1->scholl_font_size }}px;
                color: {{ $setting1->school_font_color }};
                font-style: {{ $setting1->school_font_style }};
                font-family: {{ $setting1->school_font_family }};

            }

            .province-name {
                position: relative;
                width: 102%;
                /* background: orange; */
                text-align: center;
                top: {{ $setting1->province_top }}px;
                left: {{ $setting1->province_left }}px;
                bottom: {{ $setting1->province_bottom }}px;
                right: {{ $setting1->province_right }}px;
                font-weight: {{ $setting1->province_font_weight }};
                font-size: {{ $setting1->province_font_size }}px;
                color: {{ $setting1->province_font_color }};
                font-style: {{ $setting1->province_font_style }};
                font-family: {{ $setting1->province_font_family }};

            }

            .bidang-name {
                position: relative;
                width: 102%;
                /* background: orange; */
                text-align: center;
                top: {{ $setting1->study_top }}px;
                left: {{ $setting1->study_left }}px;
                bottom: {{ $setting1->study_bottom }}px;
                right: {{ $setting1->study_right }}px;
                font-weight: {{ $setting1->study_font_weight }};
                font-size: {{ $setting1->study_font_size }}px;
                color: {{ $setting1->study_font_color }};
                font-style: {{ $setting1->study_font_style }};
                font-family: {{ $setting1->study_font_family }};

            }

            .jenjang-name {
                position: relative;
                width: 102%;
                /* background: orange; */
                text-align: center;
                top: {{ $setting1->level_top }}px;
                left: {{ $setting1->level_left }}px;
                bottom: {{ $setting1->level_bottom }}px;
                right: {{ $setting1->level_right }}px;
                font-weight: {{ $setting1->level_font_weight }};
                font-size: {{ $setting1->level_font_size }}px;
                color: {{ $setting1->level_font_color }};
                font-style: {{ $setting1->level_font_style }};
                font-family: {{ $setting1->level_font_family }};

            }

            .prestasi {
                position: relative;
                width: 102%;
                /* background: orange; */
                text-align: center;
                top: {{ $setting1->desc_top }}px;
                left: {{ $setting1->desc_left }}px;
                bottom: {{ $setting1->desc_bottom }}px;
                right: {{ $setting1->desc_right }}px;
                font-weight: {{ $setting1->desc_font_weight }};
                font-size: {{ $setting1->desc_font_size }}px;
                color: {{ $setting1->desc_font_color }};
                font-style: {{ $setting1->desc_font_style }};
                font-family: {{ $setting1->desc_font_family }};

            }


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

            #btn-setting {
                position: relative;
                left: 289px;
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

            .doc-name {
                position: relative;
                width: 102%;
                text-align: center;
                top: {{ $setting1->name_top }}px;
                left: {{ $setting1->name_left }}px;
                bottom: {{ $setting1->name_bottom }}px;
                right: {{ $setting1->name_right }}px;
                font-weight: {{ $setting1->name_font_weight }};
                font-size: {{ $setting1->name_font_size }}px;
                color: {{ $setting1->name_font_color }};
                font-style: {{ $setting1->name_font_style }};
                font-family: {{ $setting1->name_font_family }};
            }

            .school-name {
                position: relative;
                width: 102%;
                /* background: orange; */
                text-align: center;
                top: {{ $setting1->school_top }}px;
                left: {{ $setting1->school_left }}px;
                bottom: {{ $setting1->school_bottom }}px;
                right: {{ $setting1->school_right }}px;
                font-weight: {{ $setting1->school_font_weight }};
                font-size: {{ $setting1->scholl_font_size }}px;
                color: {{ $setting1->school_font_color }};
                font-style: {{ $setting1->school_font_style }};
                font-family: {{ $setting1->school_font_family }};

            }

            .province-name {
                position: relative;
                width: 102%;
                /* background: orange; */
                text-align: center;
                top: {{ $setting1->province_top }}px;
                left: {{ $setting1->province_left }}px;
                bottom: {{ $setting1->province_bottom }}px;
                right: {{ $setting1->province_right }}px;
                font-weight: {{ $setting1->province_font_weight }};
                font-size: {{ $setting1->province_font_size }}px;
                color: {{ $setting1->province_font_color }};
                font-style: {{ $setting1->province_font_style }};
                font-family: {{ $setting1->province_font_family }};

            }

            .bidang-name {
                position: relative;
                width: 102%;
                /* background: orange; */
                text-align: center;
                top: {{ $setting1->study_top }}px;
                left: {{ $setting1->study_left }}px;
                bottom: {{ $setting1->study_bottom }}px;
                right: {{ $setting1->study_right }}px;
                font-weight: {{ $setting1->study_font_weight }};
                font-size: {{ $setting1->study_font_size }}px;
                color: {{ $setting1->study_font_color }};
                font-style: {{ $setting1->study_font_style }};
                font-family: {{ $setting1->study_font_family }};

            }

            .jenjang-name {
                position: relative;
                width: 102%;
                /* background: orange; */
                text-align: center;
                top: {{ $setting1->level_top }}px;
                left: {{ $setting1->level_left }}px;
                bottom: {{ $setting1->level_bottom }}px;
                right: {{ $setting1->level_right }}px;
                font-weight: {{ $setting1->level_font_weight }};
                font-size: {{ $setting1->level_font_size }}px;
                color: {{ $setting1->level_font_color }};
                font-style: {{ $setting1->level_font_style }};
                font-family: {{ $setting1->level_font_family }};

            }

            .prestasi {
                position: relative;
                width: 102%;
                /* background: orange; */
                text-align: center;
                top: {{ $setting1->desc_top }}px;
                left: {{ $setting1->desc_left }}px;
                bottom: {{ $setting1->desc_bottom }}px;
                right: {{ $setting1->desc_right }}px;
                font-weight: {{ $setting1->desc_font_weight }};
                font-size: {{ $setting1->desc_font_size }}px;
                color: {{ $setting1->desc_font_color }};
                font-style: {{ $setting1->desc_font_style }};
                font-family: {{ $setting1->desc_font_family }};

            }


            .sheet-outer.A4 .sheet {
                width: 297mm;
                height: 205mm;
            }

            #btn-print {
               display: none;
            }

            #btn-tutup {
                display: none;
            }

            #btn-setting {
                display: none;
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
