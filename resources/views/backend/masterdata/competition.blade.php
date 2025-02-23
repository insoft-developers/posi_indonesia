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

    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <form id="form-tambah" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <input type="hidden" id="id" name="id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kompetisi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Gambar Kompetisi</label>
                                <input type="file" id="image" name="image" class="form-control"
                                    accept="*.jpg, *.jpeg, *.png">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Nama Kompetisi</label>
                                <input type="text" id="title" name="title" class="form-control">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Premium Registration Bonus Product</label>
                                <br>
                                <select id="premium_bonus_product" name="premium_bonus_product[]" multiple="multiple" class="form-control cust-control">
                                    @foreach($product as $p)
                                    <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Free Registration Bonus Product</label>
                                <br>
                                <select id="free_bonus_product" name="free_bonus_product[]" multiple="multiple" class="form-control cust-control">
                                    @foreach($product as $p)
                                    <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                    @endforeach
                                </select>
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
                                <select id="finish_registration_time" name="finish_registration_time"
                                    class="form-control">
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
                                <br>
                                <select id="level" name="level[]" multiple="multiple" class="form-control cust-control">
                                   
                                    @foreach ($level as $l)
                                        <option value="{{ $l->id }}_{{ $l->jenjang }}">{{ $l->level_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Provinsi</label>
                                <select id="province_code" name="province_code" class="form-control">
                                    <option value="">- Semua Provinsi -</option>
                                    @foreach ($province as $p)
                                        <option value="{{ $p->province_code }}">{{ $p->province_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Kabupaten/Kota</label>
                                <select id="city_code" name="city_code" class="form-control">
                                    <option value="">Pilih Provinsi Dulu</option>
                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Kecamatan</label>
                                <select id="district_code" name="district_code" class="form-control">
                                    <option value="">Pilih Kota Dulu</option>
                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Nama Sekolah</label>
                                <select id="sekolah" name="sekolah" class="form-control">
                                    <option value="">Pilih Kecamatan Dulu</option>
                                </select>
                            </div>
                            <div id="container-sekolah-lain" style="display: none;">
                                <div style="margin-top:15px;"></div>
                                <div class="col-12">
                                    <label class="form-label">Nama Sekolah</label>
                                    <input type="text" id="sekolah-lain" name="sekolah_lain" class="form-control"
                                        placeholder="Masukkan nama sekolah">

                                </div>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Agama</label>
                                <select id="agama" name="agama" class="form-control">
                                    <option value="">- Semua Agama -</option>
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
                                <label class="form-label">Link Juknis</label>
                                <input type="text" id="link_juknis" name="link_juknis" class="form-control">
                            </div>

                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Link Zoom</label>
                                <input type="text" id="link_zoom" name="link_zoom" class="form-control">
                            </div>

                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Link Twibbon</label>
                                <input type="text" id="link_twibbon" name="link_twibbon" class="form-control">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Link Whatsapp</label>
                                <input type="text" id="link_wa" name="link_wa" class="form-control">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Link Telegram</label>
                                <input type="text" id="link_telegram" name="link_telegram" class="form-control">
                            </div>

                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Status Kompetisi</label>
                                <select id="is_active" name="is_active" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
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


    <div class="modal fade" id="modal-study">
        <div class="modal-dialog modal-xl">


            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form id="form-tambahan" method="POST">
                                        @csrf
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="hidden" id="competition_id" name="competition_id">
                                            <input type="hidden" id="method-type" name="method-type">
                                            <input type="hidden" id="study-id" name="study-id">
                                            <div class="form-group">
                                                <label class="form-label">Nama Pelajaran</label>
                                                <select id="s-pelajaran" name="s-pelajaran" class="form-control" required>
                                                    <option value=""> - Pilih pelajaran - </option>
                                                    @foreach ($pelajaran as $p)
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            
                                            <div class="form-group">
                                                <label class="form-label">Jenjang</label>
                                                <select id="s-jenjang" name="s-jenjang" class="form-control" required>
                                                    <option value=""> - Pilih jenjang - </option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="form-label">Start Time</label>
                                                <input type="time" id="s-start-time" name="s-start-time" 
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="form-label">Finish Time</label>
                                                <input type="time" id="s-finish-time" name="s-finish-time"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="form-label">Forum Link</label>
                                                <input type="text" id="s-forum-link" name="s-forum-link"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit"
                                                class="btn btn-success-600 radius-8 px-20 py-11 btn-position">Simpan</button>
                                        </div>

                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div id="modal-study-content"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-primary">Simpan</button> --}}
                </div>
            </div>

        </div>
    </div>
@endsection
