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
                <li class="fw-medium">Daftar Peserta</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Peserta</h5>
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
                                <th scope="col">Nama Peserta </th>
                                <th scope="col">Username</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Email</th>
                                <th scope="col">Whatsapp</th>
                                <th scope="col">Jenjang</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Tgl Lahir</th>
                                <th scope="col">Agama</th>
                                <th scope="col">J.Kelamin</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Kota</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Sekolah</th>
                                
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
                                <input type="file" id="user_image" name="user_image" class="form-control" accept="*.jpg, *.jpeg, *.png">
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
                                    @foreach($level as $l) 
                                    <option value="{{ $l->id }}">{{ $l->level_name }}</option>
                                    @endforeach
                                   
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
                                     @foreach($province as $p)
                                     <option value="{{ $p->province_code }}">{{ $p->province_name }}</option>
                                     @endforeach
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
@endsection
