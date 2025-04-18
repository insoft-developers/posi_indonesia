<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel (POSI)</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/frontend') }}/assets/images/pav.png">
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/remixicon.css">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/bootstrap.min.css">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/apexcharts.css">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('template/backend') }}/assets/css/lib/dataTables.min.css">
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
    <style>
        .error {
            color: red;
            margin-top: 5px;
            font-size: 14px;
        }
    </style>


</head>

<body>

    <section class="auth bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="{{ asset('template/backend') }}/umum/loginpage.png" alt="">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <a href="#" class="mb-40 max-w-290-px">
                        <img src="{{ asset('template/backend') }}/umum/logoadmin.png" alt="">
                    </a>
                    <h4 class="mb-12">Login</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-0 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between"
                            role="alert">
                            <div class="d-flex align-items-center gap-2">
                                <iconify-icon icon="mingcute:delete-2-line" class="icon text-xl"></iconify-icon>
                                <?= implode('', $errors->all('<div>:message</div>')) ?>
                            </div>
                            <button class="remove-button text-danger-600 text-xxl line-height-1"> <iconify-icon
                                    icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
                        </div>
                    @endif
                    <div style="margin-top:20px;"></div>
                </div>
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" name="email" class="form-control h-56-px bg-neutral-50 radius-12"
                            placeholder="Email">
                        @if ($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="password" class="form-control h-56-px bg-neutral-50 radius-12"
                                id="your-password" placeholder="Password">
                            @if ($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <span
                            class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                            data-toggle="#your-password"></span>
                    </div>
                    <div class="">
                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-check style-check d-flex align-items-center">
                                <input class="form-check-input border border-neutral-300" type="checkbox" value=""
                                    id="remeber">
                                <label class="form-check-label" for="remeber">Remember me </label>
                            </div>
                            <a href="javascript:void(0)" class="text-primary-600 fw-medium">Forgot Password?</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                        Sign In</button>


                </form>
            </div>
        </div>
    </section>

    <!-- jQuery library js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Apex Chart js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/apexcharts.min.js"></script>
    <!-- Data Table js -->
    <script src="{{ asset('template/backend') }}/assets/js/lib/dataTables.min.js"></script>
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

    <!-- main js -->
    <script src="{{ asset('template/backend') }}/assets/js/app.js"></script>

    <script>
        // ================== Password Show Hide Js Start ==========
        function initializePasswordToggle(toggleSelector) {
            $(toggleSelector).on('click', function() {
                $(this).toggleClass("ri-eye-off-line");
                var input = $($(this).attr("data-toggle"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        }
        // Call the function
        initializePasswordToggle('.toggle-password');
        // ========================= Password Show Hide Js End ===========================
    </script>
    <script>    
        $('.remove-button').on('click', function() {
            $(this).closest('.alert').addClass('d-none')
        }); 
    </script>

</body>

</html>
