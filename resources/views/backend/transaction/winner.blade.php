@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">

                        Pengumuman
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Daftar Juara</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Juara Kompetisi</h5>
                {{-- <button onclick="tambah()" type="button" class="btn btn-insoft btn-success-600 radius-8 px-20 py-11"> +
                    Tambah</button> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table style="width: 100%;" class="table bordered-table mb-0" id="table-list">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Action</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">HP</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Kota</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Jenjang</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Benar</th>
                                <th scope="col">Salah</th>
                                <th scope="col">Total Score</th>
                                <th scope="col">Juara</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Waktu Selesai</th>
                                
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
                            <label class="form-label">Nama Peserta</label>
                            <input type="text" id="name" class="form-control" readonly>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-4">
                            <label class="form-label">Jumlah Benar</label>
                            <input type="text" id="benar" name="jumlah_benar" class="form-control">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Jumlah Salah</label>
                            <input type="text" id="salah" name="jumlah_salah" class="form-control">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Total Score</label>
                            <input type="text" id="total_score" name="total_score" class="form-control">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Medali</label>
                            <select id="medali" name="medali" class="form-control">
                                <option value=""> - Pilih - </option>
                                <option value="emas">Emas</option>
                                <option value="perak">Perak</option>
                                <option value="perunggu">Perunggu</option>
                                <option value="peserta-aktif">Peserta Aktif</option>
                            </select>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Nilai</label>
                            <select id="nilai" name="nilai" class="form-control">
                                <option value=""> - Pilih - </option>
                                <option value="A+">A+</option>
                                <option value="A">A</option>
                                <option value="B+">B+</option>
                                <option value="B">B</option>
                               
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btn-submit-form" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
