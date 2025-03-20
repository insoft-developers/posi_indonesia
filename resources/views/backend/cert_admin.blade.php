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
            margin-top: 0.2in;
            margin-bottom: 0.05in;
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

                background: url('{{ asset('storage/image_files/product/document/' . $file) }}');
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

        .modal-dialog {
            max-width: var(--bs-modal-width);
            margin-right: 0 !important;
            margin-left: auto;
        }
    </style>
</head>

<body>

    <button onclick="window.print();" id="btn-print" class="btn btn-success">Print</button>
    <a href="{{ url('riwayat') }}"><button id="btn-tutup" class="btn btn-warning">Tutup</button></a>
    <button onclick="setting()" id="btn-setting" class="btn btn-danger">Setting</button>
    <div class="sheet-outer A4">
        <div class="sheet padding-5mm" id="document">
            <div class="doc-name">{{ strtoupper('febri andriansyah') }}</div>
            <div class="school-name">{{ strtoupper('SMA 1 Lubuk Pakam') }}</div>
            <div class="province-name">{{ strtoupper('Sumatera Utara') }}</div>
            <div class="bidang-name">{{ strtoupper('Matematika') }}</div>
            <div class="jenjang-name">{{ strtoupper('SMA/SMK/MAN') }}</div>

            <?php
            if ($product->document_type == 'piagam') { ?>
            <div class="prestasi">Peraih Medali Emas</div>
            <?php } else { ;?>
            <div class="prestasi">A+</div>
            <?php } ?>
        </div>
    </div>
    <div class="modal fade" id="modal-setting" tabindex="-1" style="float: right;">
        <div class="modal-dialog">
            <form id="form-setting">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="competition_id" name="competition_id">
                            <input type="hidden" id="product_id" name="product_id">
                            <input type="hidden" id="document_type" name="document_type">


                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-nama-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-nama" type="button" role="tab"
                                        aria-controls="pills-nama" aria-selected="true">Nama</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-sekolah-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-sekolah" type="button" role="tab"
                                        aria-controls="pills-sekolah" aria-selected="false">Sekolah</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-provinsi-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-provinsi" type="button" role="tab"
                                        aria-controls="pills-provinsi" aria-selected="false">Provinsi</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-bidang-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-bidang" type="button" role="tab"
                                        aria-controls="pills-bidang" aria-selected="false">Bidang</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-jenjang-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-jenjang" type="button" role="tab"
                                        aria-controls="pills-jenjang" aria-selected="false">Jenjang</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-desc-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-desc" type="button" role="tab"
                                        aria-controls="pills-desc" aria-selected="false">Desc</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-nama" role="tabpanel"
                                    aria-labelledby="pills-nama-tab" tabindex="0">

                                    <div class="row">
                                        <div class="col">
                                            <label for="name_top" class="form-label">Top</label>
                                            <input type="number" class="form-control" id="name_top"
                                                name="name_top">
                                        </div>
                                        <div class="col">
                                            <label for="name_bottom" class="form-label">Bottom</label>
                                            <input type="number" class="form-control" id="name_bottom"
                                                name="name_bottom">
                                        </div>
                                        <div class="col">
                                            <label for="name_left" class="form-label">Left</label>
                                            <input type="number" class="form-control" id="name_left"
                                                name="name_left">
                                        </div>
                                        <div class="col">
                                            <label for="name_right" class="form-label">Right</label>
                                            <input type="number" class="form-control" id="name_right"
                                                name="name_right">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col">
                                            <label for="name_font_size" class="form-label">Font Size</label>
                                            <input type="number" class="form-control" id="name_font_size"
                                                name="name_font_size">
                                        </div>
                                        <div class="col">
                                            <label for="name_color" class="form-label">Color</label>
                                            <input type="text" class="form-control" id="name_font_color"
                                                name="name_font_color">
                                        </div>

                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col">
                                            <label for="name_font_family" class="form-label">Font Family</label>
                                            <select class="form-control" id="name_font_family"
                                                name="name_font_family">
                                                <option value="">Pilih</option>
                                                <option value="'Poppins'">Poppins</option>
                                                <option value="sans-serif">Sans Serif</option>
                                                <option value="cursive">Cursive</option>
                                                <option value="monospace">Mono Space</option>
                                                <option value="auto">Auto</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="name_font_style" class="form-label">Font Family</label>
                                            <select class="form-control" id="name_font_style" name="name_font_style">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="italic">Italic</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="name_font_weight" class="form-label">Font Weight</label>
                                            <select class="form-control" id="name_font_weight"
                                                name="name_font_weight">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="bold">Bold</option>
                                                <option value="bold">Bold</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="300">300</option>
                                                <option value="400">400</option>
                                                <option value="500">500</option>
                                                <option value="600">600</option>
                                                <option value="700">700</option>
                                                <option value="800">800</option>
                                                <option value="900">900</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="pills-sekolah" role="tabpanel"
                                    aria-labelledby="pills-sekolah-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col">
                                            <label for="school_top" class="form-label">Top</label>
                                            <input type="number" class="form-control" id="school_top"
                                                name="school_top">
                                        </div>
                                        <div class="col">
                                            <label for="school_bottom" class="form-label">Bottom</label>
                                            <input type="number" class="form-control" id="school_bottom"
                                                name="school_bottom">
                                        </div>
                                        <div class="col">
                                            <label for="school_left" class="form-label">Left</label>
                                            <input type="number" class="form-control" id="school_left"
                                                name="school_left">
                                        </div>
                                        <div class="col">
                                            <label for="school_right" class="form-label">Right</label>
                                            <input type="number" class="form-control" id="school_right"
                                                name="school_right">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col">
                                            <label for="scholl_font_size" class="form-label">Font Size</label>
                                            <input type="number" class="form-control" id="scholl_font_size"
                                                name="scholl_font_size">
                                        </div>
                                        <div class="col">
                                            <label for="school_color" class="form-label">Color</label>
                                            <input type="text" class="form-control" id="school_font_color"
                                                name="school_font_color">
                                        </div>

                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col">
                                            <label for="school_font_family" class="form-label">Font Family</label>
                                            <select class="form-control" id="school_font_family"
                                                name="school_font_family">
                                                <option value="">Pilih</option>
                                                <option value="'Poppins'">Poppins</option>
                                                <option value="sans-serif">Sans Serif</option>
                                                <option value="cursive">Cursive</option>
                                                <option value="monospace">Mono Space</option>
                                                <option value="auto">Auto</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="school_font_style" class="form-label">Font Family</label>
                                            <select class="form-control" id="school_font_style"
                                                name="school_font_style">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="italic">Italic</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="school_font_weight" class="form-label">Font Weight</label>
                                            <select class="form-control" id="school_font_weight"
                                                name="school_font_weight">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="bold">Bold</option>
                                                <option value="bold">Bold</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="300">300</option>
                                                <option value="400">400</option>
                                                <option value="500">500</option>
                                                <option value="600">600</option>
                                                <option value="700">700</option>
                                                <option value="800">800</option>
                                                <option value="900">900</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="pills-provinsi" role="tabpanel"
                                    aria-labelledby="pills-provinsi-tab" tabindex="0">

                                    <div class="row">
                                        <div class="col">
                                            <label for="province_top" class="form-label">Top</label>
                                            <input type="number" class="form-control" id="province_top"
                                                name="province_top">
                                        </div>
                                        <div class="col">
                                            <label for="province_bottom" class="form-label">Bottom</label>
                                            <input type="number" class="form-control" id="province_bottom"
                                                name="province_bottom">
                                        </div>
                                        <div class="col">
                                            <label for="province_left" class="form-label">Left</label>
                                            <input type="number" class="form-control" id="province_left"
                                                name="province_left">
                                        </div>
                                        <div class="col">
                                            <label for="province_right" class="form-label">Right</label>
                                            <input type="number" class="form-control" id="province_right"
                                                name="province_right">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col">
                                            <label for="province_font_size" class="form-label">Font Size</label>
                                            <input type="number" class="form-control" id="province_font_size"
                                                name="province_font_size">
                                        </div>
                                        <div class="col">
                                            <label for="province_color" class="form-label">Color</label>
                                            <input type="text" class="form-control" id="province_font_color"
                                                name="province_font_color">
                                        </div>

                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col">
                                            <label for="province_font_family" class="form-label">Font Family</label>
                                            <select class="form-control" id="province_font_family"
                                                name="province_font_family">
                                                <option value="">Pilih</option>
                                                <option value="'Poppins'">Poppins</option>
                                                <option value="sans-serif">Sans Serif</option>
                                                <option value="cursive">Cursive</option>
                                                <option value="monospace">Mono Space</option>
                                                <option value="auto">Auto</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="province_font_style" class="form-label">Font Family</label>
                                            <select class="form-control" id="province_font_style"
                                                name="province_font_style">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="italic">Italic</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="province_font_weight" class="form-label">Font Weight</label>
                                            <select class="form-control" id="province_font_weight"
                                                name="province_font_weight">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="bold">Bold</option>
                                                <option value="bold">Bold</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="300">300</option>
                                                <option value="400">400</option>
                                                <option value="500">500</option>
                                                <option value="600">600</option>
                                                <option value="700">700</option>
                                                <option value="800">800</option>
                                                <option value="900">900</option>
                                            </select>
                                        </div>

                                    </div>


                                </div>
                                <div class="tab-pane fade" id="pills-bidang" role="tabpanel"
                                    aria-labelledby="pills-bidang-tab" tabindex="0">

                                    <div class="row">
                                        <div class="col">
                                            <label for="study_top" class="form-label">Top</label>
                                            <input type="number" class="form-control" id="study_top"
                                                name="study_top">
                                        </div>
                                        <div class="col">
                                            <label for="study_bottom" class="form-label">Bottom</label>
                                            <input type="number" class="form-control" id="study_bottom"
                                                name="study_bottom">
                                        </div>
                                        <div class="col">
                                            <label for="study_left" class="form-label">Left</label>
                                            <input type="number" class="form-control" id="study_left"
                                                name="study_left">
                                        </div>
                                        <div class="col">
                                            <label for="study_right" class="form-label">Right</label>
                                            <input type="number" class="form-control" id="study_right"
                                                name="study_right">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col">
                                            <label for="study_font_size" class="form-label">Font Size</label>
                                            <input type="number" class="form-control" id="study_font_size"
                                                name="study_font_size">
                                        </div>
                                        <div class="col">
                                            <label for="study_color" class="form-label">Color</label>
                                            <input type="text" class="form-control" id="study_font_color"
                                                name="study_font_color">
                                        </div>

                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col">
                                            <label for="study_font_family" class="form-label">Font Family</label>
                                            <select class="form-control" id="study_font_family"
                                                name="study_font_family">
                                                <option value="">Pilih</option>
                                                <option value="'Poppins'">Poppins</option>
                                                <option value="sans-serif">Sans Serif</option>
                                                <option value="cursive">Cursive</option>
                                                <option value="monospace">Mono Space</option>
                                                <option value="auto">Auto</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="study_font_style" class="form-label">Font Family</label>
                                            <select class="form-control" id="study_font_style"
                                                name="study_font_style">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="italic">Italic</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="study_font_weight" class="form-label">Font Weight</label>
                                            <select class="form-control" id="study_font_weight"
                                                name="study_font_weight">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="bold">Bold</option>
                                                <option value="bold">Bold</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="300">300</option>
                                                <option value="400">400</option>
                                                <option value="500">500</option>
                                                <option value="600">600</option>
                                                <option value="700">700</option>
                                                <option value="800">800</option>
                                                <option value="900">900</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="pills-jenjang" role="tabpanel"
                                    aria-labelledby="pills-jenjang-tab" tabindex="0">

                                    <div class="row">
                                        <div class="col">
                                            <label for="level_top" class="form-label">Top</label>
                                            <input type="number" class="form-control" id="level_top"
                                                name="level_top">
                                        </div>
                                        <div class="col">
                                            <label for="level_bottom" class="form-label">Bottom</label>
                                            <input type="number" class="form-control" id="level_bottom"
                                                name="level_bottom">
                                        </div>
                                        <div class="col">
                                            <label for="level_left" class="form-label">Left</label>
                                            <input type="number" class="form-control" id="level_left"
                                                name="level_left">
                                        </div>
                                        <div class="col">
                                            <label for="level_right" class="form-label">Right</label>
                                            <input type="number" class="form-control" id="level_right"
                                                name="level_right">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col">
                                            <label for="level_font_size" class="form-label">Font Size</label>
                                            <input type="number" class="form-control" id="level_font_size"
                                                name="level_font_size">
                                        </div>
                                        <div class="col">
                                            <label for="level_color" class="form-label">Color</label>
                                            <input type="text" class="form-control" id="level_font_color"
                                                name="level_font_color">
                                        </div>

                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col">
                                            <label for="level_font_family" class="form-label">Font Family</label>
                                            <select class="form-control" id="level_font_family"
                                                name="level_font_family">
                                                <option value="">Pilih</option>
                                                <option value="'Poppins'">Poppins</option>
                                                <option value="sans-serif">Sans Serif</option>
                                                <option value="cursive">Cursive</option>
                                                <option value="monospace">Mono Space</option>
                                                <option value="auto">Auto</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="level_font_style" class="form-label">Font Family</label>
                                            <select class="form-control" id="level_font_style"
                                                name="level_font_style">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="italic">Italic</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="level_font_weight" class="form-label">Font Weight</label>
                                            <select class="form-control" id="level_font_weight"
                                                name="level_font_weight">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="bold">Bold</option>
                                                <option value="bold">Bold</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="300">300</option>
                                                <option value="400">400</option>
                                                <option value="500">500</option>
                                                <option value="600">600</option>
                                                <option value="700">700</option>
                                                <option value="800">800</option>
                                                <option value="900">900</option>
                                            </select>
                                        </div>

                                    </div>


                                </div>
                                <div class="tab-pane fade" id="pills-desc" role="tabpanel"
                                    aria-labelledby="pills-desc-tab" tabindex="0">

                                    <div class="row">
                                        <div class="col">
                                            <label for="desc_top" class="form-label">Top</label>
                                            <input type="number" class="form-control" id="desc_top"
                                                name="desc_top">
                                        </div>
                                        <div class="col">
                                            <label for="desc_bottom" class="form-label">Bottom</label>
                                            <input type="number" class="form-control" id="desc_bottom"
                                                name="desc_bottom">
                                        </div>
                                        <div class="col">
                                            <label for="desc_left" class="form-label">Left</label>
                                            <input type="number" class="form-control" id="desc_left"
                                                name="desc_left">
                                        </div>
                                        <div class="col">
                                            <label for="desc_right" class="form-label">Right</label>
                                            <input type="number" class="form-control" id="desc_right"
                                                name="desc_right">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col">
                                            <label for="desc_font_size" class="form-label">Font Size</label>
                                            <input type="number" class="form-control" id="desc_font_size"
                                                name="desc_font_size">
                                        </div>
                                        <div class="col">
                                            <label for="desc_color" class="form-label">Color</label>
                                            <input type="text" class="form-control" id="desc_font_color"
                                                name="desc_font_color">
                                        </div>

                                    </div>
                                    <div class="row" style="margin-top:15px;">
                                        <div class="col">
                                            <label for="desc_font_family" class="form-label">Font Family</label>
                                            <select class="form-control" id="desc_font_family"
                                                name="desc_font_family">
                                                <option value="">Pilih</option>
                                                <option value="'Poppins'">Poppins</option>
                                                <option value="sans-serif">Sans Serif</option>
                                                <option value="cursive">Cursive</option>
                                                <option value="monospace">Mono Space</option>
                                                <option value="auto">Auto</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="desc_font_style" class="form-label">Font Family</label>
                                            <select class="form-control" id="desc_font_style" name="desc_font_style">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="italic">Italic</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="desc_font_weight" class="form-label">Font Weight</label>
                                            <select class="form-control" id="desc_font_weight"
                                                name="desc_font_weight">
                                                <option value="">Pilih</option>
                                                <option value="normal">Normal</option>
                                                <option value="bold">Bold</option>
                                                <option value="bold">Bold</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="300">300</option>
                                                <option value="400">400</option>
                                                <option value="500">500</option>
                                                <option value="600">600</option>
                                                <option value="700">700</option>
                                                <option value="800">800</option>
                                                <option value="900">900</option>
                                            </select>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btn_simpan_css" type="submit" type="button" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('') }}template/backend/assets/js/lib/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        $("#form-setting").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ url('posiadmin/simpan_setting') }}",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function(data) {
                    window.location.reload();
                }
            })
        });

        function setting() {
            var competition_id = "{{ $competition_id }}";
            var product_id = "{{ $productid }}";
            $.ajax({
                url: "{{ url('posiadmin/setting_css') }}" + "/" + product_id + "/" + competition_id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $("#id").val(data.id);
                    $("#product_id").val(data.product_id);
                    $("#competition_id").val(data.competition_id);
                    $("#document_type").val(data.document_type);
                    $("#name_top").val(data.name_top);
                    $("#name_bottom").val(data.name_bottom);
                    $("#name_left").val(data.name_left);
                    $("#name_right").val(data.name_right);
                    $("#name_font_size").val(data.name_font_size);
                    $("#name_font_color").val(data.name_font_color);
                    $("#name_font_family").val(data.name_font_family);
                    $("#name_font_style").val(data.name_font_style);
                    $("#name_font_weight").val(data.name_font_weight);


                    $("#school_top").val(data.school_top);
                    $("#school_bottom").val(data.school_bottom);
                    $("#school_left").val(data.school_left);
                    $("#school_right").val(data.school_right);
                    $("#scholl_font_size").val(data.scholl_font_size);
                    $("#school_font_color").val(data.school_font_color);
                    $("#school_font_family").val(data.school_font_family);
                    $("#school_font_style").val(data.school_font_style);
                    $("#school_font_weight").val(data.school_font_weight);


                    $("#province_top").val(data.province_top);
                    $("#province_bottom").val(data.province_bottom);
                    $("#province_left").val(data.province_left);
                    $("#province_right").val(data.province_right);
                    $("#province_font_size").val(data.province_font_size);
                    $("#province_font_color").val(data.province_font_color);
                    $("#province_font_family").val(data.province_font_family);
                    $("#province_font_style").val(data.province_font_style);
                    $("#province_font_weight").val(data.province_font_weight);


                    $("#study_top").val(data.study_top);
                    $("#study_bottom").val(data.study_bottom);
                    $("#study_left").val(data.study_left);
                    $("#study_right").val(data.study_right);
                    $("#study_font_size").val(data.study_font_size);
                    $("#study_font_color").val(data.study_font_color);
                    $("#study_font_family").val(data.study_font_family);
                    $("#study_font_style").val(data.study_font_style);
                    $("#study_font_weight").val(data.study_font_weight);



                    $("#level_top").val(data.level_top);
                    $("#level_bottom").val(data.level_bottom);
                    $("#level_left").val(data.level_left);
                    $("#level_right").val(data.level_right);
                    $("#level_font_size").val(data.level_font_size);
                    $("#level_font_color").val(data.level_font_color);
                    $("#level_font_family").val(data.level_font_family);
                    $("#level_font_style").val(data.level_font_style);
                    $("#level_font_weight").val(data.level_font_weight);


                    $("#desc_top").val(data.desc_top);
                    $("#desc_bottom").val(data.desc_bottom);
                    $("#desc_left").val(data.desc_left);
                    $("#desc_right").val(data.desc_right);
                    $("#desc_font_size").val(data.desc_font_size);
                    $("#desc_font_color").val(data.desc_font_color);
                    $("#desc_font_family").val(data.desc_font_family);
                    $("#desc_font_style").val(data.desc_font_style);
                    $("#desc_font_weight").val(data.desc_font_weight);

                    $(".modal-title").text("Setting");
                    $("#modal-setting").modal("show");
                }
            })


        }

        
        // =========================== Nama =========================== 
        
        $("#name_top").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".doc-name").css("top", nilai);
        });


        $("#name_bottom").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".doc-name").css("bottom", nilai);
        });

        $("#name_left").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".doc-name").css("left", nilai);
        });
        $("#name_right").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".doc-name").css("right", nilai);
        });

        $("#name_font_size").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".doc-name").css("font-size", nilai.toString());
            console.log(nilai);
        });

        $("#name_font_color").keyup(function() {
            var nilai = $(this).val();

            $(".doc-name").css("color", nilai);
        });

        $("#name_font_family").change(function() {
            var nilai = $(this).val();

            $(".doc-name").css("font-family", nilai);
        });

        $("#name_font_style").change(function() {
            var nilai = $(this).val();

            $(".doc-name").css("font-style", nilai);
        });

        $("#name_font_weight").change(function() {
            var nilai = $(this).val();

            $(".doc-name").css("font-weight", nilai);
        });



        // =========================== Sekolah =========================== 
        
        $("#school_top").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".school-name").css("top", nilai);
        });


        $("#school_bottom").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".school-name").css("bottom", nilai);
        });

        $("#school_left").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".school-name").css("left", nilai);
        });
        $("#school_right").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".school-name").css("right", nilai);
        });

        $("#scholl_font_size").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".school-name").css("font-size", nilai.toString());
            console.log(nilai);
        });

        $("#school_font_color").keyup(function() {
            var nilai = $(this).val();

            $(".school-name").css("color", nilai);
        });

        $("#school_font_family").change(function() {
            var nilai = $(this).val();

            $(".school-name").css("font-family", nilai);
        });

        $("#school_font_style").change(function() {
            var nilai = $(this).val();

            $(".school-name").css("font-style", nilai);
        });

        $("#school_font_weight").change(function() {
            var nilai = $(this).val();

            $(".school-name").css("font-weight", nilai);
        });


        // =========================== Provinsi =========================== 
        
        $("#province_top").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".province-name").css("top", nilai);
        });


        $("#province_bottom").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".province-name").css("bottom", nilai);
        });

        $("#province_left").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".province-name").css("left", nilai);
        });
        $("#province_right").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".province-name").css("right", nilai);
        });

        $("#province_font_size").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".province-name").css("font-size", nilai.toString());
            console.log(nilai);
        });

        $("#province_font_color").keyup(function() {
            var nilai = $(this).val();

            $(".province-name").css("color", nilai);
        });

        $("#province_font_family").change(function() {
            var nilai = $(this).val();

            $(".province-name").css("font-family", nilai);
        });

        $("#province_font_style").change(function() {
            var nilai = $(this).val();

            $(".province-name").css("font-style", nilai);
        });

        $("#province_font_weight").change(function() {
            var nilai = $(this).val();

            $(".province-name").css("font-weight", nilai);
        });


        // =========================== Nama =========================== 
        
        $("#study_top").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".bidang-name").css("top", nilai);
        });


        $("#study_bottom").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".bidang-name").css("bottom", nilai);
        });

        $("#study_left").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".bidang-name").css("left", nilai);
        });
        $("#study_right").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".bidang-name").css("right", nilai);
        });

        $("#study_font_size").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".bidang-name").css("font-size", nilai.toString());
            console.log(nilai);
        });

        $("#study_font_color").keyup(function() {
            var nilai = $(this).val();

            $(".bidang-name").css("color", nilai);
        });

        $("#study_font_family").change(function() {
            var nilai = $(this).val();

            $(".bidang-name").css("font-family", nilai);
        });

        $("#study_font_style").change(function() {
            var nilai = $(this).val();

            $(".bidang-name").css("font-style", nilai);
        });

        $("#study_font_weight").change(function() {
            var nilai = $(this).val();

            $(".bidang-name").css("font-weight", nilai);
        });



        // =========================== Nama =========================== 
        
        $("#level_top").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".jenjang-name").css("top", nilai);
        });


        $("#level_bottom").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".jenjang-name").css("bottom", nilai);
        });

        $("#level_left").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".jenjang-name").css("left", nilai);
        });
        $("#level_right").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".jenjang-name").css("right", nilai);
        });

        $("#level_font_size").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".jenjang-name").css("font-size", nilai.toString());
            console.log(nilai);
        });

        $("#level_font_color").keyup(function() {
            var nilai = $(this).val();

            $(".jenjang-name").css("color", nilai);
        });

        $("#level_font_family").change(function() {
            var nilai = $(this).val();

            $(".jenjang-name").css("font-family", nilai);
        });

        $("#level_font_style").change(function() {
            var nilai = $(this).val();

            $(".jenjang-name").css("font-style", nilai);
        });

        $("#level_font_weight").change(function() {
            var nilai = $(this).val();

            $(".jenjang-name").css("font-weight", nilai);
        });

        // =========================== Nama =========================== 
        
        $("#desc_top").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".prestasi").css("top", nilai);
        });


        $("#desc_bottom").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".prestasi").css("bottom", nilai);
        });

        $("#desc_left").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".prestasi").css("left", nilai);
        });
        $("#desc_right").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".prestasi").css("right", nilai);
        });

        $("#desc_font_size").keyup(function() {
            var nilai = $(this).val() + 'px';

            $(".prestasi").css("font-size", nilai.toString());
            console.log(nilai);
        });

        $("#desc_font_color").keyup(function() {
            var nilai = $(this).val();

            $(".prestasi").css("color", nilai);
        });

        $("#desc_font_family").change(function() {
            var nilai = $(this).val();

            $(".prestasi").css("font-family", nilai);
        });

        $("#desc_font_style").change(function() {
            var nilai = $(this).val();

            $(".prestasi").css("font-style", nilai);
        });

        $("#desc_font_weight").change(function() {
            var nilai = $(this).val();

            $(".prestasi").css("font-weight", nilai);
        });



    </script>
</body>

</html>
