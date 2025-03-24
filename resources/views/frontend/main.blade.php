@php
    function hari_ini($tanggal)
    {
        $hari = date('D', strtotime($tanggal));

        switch ($hari) {
            case 'Sun':
                $hari_ini = 'Minggu';
                break;

            case 'Mon':
                $hari_ini = 'Senin';
                break;

            case 'Tue':
                $hari_ini = 'Selasa';
                break;

            case 'Wed':
                $hari_ini = 'Rabu';
                break;

            case 'Thu':
                $hari_ini = 'Kamis';
                break;

            case 'Fri':
                $hari_ini = 'Jumat';
                break;

            case 'Sat':
                $hari_ini = 'Sabtu';
                break;

            default:
                $hari_ini = 'Tidak di ketahui';
                break;
        }

        return $hari_ini;
    }

    function selisih_hari($tanggal)
    {
        $tanggal_1 = new DateTime();
        $tanggal_2 = new DateTime($tanggal);
        $selisih = $tanggal_1->diff($tanggal_2);
        return $selisih->d;
    }

@endphp


@extends('frontend.master')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">


    </div>
    <!-- Page Banner End -->

    <!-- Blog Start -->
    <div class="section section-padding mt-n10">
        <div class="container">
            <div class="section-title shape-03">
                <h2 class="main-judul">Kompetisi Online</h2>
            </div>
            <!-- Blog Wrapper Start -->
            <div class="blog-wrapper">
                <div class="row">
                    <input type="hidden" id="jumlah_kompetisi" value="{{ count($kompetisi) }}">
                    @foreach ($kompetisi as $index => $k)
                        @php
                            $level_array = explode(',', $k->level);
                            $level_user = Auth::user()->level_id;
                            $cek = array_search((string) $level_user, $level_array, true);
                            $user = \App\Models\User::findorFail(Auth::user()->id);

                        @endphp
                        @if ($cek !== false)
                            @if ($k->province_code == null || $k->province_code == $user->provinsi)
                                @if ($k->city_code == null || $k->city_code == $user->kabupaten)
                                    @if ($k->district_code == null || $k->district_code == $user->kecamatan)
                                        @if ($k->sekolah == null || $k->sekolah == $user->nama_sekolah)
                                            @if ($k->agama == null || $k->agama == $user->agama)
                                                @php
                                                    $query = \App\Models\Transaction::where('competition_id', $k->id)
                                                        // ->distinct('userid')
                                                        ->count('id');

                                                    $transaction = $query;

                                                @endphp
                                                <div class="col-lg-4 col-md-6">

                                                    <!-- Single Blog Start -->
                                                    <div class="single-blog">
                                                        <div class="blog-image">
                                                            <a href="#"><img class="gambar-kompetisi"
                                                                    src="{{ asset('template/frontend') }}/assets/kompetisi/{{ $k->image }}"
                                                                    alt="Blog"></a>
                                                        </div>
                                                        <div class="blog-content">
                                                            @php
                                                                $bonus = \App\Models\CompetitionBonusProduct::where(
                                                                    'competition_id',
                                                                    $k->id,
                                                                );
                                                                if ($bonus->count() > 0) {
                                                                    $bns = $bonus->first();
                                                                    $free_products = explode(
                                                                        ',',
                                                                        $bns->free_register_product,
                                                                    );
                                                                    $premium_products = explode(
                                                                        ',',
                                                                        $bns->premium_register_product,
                                                                    );

                                                                    $html1 = '';
                                                                    foreach ($free_products as $index1 => $fp) {
                                                                        $barang = \App\Models\Product::findorFail($fp);
                                                                        if ($index1 + 1 == count($free_products)) {
                                                                            if ($barang->is_combo == 1) {
                                                                                $html1 .=
                                                                                    '<span> ' .
                                                                                    $barang->product_name .
                                                                                    ' ( ' .
                                                                                    $barang->description .
                                                                                    ' )</span>';
                                                                            } else {
                                                                                $html1 .=
                                                                                    '<span> ' .
                                                                                    $barang->product_name .
                                                                                    '</span>';
                                                                            }
                                                                        } else {
                                                                            if ($barang->is_combo == 1) {
                                                                                $html1 .=
                                                                                    '<span> ' .
                                                                                    $barang->product_name .
                                                                                    ' ( ' .
                                                                                    $barang->description .
                                                                                    ' )</span>,';
                                                                            } else {
                                                                                $html1 .=
                                                                                    '<span> ' .
                                                                                    $barang->product_name .
                                                                                    '</span>,';
                                                                            }
                                                                        }
                                                                    }

                                                                    $html2 = '';
                                                                    foreach ($premium_products as $index1 => $pp) {
                                                                        $barang = \App\Models\Product::findorFail($pp);
                                                                        if ($index1 + 1 == count($premium_products)) {
                                                                            if ($barang->is_combo == 1) {
                                                                                $html2 .=
                                                                                    '<span> ' .
                                                                                    $barang->product_name .
                                                                                    ' ( ' .
                                                                                    $barang->description .
                                                                                    ' )</span>';
                                                                            } else {
                                                                                $html2 .=
                                                                                    '<span> ' .
                                                                                    $barang->product_name .
                                                                                    '</span>';
                                                                            }
                                                                        } else {
                                                                            if ($barang->is_combo == 1) {
                                                                                $html2 .=
                                                                                    '<span> ' .
                                                                                    $barang->product_name .
                                                                                    ' ( ' .
                                                                                    $barang->description .
                                                                                    ' )</span>,';
                                                                            } else {
                                                                                $html2 .=
                                                                                    '<span> ' .
                                                                                    $barang->product_name .
                                                                                    '</span>,';
                                                                            }
                                                                        }
                                                                    }
                                                                }

                                                            @endphp

                                                            @if ($bonus->count() > 0)
                                                                <h4 class="title"><a href="#">{{ $k->title }}
                                                                        <br><span
                                                                            style="font-weight:bold;font-size:13px;">BONUS</span>
                                                                        : <span class="bonus-text"><?= $html2 ?>(Premium
                                                                            Register).</span><br><span
                                                                            class="bonus-text2"><?= $html1 ?>(Free
                                                                            Register).</span></a></h4>
                                                            @else
                                                                <h4 class="title"><a href="#">{{ $k->title }}</a>
                                                                </h4>
                                                            @endif
                                                            <div class="blog-meta">
                                                                <span> <i
                                                                        class="icofont-calendar"></i>{{ hari_ini($k->date) }},
                                                                    {{ date('d F Y', strtotime($k->date)) }}</span>
                                                                <input type="hidden" id="waktu_{{ $index }}"
                                                                    value="{{ $k->finish_registration_date }} {{ $k->finish_registration_time }}">
                                                                <span class="sisa-hari"
                                                                    id="countdown_{{ $index }}"></span>

                                                            </div>
                                                            <div class="garis"></div>
                                                            <div class="blog-meta">
                                                                <span> <i class="icofont-files-stack"></i>Masa
                                                                    Pendaftaran</span>
                                                            </div>
                                                            <div class="blog-note">
                                                                {{ date('d F Y', strtotime($k->start_registration_date)) }}
                                                                {{ date('H:i', strtotime($k->start_registration_time)) }}
                                                                s.d
                                                            </div>
                                                            <div class="blog-note">
                                                                {{ date('d F Y', strtotime($k->finish_registration_date)) }}
                                                                {{ date('H:i', strtotime($k->finish_registration_time)) }}
                                                            </div>
                                                            <div class="blog-meta">
                                                                <span> <i class="icofont-money"></i>Biaya Pendaftaran</span>
                                                            </div>
                                                            <div class="blog-note">
                                                                @if ($k->type == 1)
                                                                    Rp. {{ number_format($k->price) }} atau gratis dengan
                                                                    syarat
                                                                @elseif($k->type == 2)
                                                                    Rp. {{ number_format($k->price) }}
                                                                @elseif($k->type == 3)
                                                                    Gratis Dengan Syarat
                                                                @endif

                                                            </div>
                                                            <div class="blog-meta">
                                                                <span> <i class="icofont-link"></i>Links</span>
                                                            </div>
                                                            <div class="blog-note">
                                                                <a target="_blank" href="{{ $k->link_juknis }}">Link
                                                                    juknis</a>
                                                                <a target="_blank" style="margin-left:15px;"
                                                                    href="{{ $k->link_twibbon }}">Link Twibbon</a>


                                                            </div>

                                                            @php
                                                                $tr = \App\Models\Transaction::where(
                                                                    'userid',
                                                                    Auth::user()->id,
                                                                )
                                                                    ->where('competition_id', $k->id)
                                                                    ->whereHas('invoices', function ($q) {
                                                                        $q->where('payment_status', 1);
                                                                    })
                                                                    ->count();

                                                            @endphp
                                                            @if ($tr > 0)
                                                                <div class="blog-note">
                                                                    <a target="_blank" href="{{ $k->link_zoom }}">Link
                                                                        Zoom</a>
                                                                    <a target="_blank" style="margin-left:15px;"
                                                                        href="{{ $k->link_wa }}">Link Whatsapp</a>
                                                                    <a target="_blank" style="margin-left:15px;"
                                                                        href="{{ $k->link_telegram }}">Link Telegram</a>

                                                                </div>
                                                            @endif
                                                            <div class="garis"></div>
                                                            <button id="btn_daftar_{{ $index }}"
                                                                href="javascript:void(0);"
                                                                onclick="daftar({{ $k->id }})"
                                                                class="btn btn-secondary btn-hover-primary">Daftar</button>
                                                            <span class="foot-note">{{ $transaction }} Pedaftar</span>
                                                        </div>
                                                    </div>
                                                    <!-- Single Blog End -->

                                                </div>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- Blog Wrapper End -->

            <!-- Page Pagination End -->
            {{-- <div class="page-pagination">
                    <ul class="pagination justify-content-center">
                        <li><a href="#"><i class="icofont-rounded-left"></i></a></li>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                    </ul>
                </div> --}}
            <!-- Page Pagination End -->

        </div>
    </div>
    <!-- Blog End -->

    <!-- Blog Start -->

    <!-- Blog End -->


    <!-- Modal -->
    <div class="modal fade" id="modal-daftar" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content modal-transparent">
                <input type="hidden" id="competition_id">

                <div class="modal-body">

                    <center class="x-pendaftaran">
                        <div onclick="personal_register(-1)" class="tombol-daftar"><i class="fa fa-user"></i> Pendaftaran
                            Personal</div>
                    </center>
                    <center class="x-pendaftaran">
                        <div onclick="collective_register()" class="tombol-daftar"><i class="fa fa-users"></i> Pendaftaran
                            Kolektif</div>
                    </center>


                </div>

            </div>
        </div>
    </div>
    <!-- end Modal -->

    <!-- Modal -->
    <div class="modal fade" id="modal-collective" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-600">
            <div class="modal-content">


                <div class="modal-body">

                    <div class="single-form" style="padding: 10px;">
                        <select style="width: 100%;" class="select2-choice" id="collective_search" name="collective_search">
                            <option value=""> - Cari - </option>
                            @foreach ($users as $u)
                                <option value="{{ $u->id }}"><?=  '<strong>'.strtoupper($u->name) .'</strong>'  ;?> - [ <?=  $u->email ;?> ] -  <?= $u->nama_sekolah ;?></option>
                            @endforeach
                        </select>


                    </div>

                </div>
                <div class="modal-footer"></div>

            </div>

        </div>
    </div>
    <!-- end Modal -->


    <!-- Modal -->
    <div class="modal fade" id="modal-daftar-list" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-600">
            <div class="modal-content">


                <div class="modal-header">
                    <p class="modal-title"><span class="modal-head-title"></span><br><span
                            class="modal-subtitle" id="modal-subtitle">Pendaftaran Event</span></p>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="daftar-user-id" name="daftar-user-id">
                    <div id="modal-daftar-list-content"></div>
                </div>
                <div class="modal-footer">
                    <button id="btn_simpan_gratis" onclick="syarat_gratis()" type="button"
                        class="btn btn-warning btn-sm">Gratis</button>
                    <button id="btn_simpan_premium" onclick="simpan_bayar()" type="button"
                        class="btn btn-primary btn-sm">Berbayar</button>
                </div>

            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modal-gratis" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-600">
            <div class="modal-content">

                <form method="POST" id="form-gratis-submit" name="form-gratis-submit" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <p class="modal-title"><span class="modal-head-title">{{ Auth::user()->name }}</span><br><span
                                class="modal-subtitle" id="modal-subtitle">Syarat Pendaftaran</span></p>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Follow Instagram @posi.idn</label>
                            <div style="margin-top:10px;"></div>
                            <input type="file" id="file1" name="file1" accept="*.jpg, *.jpeg, *.png" required
                                style="display: none;">
                            <img id="image-syarat1" src="{{ asset('template/frontend/assets/umum/upload_icon.png') }}"
                                class="upload-syarat">
                        </div>
                        <hr />
                        <div class="form-group">
                            <label>follow akun IG @posikompetisi</label>
                            <div style="margin-top:10px;"></div>
                            <input type="file" id="file2" name="file2" accept="*.jpg, *.jpeg, *.png" required
                                style="display: none;">
                            <img id="image-syarat2" src="{{ asset('template/frontend/assets/umum/upload_icon.png') }}"
                                class="upload-syarat">
                        </div>
                        <hr />
                        <div class="form-group">
                            <label>Komen pendapat posiitf kamu tentang POSI kemudian tag 5 teman kamu di positingan
                                ini.</label>
                            <div style="margin-top:10px;"></div>
                            <input type="file" id="file3" name="file3" accept="*.jpg, *.jpeg, *.png" required
                                style="display: none;">
                            <img id="image-syarat3" src="{{ asset('template/frontend/assets/umum/upload_icon.png') }}"
                                class="upload-syarat">
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button id="btn-daftar-free" type="submit" class="btn btn-primary btn-sm">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Modal -->
@endsection
