@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">

                        Data Soal
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Daftar Soal</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Soal</h5>
                <button onclick="tambah()" type="button" class="btn btn-insoft btn-success-600 radius-8 px-20 py-11"> +
                    Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table style="width: 100%;" class="table bordered-table mb-0" id="table-list">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Action</th>
                                <th scope="col">Kompetisi</th>
                                <th scope="col">Bidang Studi</th>
                                <th scope="col">Jenjang</th>
                                <th scope="col">Jumlah Soal</th>
                                <th scope="col">Admin</th>
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
                                <label class="form-label">Kompetisi</label>
                                <select id="competition_id" name="competition_id" class="form-control">
                                    <option value=""> - Pilih - </option>
                                    @foreach($com as $c)
                                    <option value="{{ $c->id }}">{{ $c->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Jenjang</label>
                                <select id="level_id" name="level_id" class="form-control">
                                    <option value=""> - Pilih - </option>
                                   
                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Bidang Pelajaran</label>
                                <select id="study_id" name="study_id" class="form-control">
                                    <option value=""> - Pilih - </option>
                                   
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btn-simpan-data" type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="modal-copy">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="soal_id" name="soal_id">
                            
                            <div class="col-12">
                                <label class="form-label">Copy Soal Ke</label>
                                <select id="destination" name="destination" class="form-control" required>
                                    <option value=""> - Pilih - </option>
                                    
                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Nomor Soal</label>
                                <select id="nomor_soal" name="nomor_soal" class="form-control" required>
                                    <option value=""> - Pilih - </option>
                                    <option value="1">Lanjut sesuai urutan yang sudah ada</option>
                                    <option value="2">Sama seperti aslinya</option>
                                    
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btn-copy-data" type="button" class="btn btn-success">Copy Data Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
