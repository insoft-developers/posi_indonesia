@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">

                        Data Transaksi
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Daftar Transaksi</li>
            </ul>
        </div>
        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Transaksi</h5>
                <input type="hidden" id="data-jenis" value="1">
                @if (session('level') == 1)
                    <button id="btn-bulk-approve" disabled="disabled" onclick="bulk_approve()" type="button"
                        class="btn btn-insoft btn-info-800 radius-8 px-20 py-11">
                        <i class="fa fa-check"></i> Bulk Approve</button>
                @endif
                <button id="btn-bulk-export" disabled="disabled" type="button"
                        class="btn btn-insoft btn-success-800 radius-8 px-20 py-11">
                        <i class="fa fa-excel-o"></i> Export Pesanan</button>

                <div class="col-12">

                    <select id="filter" name="filter" class="form-control">
                        <option value="">Semua Data</option>
                        <option value="today">Hari ini</option>
                        <option value="thismonth">Bulan Ini</option>
                        <option value="yesterday">Kemarin</option>
                        <option value="lastmonth">Bulan Lalu</option>
                        <option value="thisyear">Tahun Ini</option>
                        <option value="lastyear">Tahun Lalu</option>

                    </select>
                </div>
                <div class="col-12">

                    <select id="filter2" name="filter2" class="form-control">
                        <option value="">Semua Invoice</option>
                        <option value="premium">Berbayar</option>
                        <option value="free">Gratis</option>
                    </select>
                </div>


            </div>
            <div class="card-body">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Belum Approve</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Sudah Approve</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Semua Transaksi</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="table-responsive">

                            <table style="width: 100%;" class="table bordered-table mb-0"
                                id="table-transaction-not-approve">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check"><input id="check-all-not-approve"
                                                    class="form-check-input" type="checkbox">
                                            </div>
                                        </th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama Peserta</th>
                                        <th scope="col">Email Peserta</th>
                                        <th scope="col">Hp Peserta</th>
                                        <th scope="col">Jenjang Peserta</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Ongkos Kirim</th>
                                        <th scope="col">Total Invoice</th>
                                        <th scope="col">Status Pembayaran</th>
                                        <th scope="col">Status Transaksi</th>
                                        <th scope="col">Nama Pemesan</th>
                                        <th scope="col">Email Pemesan</th>
                                        <th scope="col">Hp Pemesan</th>
                                        <th scope="col">Jenjang Pemesan</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="table-responsive">

                            <table style="width: 100%;" class="table bordered-table mb-0" id="table-transaction-approve">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check"><input id="check-all-approve"
                                                    class="form-check-input" type="checkbox">
                                            </div>
                                        </th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama Peserta</th>
                                        <th scope="col">Email Peserta</th>
                                        <th scope="col">Hp Peserta</th>
                                        <th scope="col">Jenjang Peserta</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Ongkos Kirim</th>
                                        <th scope="col">Total Invoice</th>
                                        <th scope="col">Status Pembayaran</th>
                                        <th scope="col">Status Transaksi</th>
                                        <th scope="col">Nama Pemesan</th>
                                        <th scope="col">Email Pemesan</th>
                                        <th scope="col">Hp Pemesan</th>
                                        <th scope="col">Jenjang Pemesan</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="table-responsive">

                            <table style="width: 100%;" class="table bordered-table mb-0" id="table-list">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check"><input id="check-all" class="form-check-input"
                                                    type="checkbox">
                                            </div>
                                        </th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama Peserta</th>
                                        <th scope="col">Email Peserta</th>
                                        <th scope="col">Hp Peserta</th>
                                        <th scope="col">Jenjang Peserta</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Ongkos Kirim</th>
                                        <th scope="col">Total Invoice</th>
                                        <th scope="col">Status Pembayaran</th>
                                        <th scope="col">Status Transaksi</th>
                                        <th scope="col">Nama Pemesan</th>
                                        <th scope="col">Email Pemesan</th>
                                        <th scope="col">Hp Pemesan</th>
                                        <th scope="col">Jenjang Pemesan</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
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
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Foto</label>
                                <input type="file" id="user_image" name="user_image" class="form-control"
                                    accept="*.jpg, *.jpeg, *.png">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Whatsapp</label>
                                <input type="text" id="whatsapp" name="whatsapp" class="form-control">
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
                                <label class="form-label">Kelas</label>
                                <select id="kelas_id" name="kelas_id" class="form-control">
                                    <option value=""> - Pilih - </option>

                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Agama</label>
                                <select id="agama" name="agama" class="form-control">
                                    <option value=""> - Pilih - </option>
                                    <option value="Islam">Islam</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                    <option value="Lainnya">Lainnya</option>

                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                    <option value=""> - Pilih - </option>
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>

                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Provinsi</label>
                                <select id="provinsi" name="provinsi" class="form-control">
                                    <option value=""> - Pilih - </option>

                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Kabupaten/Kota</label>
                                <select id="kabupaten" name="kabupaten" class="form-control">
                                    <option value=""> - Pilih - </option>

                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Kecamatan</label>
                                <select id="kecamatan" name="kecamatan" class="form-control">
                                    <option value=""> - Pilih - </option>

                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Nama Sekolah</label>
                                <select id="nama_sekolah" name="nama_sekolah" class="form-control">
                                    <option value=""> - Pilih - </option>

                                </select>
                            </div>
                            <div class="lainnya-container" style="display: none;">
                                <div style="margin-top:15px;"></div>
                                <div class="col-12">
                                    <label class="form-label">Nama Sekolah</label>
                                    <input type="text" id="sekolah_lain" name="sekolah_lain" class="form-control">
                                </div>
                            </div>

                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Email Status</label>
                                <select id="email_status" name="email_status" class="form-control">
                                    <option value=""> - Pilih - </option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
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



    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-xl">
            <input type="hidden" id="invoice_id" name="invoice_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modal-detail-content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button id="btn-save-data" type="button" class="btn btn-success">APPROVED</button>

                    <button id="btn-reject-data" type="button" class="btn btn-danger">RESET</button>

                </div>
            </div>

        </div>
    </div>
@endsection
