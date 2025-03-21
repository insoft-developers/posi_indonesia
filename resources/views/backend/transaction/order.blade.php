@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">

                        Transaction
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Pemesanan</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Pemesanan</h5>
                {{-- <button onclick="tambah()" type="button" class="btn btn-insoft btn-success-600 radius-8 px-20 py-11"> +
                    Tambah</button> --}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <label class="form-label">Tanggal Dari:</label>
                        <input style="width: 105%;" type="date" id="date_from" name="date_from" class="form-control">
                    </div>
                    <div class="col-3">
                        <label class="form-label">Tanggal Sampai:</label>
                        <input type="date" id="date_to" name="date_to" class="form-control">
                    </div>
                    <div class="col-3">
                        <label class="form-label">Status Pembayaran</label>
                        <select id="payment_status" name="payment_status" class="form-control">
                            <option value=""> - Pilih Semua - </option>
                            <option value="1">PAID</option>
                            <option value="2">NOT PAID</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <button id="btn-filter-data" style="margin-top:32px;" type="button" class="btn btn-info-600 radius-8 px-16 py-9">Filter</button>
                        <button id="btn-reset-data" style="margin-top:32px;" type="button" class="btn btn-success-600 radius-8 px-16 py-9">Reset</button>
                    </div>
                </div>
                <div style="margin-top:20px;"></div>
                <div class="table-responsive">

                    <table style="width: 100%;" class="table bordered-table mb-0" id="table-list">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Action</th>
                                <th scope="col">Status</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Payment Date</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Jenjang</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col">Kompetisi</th>
                                <th scope="col">Bidang</th>
                                <th scope="col">Medali</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Komposisi</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Pemesan</th>
                                <th scope="col">Email Pemesan</th>
                                <th scope="col">Hp Pemesan</th>
                                <th scope="col">Ongkos Kirim</th>
                                <th scope="col">Provinsi Tujuan</th>
                                <th scope="col">Kota Tujuan</th>
                                <th scope="col">Kecamatan Tujuan</th>
                                <th scope="col">Kurir</th>
                                <th scope="col">Service</th>
                                <th scope="col">Alamat Lengkap Tujuan</th>
                                <th scope="col">Nama Penerima</th>
                                <th scope="col">Hp Penerima</th>
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
