<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Breeze Admin</title>
    <link rel="stylesheet" href="{{ asset('manage/vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('manage/vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('manage/vendors/css/vendor.bundle.base.css') }}" />
    <link rel="stylesheet" href="{{ asset('manage/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('manage/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
    @yield('css')
    <link rel="stylesheet" href="{{ asset('manage/css/style.css') }}" />
    @toastr_css  
    <link rel="shortcut icon" href="{{ asset('manage/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        @include('manage.includes.sidebar')
        <div class="container-fluid page-body-wrapper">
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close mdi mdi-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles light"></div>
                    <div class="tiles dark"></div>
                </div>
            </div>
            @include('manage.includes.header')
            <div class="main-panel">
                <div class="content-wrapper pb-0">
                    @yield('content')
                </div>
                @include('manage.includes.footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('manage/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('manage/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('manage/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('manage/vendors/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('manage/vendors/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('manage/vendors/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('manage/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('manage/vendors/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('manage/vendors/flot/jquery.flot.pie.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('manage/js/off-canvas.js') }}"></script>
    <script src="{{ asset('manage/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('manage/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('manage/js/dashboard.js') }}"></script>

    {{-- toastr --}}
    @yield('toast')
    @yield('js')
    @toastr_js
    @toastr_render
    <!-- End custom js for this page -->
    @yield('file-upload')
</body>

</html>
