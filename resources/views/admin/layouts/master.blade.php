<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  @include('admin.layouts.style')
</head>
<body class="hold-transition sidebar-mini ">

  <div class="wrapper app">
  @include('admin.layouts.navBar')
  @include('admin.layouts.sideBar')
  @include('admin.layouts.content')
  @include('admin.layouts.footer')
</div>

<!-- ./wrapper -->
{{-- @include('admin.layouts.sideControl') --}}
<!-- REQUIRED SCRIPTS -->

@include('admin.layouts.script')
</body>
</html>
