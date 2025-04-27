@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Dashboard</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">AI</li>
            </ul>
        </div>

        <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-1 h-100">
                    <div class="card-body p-20">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <p class="fw-medium text-primary-light mb-1">Total Akun User</p>
                                <h6 class="mb-0">{{ number_format($users) }}</h6>
                            </div>
                            <div
                                class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="gridicons:multiple-users"
                                    class="text-white text-2xl mb-0"></iconify-icon>
                            </div>
                        </div>
                        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">

                            <a href="{{ url('posiadmin/user') }}">More Info...</a>
                        </p>
                    </div>
                </div><!-- card end -->
            </div>
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-2 h-100">
                    <div class="card-body p-20">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <p class="fw-medium text-primary-light mb-1">Total Visitor</p>
                                <h6 class="mb-0">{{ number_format($visitors) }}</h6>
                            </div>
                            <div
                                class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="material-symbols:nest-doorbell-visitor"
                                    class="text-white text-2xl mb-0"></iconify-icon>
                            </div>
                        </div>
                        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                            <a href="{{ url('posiadmin/user') }}">More Info...</a>
                        </p>
                    </div>
                </div><!-- card end -->
            </div>
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-3 h-100">
                    <div class="card-body p-20">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <p class="fw-medium text-primary-light mb-1">User Mendaftar</p>
                                <h6 class="mb-0">{{ number_format($pendaftar) }}</h6>
                            </div>
                            <div
                                class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="fluent:people-20-filled"
                                    class="text-white text-2xl mb-0"></iconify-icon>
                            </div>
                        </div>
                        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                            <a href="{{ url('posiadmin/pesanan') }}">More Info...</a>
                        </p>
                    </div>
                </div><!-- card end -->
            </div>
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-4 h-100">
                    <div class="card-body p-20">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <p class="fw-medium text-primary-light mb-1">User Pesan Produk</p>
                                <h6 class="mb-0">{{ number_format($pesan) }}</h6>
                            </div>
                            <div
                                class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="material-symbols:production-quantity-limits-sharp"
                                    class="text-white text-2xl mb-0"></iconify-icon>
                            </div>
                        </div>
                        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                            <a href="{{ url('posiadmin/order') }}">More Info...</a>
                        </p>
                    </div>
                </div><!-- card end -->
            </div>
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-5 h-100">
                    <div class="card-body p-20">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <p class="fw-medium text-primary-light mb-1">Pendapatan Pendaftaran</p>
                                <h6 class="mb-0">{{ number_format($register_incomes) }}</h6>
                            </div>
                            <div
                                class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="fa6-solid:file-invoice-dollar"
                                    class="text-white text-2xl mb-0"></iconify-icon>
                            </div>
                        </div>
                        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                            <a href="{{ url('posiadmin/pesanan') }}">More Info...</a>
                        </p>
                    </div>
                </div><!-- card end -->
            </div>
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-5 h-100">
                    <div class="card-body p-20">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <p class="fw-medium text-primary-light mb-1">Pendapatan Produk</p>
                                <h6 class="mb-0">{{ number_format($product_incomes) }}</h6>
                            </div>
                            <div
                                class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="fa6-solid:file-invoice-dollar"
                                    class="text-white text-2xl mb-0"></iconify-icon>
                            </div>
                        </div>
                        <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                            <a href="{{ url('posiadmin/order') }}">More Info...</a>
                        </p>
                    </div>
                </div><!-- card end -->
            </div>
        </div>



        <div class="row gy-4 mt-1">
            <div class="col-xxl-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                            <h6 class="mb-2 fw-bold text-lg mb-0">Grafik Pengunjung Tahun {{ date('Y') }}</h6>

                        </div>

                        <ul class="d-flex flex-wrap align-items-center mt-3 gap-3">
                            <li class="d-flex align-items-center gap-2">
                                <span class="w-12-px h-12-px rounded-circle bg-primary-600"></span>
                                <span class="text-secondary-light text-sm fw-semibold">Visitors:
                                    <span class="text-primary-light fw-bold"></span>
                                </span>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <span class="w-12-px h-12-px rounded-circle bg-yellow"></span>
                                <span class="text-secondary-light text-sm fw-semibold">Pendaftar:
                                    <span class="text-primary-light fw-bold"></span>
                                </span>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <span class="w-12-px h-12-px rounded-circle bg-danger"></span>
                                <span class="text-secondary-light text-sm fw-semibold">Pemesan:
                                    <span class="text-danger-light fw-bold"></span>
                                </span>
                            </li>
                        </ul>

                        <div class="mt-40">
                            <div id="paymentStatusChart" class="margin-16-minus"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xxl-9 col-xl-12">
                <div class="card h-100">
                    <div class="card-body p-24">
                        <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                            <h6 class="mb-2 fw-bold text-lg mb-0">Daftar Pengguna Per Provinsi</h6>

                        </div>
                        <div style="margin-top:20px"></div>
                        @foreach($provinsi as $index => $pr)
                        @php
                            $user_num = \App\Models\User::where('provinsi', $pr->province_code)->count();
                        @endphp
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne_{{ $index }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse_{{ $index }}" aria-expanded="false" aria-controls="collapse_{{ $index }}">
                                        {{ $pr->province_name }} - ( {{ $user_num }} )
                                    </button>
                                </h2>

                                <div id="collapse_{{ $index }}" class="accordion-collapse collapse"
                                    aria-labelledby="headingOne_{{ $index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @php     
                                            $list_kota = \App\Models\Province::where('province_code', $pr->province_code)
                                                ->groupBy('regency_code')
                                                ->get();

                                        
                                        @endphp
                                        <ul>
                                        @foreach($list_kota as $lk)
                                        @php
                                            $user_kab = \App\Models\User::where('kabupaten', $lk->regency_code)->count();
                                        @endphp
                                            <li>{{ $lk->regency_name }} - ( {{ $user_kab }} )</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>


            <div class="col-xxl-9 col-xl-12">
                <div class="card h-100">
                    <div class="card-body p-24">
                        <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                            <h6 class="mb-2 fw-bold text-lg mb-0">Daftar Pengguna Per Jenjang</h6>

                        </div>
                        <div style="margin-top:20px"></div>
                        @foreach($jenjang as $index => $lv)
                        @php
                            $user_lnum = \App\Models\User::where('level_id', $lv->id)->count();
                        @endphp
                        <div class="accordion" id="accordionExample2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading_tab_{{ $index }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse2_{{ $index }}" aria-expanded="false" aria-controls="collapse2_{{ $index }}">
                                        {{ $lv->level_name }} - ( {{ $user_lnum }} )
                                    </button>
                                </h2>
                                <div id="collapse2_{{ $index }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading_tab_{{ $index }}" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        @php     
                                            $list_sekolah = \App\Models\User::where('level_id', $lv->id)
                                                ->groupBy('nama_sekolah')
                                                ->get();

                                        
                                        @endphp
                                        <ul>
                                        @foreach($list_sekolah as $sk)
                                        @php
                                            $user_sekolah = \App\Models\User::where('nama_sekolah', $sk->nama_sekolah)
                                            ->count();
                                        @endphp
                                            <li>{{ $sk->nama_sekolah }} - ( {{ $user_sekolah }} )</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>

                                
                            </div>
                           
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
