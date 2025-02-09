@extends('frontend.master')

@section('content')
    <!-- Page Banner Start -->
    <div class="section page-banner">



    </div>
    <!-- Page Banner End -->

    <!-- About Start -->
    <div class="section"  style="background: rgb(237, 235, 235);">

        <div class="section-padding-02 mt-n10">
            <div class="container">
                <div class="section-title shape-03 text-center">
                   
                    <div style="margin-top:30px"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pembahasan-title">
                            <p class="title-one">SOAL DAN PEMBAHASAN</p>
                            <p class="title-two">{{ $ujian[0]->study->pelajaran->name }} - {{ $ujian[0]->competition->title }}</p>
                        </div>
                        @foreach($ujian as $u)
                        <div class="pembahasan-item item-item">
                            <div class="pembahasan-no-soal">Soal Nomor {{ $u->question_number }}</div>
                            <div class="pembahasan-soal">{{ $u->question_title }}</div>
                            <div class="pembahasan-opt-a">Option A</div>
                            <div class="pembahasan-option-a">{{ $u->option_a }}</div>
                            <div class="pembahasan-opt-a">Option B</div>
                            <div class="pembahasan-option-a">{{ $u->option_b }}</div>
                            <div class="pembahasan-opt-a">Option C</div>
                            <div class="pembahasan-option-a">{{ $u->option_c }}</div>
                            <div class="pembahasan-opt-a">Option D</div>
                            <div class="pembahasan-option-a">{{ $u->option_d }}</div>
                            <div class="pembahasan-opt-a">Option E</div>
                            <div class="pembahasan-option-a">{{ $u->option_e }}</div>
                            <div class="pembahasan-jawaban">Jawaban : {{ strtoupper($u->answer_key) }}</div>
                            <div class="pembahasan-pembahasan"><?= $u->pembahasan->pembahasan ;?></div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- About End -->


@endsection
