@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">

                        HomePage
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Tentang Kami</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Tentang Kami</h5>

            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success bg-success-600 text-white border-success-600 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between"
                        role="alert">
                        {{ session('success') }}
                        <button class="remove-button text-white text-xxl line-height-1"> <iconify-icon
                                icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
                    </div>
                    <div style="margin-top:20px;"></div>
                @endif

                @php
                $data = \App\Models\About::find(1);

                @endphp

                <div class="table-responsive">
                    <form name="form-update" method="POST" action="{{ route('abouts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="1">
                        <div class="col-12">
                            <label class="form-label">Image</label>
                            <input type="file" id="image" name="image" accept="*.jpg, *.png, *.jpeg, *.webp"
                                class="form-control">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Judul</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ $data->title }}">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">About Text</label>
                            <textarea id="about_text" name="about_text" class="form-control">{{ $data->about_text }}</textarea>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label">Header 1</label>
                                <input type="text" id="sub1" name="sub1" class="form-control" value="{{ $data->sub1 }}">
                            </div>
                            <div class="col-4">
                                <label class="form-label">Header 2</label>
                                <input type="text" id="sub2" name="sub2" class="form-control" value="{{ $data->sub2 }}">
                            </div>
                            <div class="col-4">
                                <label class="form-label">Header 3</label>
                                <input type="text" id="sub3" name="sub3" class="form-control" value="{{ $data->sub3 }}">
                            </div>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="row">
                            
                            <div class="col-4">
                                <label class="form-label">Content1</label>
                                <textarea id="content1" name="content1" class="form-control">{{ $data->content1 }}</textarea>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Content2</label>
                                <textarea id="content2" name="content2" class="form-control">{{ $data->content2 }}</textarea>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Content3</label>
                                <textarea id="content3" name="content3" class="form-control">{{ $data->content3 }}</textarea>
                            </div>
                        </div>
                        <div style="margin-top:45px;"></div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
