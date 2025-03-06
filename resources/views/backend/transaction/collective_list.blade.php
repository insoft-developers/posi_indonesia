

@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">

                        Data Pendaftaran
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Data Pendaftaran</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Pendaftaran</h5>
                {{-- <button onclick="tambah()" type="button" class="btn btn-insoft btn-success-600 radius-8 px-20 py-11"> +
                    Tambah</button> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table style="width: 100%;" class="table bordered-table mb-0" id="table-list">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                {{-- <th scope="col">Action</th> --}}
                                <th scope="col">Tanggal</th>
                                <th scope="col">User</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Kompetisi</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Pemesan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   
@endsection
