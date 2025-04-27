@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">

                        Data Produk
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Daftar Produk</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Produk</h5>
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
                                <th scope="col">Nama Produk </th>
                                <th scope="col">Kompetisi </th>
                                <th scope="col">Jenjang </th>
                                <th scope="col">Jenis Document</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Link</th>
                                <th scope="col">Bentuk</th>
                                <th scope="col">Target</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Berat(gr)</th>
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
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" id="product_name" name="product_name" class="form-control">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Jenis Dokumen</label>
                                <select id="document_type" name="document_type" class="form-control">
                                    <option value=""> - Tidak ada - </option>
                                    <option value="sertifikat">Sertifikat</option>
                                    <option value="piagam">Piagam</option>
                                    <option value="pembahasan">Pembahasan</option>
                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Harga</label>
                                <input type="number" id="product_price" name="product_price" class="form-control">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Foto Produk</label>
                                <input type="file" id="image" name="image" class="form-control"
                                    accept="*.jpg, *.jpeg, *.png">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Link Produk</label>
                                <input type="text" id="product_link" name="product_link" class="form-control">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Bentuk Produk</label>
                                <select id="is_fisik" name="is_fisik" class="form-control">
                                    <option value=""> - Pilih - </option>
                                    <option value="0">Digital</option>
                                    <option value="1">Fisik</option>
                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Target Produk</label>
                                <select id="product_for" name="product_for[]" multiple class="form-control">
                                    <option value="1">Peraih Medali Emas</option>
                                    <option value="2">Peraih Medali Perak</option>
                                    <option value="3">Peraih Medali Perunggu</option>
                                    <option value="0">Peserta Aktif</option>
                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>

                            <div class="col-12">
                                <label class="form-label">Jenis Produk</label>
                                <select id="is_combo" name="is_combo" class="form-control">
                                    <option value=""> - Pilih - </option>
                                    <option value="0">Single Produk</option>
                                    <option value="1">Bundle Produk</option>
                                </select>
                            </div>

                            <div class="composition-container" style="display: none;">
                                <div style="margin-top:5px;"></div>
                                <div class="col-12">
                                    <select id="composition" name="composition[]" multiple class="form-control">
                                        @foreach ($composition as $com)
                                            <option value="{{ $com->id }}">{{ $com->product_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Berat Produk (in Gram)</label>
                                <input type="text" id="berat" name="berat" class="form-control">

                            </div>

                            <div style="margin-top:5px;"></div>
                            <div class="col-12">
                                <label class="form-label">Competition</label>
                                <select id="competition_id" name="competition_id[]" multiple class="form-control">
                                        @foreach($competition as $c)
                                        <option value="{{ $c->id }}">{{ $c->title }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div style="margin-top:5px;"></div>
                            <div class="col-12">
                                <label class="form-label">Jenjang</label>
                                <select id="level_id" name="level_id[]" multiple class="form-control">
                                        @foreach($levels as $l)
                                        <option value="{{ $l->id }}">{{ $l->level_name }}</option>
                                        @endforeach
                                       
                                </select>
                            </div>

                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Status</label>
                                <select id="is_active" name="is_active" class="form-control">
                                    <option value=""> - Pilih - </option>
                                    <option value="1">Aktif</option>
                                    <option value="0">TIdak Aktif</option>
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




    <div class="modal fade" id="modal-document">
        <div class="modal-dialog modal-lg">

            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-document" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="hidden" id="document_id" name="document_id">
                                    <input type="hidden" id="send_method" name="send_method">
                                    <input type="hidden" id="product_id" name="product_id">
                                    
                                    <label class="form-label">Kompetisi</label>
                                    <select id="competition_id" name="competition_id" class="form-control" required>
                                        <option value=""> - Pilih Kompetisi - </option>
                                        @foreach($competition as $c)
                                            <option value="{{ $c->id }}">{{ $c->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">File Dokumen</label>
                                    <input type="file" id="document" name="document" class="form-control" accept="*.jpg, *.jpeg, *.png">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button id="btn-simpan-document" type="submit"
                                    class="btn btn-success-600 radius-8 px-20 py-11 btn-position">Simpan</button>
                            </div>
                        </div>
                        <div style="margin-top:20px;"></div>
                        <div class="row">
                            <div id="modal-document-content"></div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection
