@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">

                        Data Peserta
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Pendaftaran Kolektif</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Pendaftaran Kolektif - Pilih Kompetisi</h5>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-2">
                        <select id="selected_competition" class="form-control" style="width: 200px;">
                            <option value=""> pilih kompetisi </option>
                            @foreach($com as $c)
                            <option value="{{ $c->id }}">{{ $c->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button style="margin-top: 3px;" onclick="export_pendaftaran()" type="button" class="btn btn-insoft btn-success-600 radius-8 px-20 py-11">Export Pendaftaran</button>
                    </div>
                    
                </div>
               
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table style="width: 100%;" class="table bordered-table mb-0" id="table-list">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Action</th>
                                <th scope="col">Kompetisi</th>
                                <th scope="col">Akun Terdaftar</th>
                                <th scope="col">Bidang Studi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   
@endsection
