<!doctype html>

<html lang="en" class="light-style layout-wide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Errors</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('madamfasut/img/favicon.ico')}}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin-template/assets/vendor/fonts/boxicons.css') }}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin-template/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin-template/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin-template/assets/css/demo.css') }}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('admin-template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('admin-template/assets/vendor/css/pages/page-misc.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('admin-template/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('admin-template/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Content -->

    <!-- Error -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h1 class="mb-2 mx-2" style="line-height: 6rem; font-size: 6rem">404</h1>
            <h4 class="mb-2 mx-2">Page Not Found️ ⚠️</h4>
            <p class="mb-6 mx-2">This data is still empty, please contact admin</p>
            <a href="{{ route('page-home1') }}" class="btn btn-primary">Back to home</a>
            <div class="mt-6">
                <img src="{{ asset('admin-template/assets/img/illustrations/page-misc-error-light.png') }}"
                    alt="page-misc-error-light" width="500" class="img-fluid"
                    data-app-light-img="illustrations/page-misc-error-light.png"
                    data-app-dark-img="illustrations/page-misc-error-dark.png" />
            </div>
        </div>
    </div>
    <!-- /Error -->

    <!-- Core JS -->
    <script src="{{ asset('admin-template/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin-template/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin-template/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin-template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin-template/assets/vendor/js/menu.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('admin-template/assets/js/main.js') }}"></script>

</body>

</html>