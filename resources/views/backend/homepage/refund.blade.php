@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">

                        HomePage
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Kebijakan Refund</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Kebijakan Refund</h5>

            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success bg-success-600 text-white border-success-600 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between"
                        role="alert">
                        {{ session('success') }}
                        <button class="remove-button text-white text-xxl line-height-1"> <iconify-icon
                                icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
                    </div>
                    <div style="margin-top:20px;"></div>
                @endif
                
                <div class="table-responsive">
                    <form name="form-update" method="POST" action="{{ route('refund.update') }}">
                        @csrf
                        
                        <div class="col-12">
                            <label class="form-label">Kebijakan Refund</label>
                            <textarea id="refund" name="refund" class="form-control"><?= $data->refund ?></textarea>
                        </div>
                        <div style="margin-top:15px;"></div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
