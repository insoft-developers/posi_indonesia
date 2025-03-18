@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">

                        Data Admin
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Admin</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Admin</h5>
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
                                <th scope="col">Image</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Level</th>
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
                            <label class="form-label">Foto</label>
                            <input type="file" id="image" name="image" class="form-control" accept="*.jpg, *.png, *jpeg">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Nama</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div style="margin-top:15px;"></div>
                        <div class="col-12">
                            <label class="form-label">Password</label>
                            <input type="passsword" id="password" name="password" class="form-control">
                        </div>
                        <div style="margin-top:15px;"></div>
                        
                        <div class="col-12">
                            <label class="form-label">Level</label>
                            <select id="level" name="level" class="form-control">
                                <option value=""> - Pilih - </option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                                <option value="3">Tutor</option>
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
