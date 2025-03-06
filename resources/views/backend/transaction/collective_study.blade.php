@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ url('posiadmin/collective') }}" class="d-flex align-items-center gap-1 hover-text-primary">

                        Data Peserta
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Pendaftaran Kolektif</li>
                <li>-</li>
                <li class="fw-medium">{{ $com->title }}</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ $com->title }} - Pilih Bidang Studi</h5>
                {{-- <button onclick="tambah()" type="button" class="btn btn-insoft btn-success-600 radius-8 px-20 py-11"> +
                    Tambah</button> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <input type="hidden" name="segment-url" id="segment-url" value="{{ Request::segment(3) }}">
                    <table style="width: 100%;" class="table bordered-table mb-0" id="table-list">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Action</th>
                                <th scope="col">Bidang Studi</th>
                                <th scope="col">Jenjang</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-daftar">
        <div class="modal-dialog modal-lg">
            <form id="form-daftar" enctype="multipart/form-data">
            {{ csrf_field() }} {{ method_field('POST') }}
            <input type="hidden" id="study_id" name="study_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Upload File XLS</label>
                            <input type="file" id="file" name="file" class="form-control" required>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Tile Kompetisi</label>
                            <select id="bentuk_kompetisi" name="bentuk_kompetisi" class="form-control" required>
                                <option value=""> - Pilih - </option>
                                <option value="free"> Gratis </option>
                                <option value="premium"> Berbayar </option>
                            </select>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                           
                            <ul style="list-style: auto;padding:20px;">
                                <li>Download Template File Excel Untuk Upload <a href="{{ url('posiadmin/download_template_pendaftaran') }}"><span style="color: blue;text-decoration:underline;">Disini..</span></a></li>
                                <li>Silahkan isi kolom pada template yang telah disediakan.</li>
                                <li>Filter unik berdasarkan email, apabila email pada kolom belum ada pada database maka akan dibuatkan berdasarkan akun email tersebut dengan password "posijuara", Namun apabila sudah ada maka tetap menggunakan akun email yang sudah ada.</li>
                                <li>apabila terdapat dalama 1 baris bahwa kolom nama atau kolom email kosong maka akan dilewatkan tidak tidak diproses.</li>
                           </ul>
                           
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btn-submit-pendaftaran" type="submit" class="btn btn-primary">Upload Pendaftaran</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
