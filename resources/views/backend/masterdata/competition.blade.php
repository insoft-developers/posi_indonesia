@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">

                        Master Data
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Daftar Kompetisi</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Kompetisi</h5>
                <button onclick="tambah()" type="button" class="btn btn-insoft btn-success-600 radius-8 px-20 py-11"> +
                    Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table bordered-table mb-0" id="table-list" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Action</th>

                                <th scope="col">Gambar</th>
                                <th scope="col">Kompetisi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Pendaftaran</th>
                                <th scope="col">Type</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Level</th>
                                <th scope="col">Target</th>
                                <th scope="col">Status</th>

                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-kompetisi">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kompetisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Nama Kompetisi</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Tanggal Kompetisi</label>
                            <input type="date" id="date" name="date" class="form-control">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-6">
                            <label class="form-label">Tanggal Buka Pendaftaran</label>
                            <input type="date" id="start_registration_date" name="start_registration_date"
                                class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Jam Buka Pendaftaran</label>
                            <select id="start_registration_time" name="start_registration_time" class="form-control">
                                <option value="">Pilih</option>
                                <option value="01:00:00">01:00:00</option>
                                <option value="02:00:00">02:00:00</option>
                                <option value="03:00:00">03:00:00</option>
                                <option value="04:00:00">04:00:00</option>
                                <option value="05:00:00">05:00:00</option>
                                <option value="06:00:00">06:00:00</option>
                                <option value="07:00:00">07:00:00</option>
                                <option value="08:00:00">08:00:00</option>
                                <option value="09:00:00">09:00:00</option>
                                <option value="10:00:00">10:00:00</option>
                                <option value="11:00:00">11:00:00</option>
                                <option value="12:00:00">12:00:00</option>
                                <option value="13:00:00">13:00:00</option>
                                <option value="14:00:00">14:00:00</option>
                                <option value="15:00:00">15:00:00</option>
                                <option value="16:00:00">16:00:00</option>
                                <option value="17:00:00">17:00:00</option>
                                <option value="18:00:00">18:00:00</option>
                                <option value="19:00:00">19:00:00</option>
                                <option value="20:00:00">20:00:00</option>
                                <option value="21:00:00">21:00:00</option>
                                <option value="22:00:00">22:00:00</option>
                                <option value="23:00:00">23:00:00</option>
                                <option value="23:59:59">23:59:59</option>
                            </select>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-6">
                            <label class="form-label">Tanggal Tutup Pendaftaran</label>
                            <input type="date" id="finish_registration_date" name="finish_registration_date"
                                class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Jam Tutup Pendaftaran</label>
                            <select id="finish_registration_time" name="finish_registration_time" class="form-control">
                                <option value="">Pilih</option>
                                <option value="01:00:00">01:00:00</option>
                                <option value="02:00:00">02:00:00</option>
                                <option value="03:00:00">03:00:00</option>
                                <option value="04:00:00">04:00:00</option>
                                <option value="05:00:00">05:00:00</option>
                                <option value="06:00:00">06:00:00</option>
                                <option value="07:00:00">07:00:00</option>
                                <option value="08:00:00">08:00:00</option>
                                <option value="09:00:00">09:00:00</option>
                                <option value="10:00:00">10:00:00</option>
                                <option value="11:00:00">11:00:00</option>
                                <option value="12:00:00">12:00:00</option>
                                <option value="13:00:00">13:00:00</option>
                                <option value="14:00:00">14:00:00</option>
                                <option value="15:00:00">15:00:00</option>
                                <option value="16:00:00">16:00:00</option>
                                <option value="17:00:00">17:00:00</option>
                                <option value="18:00:00">18:00:00</option>
                                <option value="19:00:00">19:00:00</option>
                                <option value="20:00:00">20:00:00</option>
                                <option value="21:00:00">21:00:00</option>
                                <option value="22:00:00">22:00:00</option>
                                <option value="23:00:00">23:00:00</option>
                                <option value="23:59:59">23:59:59</option>
                            </select>
                        </div>
                        <div style="margin-top:15px;"></div>
                        
                        <div class="col-12">
                            <label class="form-label">Jenis Kompetisi</label>
                            <select id="type" name="type" class="form-control">
                                <option value="">Pilih</option>
                                <option value="1">Berbayar dan Gratis</option>
                                <option value="2">Berbayar</option>
                                <option value="3">Gratis</option>
                            </select>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Harga Per Bidang Studi</label>
                            <input type="number" id="price" name="price" class="form-control">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Level Kompetisi</label>
                            <select id="type" name="type" class="form-control">
                                <option value="">Pilih</option>
                                <option value="1">Level</option>
                               
                            </select>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Status Kompetisi</label>
                            <select id="type" name="type" class="form-control">
                                <option value="">Pilih</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
