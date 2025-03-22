@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ url('/posiadmin/hasil') }}" class="d-flex align-items-center gap-1 hover-text-primary">

                        Data Ujian
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Daftar Hasil Ujian - {{ $competition->title }} - {{ $study == null ? null : $study->pelajaran->name }} - {{ $study == null ? null : $study->level->level_name }}</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Hasil Ujian - {{ $competition->title }} - {{ $study == null ? null : $study->pelajaran->name }} - {{ $study == null ? null : $study->level->level_name }}</h5>
                <button id="btn-bulk-delete" disabled="disabled" onclick="bulk_delete()" type="button"
                        class="btn btn-insoft btn-danger-800 radius-8 px-20 py-11">
                        <i class="fa fa-trash"></i> Bulk Delete</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table style="width: 100%;" class="table bordered-table mb-0" id="table-list">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="form-check"><input id="check-all"
                                            class="form-check-input" type="checkbox">
                                    </div>
                                </th>
                                <th scope="col">Action</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Kompetisi</th>
                                <th scope="col">Bidang Studi</th>
                                <th scope="col">Peserta</th>
                                <th scope="col">Email</th>
                                <th scope="col">HP</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col">Jenjang</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Kota</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Status</th>
                                <th scope="col">Benar</th>
                                <th scope="col">Salah</th>
                                <th scope="col">Lewat</th>
                                <th scope="col">Score</th>
                                <th scope="col">Prestasi</th>
                                <th scope="col">Nilai</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <form id="form-tambah" enctype="multipart/form-data">
            {{ csrf_field() }} {{ method_field('POST') }}
            <input type="hidden" id="id" name="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Nama Level</label>
                            <input type="text" id="level_name" name="level_name" class="form-control">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Jenjang</label>
                            <select id="jenjang" name="jenjang" class="form-control">
                                <option value=""> - Pilih - </option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="MHS">MHS</option>
                                <option value="GURU">GURU</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
