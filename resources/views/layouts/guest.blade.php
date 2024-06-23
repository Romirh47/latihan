<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRtrack</title>
    <link rel="shortcut icon" type="image/png" href="/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/assets/css/styles.min.css" />
    <style>
        .btn-primary {
            --bs-btn-color: #fff !important;
            --bs-btn-bg: #810947 !important;
            --bs-btn-border-color: #810947 !important;
            --bs-btn-hover-color: #fff !important;
            --bs-btn-hover-bg: #57022e !important;
            --bs-btn-hover-border-color: #57022e !important;
            --bs-btn-focus-shadow-rgb: 122, 116, 255 !important;
            --bs-btn-active-color: #fff !important;
            --bs-btn-active-bg: #57022e !important;
            --bs-btn-active-border-color: #57022e !important;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125) !important;
            --bs-btn-disabled-color: #fff !important;
            --bs-btn-disabled-bg: #810947 !important;
            --bs-btn-disabled-border-color: #810947 !important;
        }

        .sidebar-nav ul .sidebar-item.selected>.sidebar-link,
        .sidebar-nav ul .sidebar-item.selected>.sidebar-link.active,
        .sidebar-nav ul .sidebar-item>.sidebar-link.active {
            background-color: #810947;
            color: #fff;
            -webkit-box-shadow: 0px 17px 20px -8px rgba(77, 91, 236, 0.231372549);
            box-shadow: 0px 17px 20px -8px rgba(77, 91, 236, 0.231372549);
        }

        .modal-content,
        .swal2-modal {
            background-color: rgb(10, 37, 64);
            color: #fff;
        }

        .modal-content .modal-title,
        .modal-content .modal-body .form-label,
        .modal-content .modal-body .form-control,
        .swal2-modal .swal2-title,
        .swal2-modal .swal2-html-container {
            color: #fff;
        }

        .modal-content .modal-body .form-control::placeholder {
            color: #bbbbbb;
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="/assets/images/logos/logo.svg" alt="">
                                </a>
                                <p class="text-center">Management Pegawai</p>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
