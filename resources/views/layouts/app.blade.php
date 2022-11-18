<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tools</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('public/css/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('public/css/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('public/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
 <!--  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="{{asset('public/css/ti-icons/css/themify-icons.css')}}">
 <!--  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css"> -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('public/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('public/images/admin/favicon.png')}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container-scroller">
    @include('include.admin_header')
     <div class="container-fluid page-body-wrapper">     
      @include('include.admin_sidebar')
      <div class="main-panel">
         @include('include.flash')
         @yield('content')
        <!-- @include('include.admin_footer') -->
      </div>


</div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('public/js/admin/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
<!--   <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script> -->

  <!-- End plugin js for this page -->
  <!-- inject:js -->
<!--   <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script> -->
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- <script src="{{asset('public/js/admin/dashboard.js')}}"></script> -->
 <!--  <script src="js/Chart.roundedBarCharts.js"></script> -->
  <script src="{{asset('public/js/ckeditor/ckeditor.js')}}"></script>
  <!-- End custom js for this page-->

</body>

</html>


