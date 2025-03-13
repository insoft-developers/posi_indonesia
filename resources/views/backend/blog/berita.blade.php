@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">

                        Blog
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Berita</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Berita</h5>
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
                                <th scope="col">Judul</th>
                                <th scope="col">Category</th>
                                <th scope="col">Image</th>
                                <th scope="col">Content</th>
                                <th scope="col">PostedBy</th>
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
        <div class="modal-dialog modal-lg">
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
                            <label class="form-label">Judul Berita</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Category</label>
                            <select id="category" name="category" class="form-control">
                                <option value=""> - Pilih - </option>
                                @foreach($cat as $c)
                                <option value="{{ $c->slug }}">{{ $c->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Gambar</label>
                            <input type="file" id="image" name="image" class="form-control" accept="*.jpg, *.jpeg, *.png, *.webp">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Content Berita</label>
                            <textarea id="content" name="content" class="form-control"></textarea>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Status</label>
                            <select id="is_status" name="is_status" class="form-control">
                                <option value=""> - Pilih - </option>
                                <option value="1">Published</option>
                                <option value="0">Not Published</option>
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
