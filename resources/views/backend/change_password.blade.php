@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Change Password</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ url('posiadmin') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Change Password</li>
            </ul>
        </div>

        <div class="row gy-4">

            <div class="col-lg-8">
                <div class="card h-100">
                    @if (Session::has('success'))
                        <div class="alert alert-success bg-success-600 text-white border-success-600 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between"
                            role="alert">
                            {{ session('success') }}
                            <button class="remove-button text-white text-xxl line-height-1"> <iconify-icon
                                    icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
                        </div>
                        <div style="margin-top:20px;"></div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger bg-danger-600 text-white border-danger-600 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between"
                            role="alert">
                            {{ session('error') }}
                            <button class="remove-button text-white text-xxl line-height-1"> <iconify-icon
                                    icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
                        </div>
                        <div style="margin-top:20px;"></div>
                    @endif
                    <div class="card-body p-24">
                        <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center px-24 active" id="pills-edit-profile-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-edit-profile" type="button" role="tab"
                                    aria-controls="pills-edit-profile" aria-selected="true">
                                    Change Password
                                </button>
                            </li>


                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel"
                                aria-labelledby="pills-edit-profile-tab" tabindex="0">

                                <!-- Upload Image Start -->

                                <!-- Upload Image End -->
                                <form action="{{ route('admin.change.password') }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="name"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Old Password <span class="text-danger-600">*</span></label>
                                                <input type="password"
                                                    class="form-control radius-8" id="old_password" name="old_password"
                                                    placeholder="Enter Your Old Password" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="name"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">New Password <span class="text-danger-600">*</span></label>
                                                <input type="password"
                                                    class="form-control radius-8" id="password" name="password"
                                                    placeholder="Enter Your New Password" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="name"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Confirm New Password <span class="text-danger-600">*</span></label>
                                                <input type="password"
                                                    class="form-control radius-8" id="password_confirmation" name="password_confirmation"
                                                    placeholder="Confirm Your New Password" required>
                                            </div>
                                        </div>
                                    </div>
                                   

                                    
                                    <div class="d-flex align-items-center gap-3">

                                        <button type="submit"
                                            class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
