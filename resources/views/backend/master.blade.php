<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSI Indonesia - Admin Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/frontend') }}/assets/images/pav.png">
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/remixicon.css">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/bootstrap.min.css">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/apexcharts.css">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.dataTables.css">
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/editor-katex.min.css">
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/editor.atom-one-dark.min.css">
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/editor.quill.snow.css">
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/flatpickr.min.css">
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/full-calendar.css">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/jquery-jvectormap-2.0.5.css">
    <!-- Popup css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/magnific-popup.css">
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/slick.css">
    <!-- prism css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/prism.css">
    <!-- file upload css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/file-upload.css">

    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/audioplayer.css">

    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @include('backend.css');
</head>

<body>


    @include('backend.sidebar')
    <main class="dashboard-main">
        <div class="navbar-header">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-4">
                        <button type="button" class="sidebar-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                            <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                        </button>
                        <button type="button" class="sidebar-mobile-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                        </button>
                        <form class="navbar-search">
                            <input type="text" name="search" placeholder="Search">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                        </form>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-3">



                        <div class="dropdown">
                            <button
                                class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                                type="button" data-bs-toggle="dropdown">
                                <iconify-icon icon="iconoir:bell" class="text-primary-light text-xl"></iconify-icon>
                            </button>
                            <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                                <div
                                    class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="text-lg text-primary-light fw-semibold mb-0">Notifications</h6>
                                    </div>
                                    <span
                                        class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
                                </div>

                                <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
                                    <a href="javascript:void(0)"
                                        class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                        <div
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                <iconify-icon icon="bitcoin-icons:verify-outline"
                                                    class="icon text-xxl"></iconify-icon>
                                            </span>
                                            <div>
                                                <h6 class="text-md fw-semibold mb-4">Congratulations</h6>
                                                <p class="mb-0 text-sm text-secondary-light text-w-200-px">Your profile
                                                    has been Verified. Your profile has been Verified</p>
                                            </div>
                                        </div>
                                        <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                    </a>

                                    <a href="javascript:void(0)"
                                        class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                        <div
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                <img src="{{ asset('template/backend') }}/assets/images/notification/profile-1.png"
                                                    alt="">
                                            </span>
                                            <div>
                                                <h6 class="text-md fw-semibold mb-4">Ronald Richards</h6>
                                                <p class="mb-0 text-sm text-secondary-light text-w-200-px">You can
                                                    stitch between artboards</p>
                                            </div>
                                        </div>
                                        <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                    </a>


                                </div>

                                <div class="text-center py-12 px-16">
                                    <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All
                                        Notification</a>
                                </div>

                            </div>
                        </div><!-- Notification dropdown end -->
                        @php
                            $admin = \App\Models\Admin::findorFail(session('id'));
                        @endphp
                        <div class="dropdown">
                            <button class="d-flex justify-content-center align-items-center rounded-circle"
                                type="button" data-bs-toggle="dropdown">
                                <img src="{{ asset('template/backend/umum') }}/avatar.png" alt="image"
                                    class="w-40-px h-40-px object-fit-cover rounded-circle">
                            </button>
                            <div class="dropdown-menu to-top dropdown-menu-sm">
                                <div
                                    class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="text-lg text-primary-light fw-semibold mb-2">{{ session('name') }}
                                        </h6>
                                        <span class="text-secondary-light fw-medium text-sm">Admin</span>
                                    </div>
                                    <button type="button" class="hover-text-danger">
                                        <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                                    </button>
                                </div>
                                <ul class="to-top-list">
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                            href="view-profile.html">
                                            <iconify-icon icon="solar:user-linear"
                                                class="icon text-xl"></iconify-icon> My Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                            href="company.html">
                                            <iconify-icon icon="icon-park-outline:setting-two"
                                                class="icon text-xl"></iconify-icon> Setting</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('admin.logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3">
                                                <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>
                                                Log
                                                Out</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- Profile dropdown end -->
                    </div>
                </div>
            </div>
        </div>


        @yield('content')


        <footer class="d-footer">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <p class="mb-0">© <?= date('Y');?> POSI. All Rights Reserved.</p>
                </div>
                <div class="col-auto">
                    <p class="mb-0">Made by <span class="text-primary-600">POSI Team</span></p>
                </div>
            </div>
        </footer>
    </main>

    <!-- jQuery library js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Apex Chart js -->
    @if ($view == 'dashboard')
        <script src="{{ asset('template/backend') }}/assets/js/lib/apexcharts.min.js"></script>
    @endif
    <!-- Data Table js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js"></script>
    <!-- Iconify Font js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/iconify-icon.min.js"></script>
    <!-- jQuery UI js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/jquery-ui.min.js"></script>
    <!-- Vector Map js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/jquery-jvectormap-2.0.5.min.js"></script>
    <script src="{{ asset('template/backend') }}/assets/js/lib/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Popup js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/magnifc-popup.min.js"></script>
    <!-- Slick Slider js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/slick.min.js"></script>
    <!-- prism js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/prism.js"></script>
    <!-- file upload js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/file-upload.js"></script>
    <!-- audioplayer -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/audioplayer.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- main js -->
    <script src="{{ asset('template/backend') }}/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    @if ($view == 'dashboard')
        <script src="{{ asset('template/backend') }}/assets/js/homeOneChart.js"></script>
    @endif
    @include('backend.js')

</body>

</html>
