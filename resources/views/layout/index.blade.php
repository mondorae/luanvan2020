<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <title>Quản lý nhân sự</title>
    
    <link rel="stylesheet" href="{{asset('admin_asset/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('admin_asset/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin_asset/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/assets/libs/css/style1.css')}}">
    <link rel="stylesheet" href="{a{asset('admin_asset/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"> --}}

    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css"> --}}

   


    
        
    
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper" style="padding-top: 80px !important">
        <!-- ============================================================== -->
       @include('layout.header')
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    
    @include('layout.footer')
</div>
    
</body>
<!-- jquery 3.3.1 -->
<script src="{{asset('admin_asset/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<!-- Datatables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- bootstap bundle js -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
<!-- loại trường hợp -->



<script src="{{asset('admin_asset/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- slimscroll js -->
<script src="{{asset('admin_asset/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
<!-- main js -->
<script src="{{asset('admin_asset/assets/libs/js/main-js.js')}}"></script>
<!-- chart chartist js -->
<script src="{{asset('admin_asset/assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
<!-- sparkline js -->
<script src="{{asset('admin_asset/assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
<!-- morris js -->
<script src="{{asset('admin_asset/assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
<script src="{{asset('admin_asset/assets/vendor/charts/morris-bundle/morris.js')}}"></script>
<!-- chart c3 js -->
<script src="{{asset('admin_asset/assets/vendor/charts/c3charts/c3.min.js')}}"></script>
<script src="{{asset('admin_asset/assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
<script src="{{asset('admin_asset/assets/vendor/charts/c3charts/C3chartjs.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/js/dashboard-ecommerce.js')}}"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@yield('script')
<!-- Optional JavaScript -->
<script src="{{asset('js/custom.js')}}"></</script>
</html>