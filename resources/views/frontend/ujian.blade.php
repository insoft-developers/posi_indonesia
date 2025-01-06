@extends('frontend.master_ujian')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">



    </div>
    <!-- Page Banner End -->

    <!-- About Start -->

    @php

        $nomor = session('nomor') ?? 0;
    @endphp
    <div class="section">
        <input type="hidden" id="tanggal-ujian" value="{{ $session->competition->date }}">
        <input type="hidden" id="jam-selesai" value="{{ $session->study->finish_time }}">
        <input type="hidden" id="study-id" value="{{ $session->study_id }}">
        <input type="hidden" id="competition-id" value="{{ $session->competition_id }}">
        <input type="hidden" id="token-id" value="{{ $session->token }}">
        <input type="hidden" id="jumlah-soal" value="{{ $soal->count() }}">

        <div class="section-padding-02 mt-n10">
            <div class="container">
                <div class="section-title shape-03 text-center">


                </div>
                <div class="row" id="soal-container">
                    <div class="col-lg-12">
                        <div class="soal-wrapper">
                            <a class="lihat-soal" onclick="lihat_soal()" href="javascript:void(0)"><i class="icofont-listing-box"></i> lihat nomor
                                soal</a>
                            <p class="no-soal">Soal No. <?= $soal[$nomor]->question_number ?> dari <?= $soal->count() ?></p>
                            <input type="hidden" id="no-soal" value="<?= $soal[$nomor]->question_number ?>">
                            <input type="hidden" id="id-soal" value="<?= $soal[$nomor]->id ?>">
                            <p class="soal-title"><?= $soal[$nomor]->question_title ?></p>
                        </div>
                        <div class="jawaban-wrapper">
                            <p class="pilih-jawaban">Pilih Salah Satu Jawaban :</p>
                            <div class="row">
                                <div class="col-md-6">
                                    @if ($ada == 1 && $exist->jawaban_soal == 'a')
                                        <div onclick="selected(1)" id="jawaban-a" class="jawaban-item selected-jawaban">A.
                                            <?= $soal[$nomor]->option_a ?></div>
                                    @else
                                        <div onclick="selected(1)" id="jawaban-a" class="jawaban-item">A.
                                            <?= $soal[$nomor]->option_a ?></div>
                                    @endif



                                    @if ($ada == 1 && $exist->jawaban_soal == 'c')
                                        <div onclick="selected(3)" id="jawaban-c" class="jawaban-item selected-jawaban">C.
                                            <?= $soal[$nomor]->option_c ?></div>
                                    @else
                                        <div onclick="selected(3)" id="jawaban-c" class="jawaban-item">C.
                                            <?= $soal[$nomor]->option_c ?></div>
                                    @endif



                                    @if ($ada == 1 && $exist->jawaban_soal == 'e')
                                        <div onclick="selected(5)" id="jawaban-e" class="jawaban-item selected-jawaban">E.
                                            <?= $soal[$nomor]->option_e ?></div>
                                    @else
                                        <div onclick="selected(5)" id="jawaban-e" class="jawaban-item">E.
                                            <?= $soal[$nomor]->option_e ?></div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if ($ada == 1 && $exist->jawaban_soal == 'b')
                                        <div onclick="selected(2)" id="jawaban-b" class="jawaban-item selected-jawaban">B.
                                            <?= $soal[$nomor]->option_b ?></div>
                                    @else
                                        <div onclick="selected(2)" id="jawaban-b" class="jawaban-item">B.
                                            <?= $soal[$nomor]->option_b ?></div>
                                    @endif



                                    @if ($ada == 1 && $exist->jawaban_soal == 'd')
                                        <div onclick="selected(4)" id="jawaban-d" class="jawaban-item selected-jawaban">D.
                                            <?= $soal[$nomor]->option_d ?></div>
                                    @else
                                        <div onclick="selected(4)" id="jawaban-d" class="jawaban-item">D.
                                            <?= $soal[$nomor]->option_d ?></div>
                                    @endif


                                    @if ($ada == 1 && $exist->jawaban_soal == 'f')
                                        <div onclick="selected(6)" id="jawaban-f" class="jawaban-item selected-jawaban">
                                            LEWATI</div>
                                    @else
                                        <div onclick="selected(6)" id="jawaban-f" class="jawaban-item">LEWATI</div>
                                    @endif
                                </div>
                            </div>


                        </div>
                        <hr />
                        <button onclick="sebelumnya()" class="btn-sebelumnya-insoft">Sebelumnya</button>
                        <button onclick="simpan_jawaban()" class="btn-simpan-insoft">Simpan</button>

                        <button onclick="selesai_ujian()" class="btn-selesai-insoft">Selesai</button>
                        <div style="margin-top:150px;"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal-soal" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-600">
            <div class="modal-content">

                <div class="modal-header">
                    <p class="modal-title"><span class="modal-head-title">Daftar Nomor Soal</span><br><span
                            class="modal-subtitle" id="modal-subtitle"></span></p>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="content-number" class="content-number">
                        <div class="row" id="isi-nomor">
                            

                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    {{-- <button type="submit" class="btn btn-primary btn-sm">Daftar</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->
@endsection
