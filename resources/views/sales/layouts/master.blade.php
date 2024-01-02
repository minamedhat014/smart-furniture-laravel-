<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  @include('sales.layouts.style')
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
  @include('sales.layouts.navBar')
  @include('sales.layouts.sideBar')
  <!-- Content Wrapper. Contains page content -->
@include('sales.layouts.content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->
@include('sales.layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

@include('sales.layouts.script')
</body>
</html>
