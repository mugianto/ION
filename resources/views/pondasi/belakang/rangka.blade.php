<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    
    <title>
      @yield('judulLaman', '')
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('storage/assets/vendors/core/core.css')}}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    @yield('dataTableCss')
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('storage/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('storage/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->

    <!-- Link Cabutan CDN -->
    @yield('linkCabutan')
    <!-- End Link Cabutan CDN -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('storage/assets/css/demo1/style.css')}}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{asset('storage/assets/images/favicon.png')}}" />
</head>

<body>
    <div class="main-wrapper">

        @include('pondasi.belakang.sidebarKiri')
        @include('pondasi.belakang.sidebarKanan')

        <div class="page-wrapper">

            @include('pondasi.belakang.navbar')    

            <div class="page-content">
              @yield('isinya')
            </div>
            
            @include('pondasi.belakang.footer')
        </div>

    <!-- core:js -->
    <script src="{{asset('storage/assets/vendors/core/core.js')}}"></script>
    <!-- endinject -->  

    <!-- Plugin js for this page -->
    @yield('pluginKhusus')
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{asset('storage/assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('storage/assets/js/template.js')}}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    @yield('customEdit')
    <!-- End custom js for this page -->
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
    </script>  
  </body>
</html>