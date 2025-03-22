@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Profile</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ url('posiadmin') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Profile</li>
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
                    <div class="card-body p-24">
                        <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center px-24 active" id="pills-edit-profile-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-edit-profile" type="button" role="tab"
                                    aria-controls="pills-edit-profile" aria-selected="true">
                                    Edit Profile
                                </button>
                            </li>


                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel"
                                aria-labelledby="pills-edit-profile-tab" tabindex="0">

                                <!-- Upload Image Start -->

                                <!-- Upload Image End -->
                                <form action="{{ route('admin.profile.update') }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="name"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Profile
                                                    Image <span class="text-danger-600">*</span></label>
                                                <input type="file" class="form-control radius-8" id="image"
                                                    name="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="name"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Full
                                                    Name <span class="text-danger-600">*</span></label>
                                                <input value="{{ $admin->name }}" type="text"
                                                    class="form-control radius-8" id="name" name="name"
                                                    placeholder="Enter Full Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="email"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Email
                                                    <span class="text-danger-600">*</span></label>
                                                <input value="{{ $admin->email }}" type="email"
                                                    class="form-control radius-8" id="email"
                                                    placeholder="Enter email address" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        @php
                                            if ($admin->level == 1) {
                                                $level = 'Super Admin';
                                            } elseif ($admin->level == 2) {
                                                $level = 'Admin';
                                            } else {
                                                $level = 'Tutor';
                                            }
                                        @endphp
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label for="number"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Level</label>
                                                <input value="{{ $level }}" type="text"
                                                    class="form-control radius-8" id="number"
                                                    placeholder="Enter phone number" readonly>
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
