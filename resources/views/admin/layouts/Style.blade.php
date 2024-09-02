
  <title>@yield('title')</title>
  <link rel="icon" type="image/x-icon" href="https://smartfurniture.com.eg/wp-content/uploads/2020/03/favicon.png">
  @livewireStyles

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/fontawesome/css/all.min.css')}}">
 <!-- fullCalendar -->
 <link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/main.css')}}">

  <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
<link rel="stylesheet" href="{{asset('assets/dist/bootstrap-5.3.0-dist/css/bootstrap.min.css')}}"> 
<!-- select2 -->
   <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
 
  
{{-- @if(App::getLocale()=='ar')

   <link rel="stylesheet" href="{{asset('assets/dist/css/custom.css')}}">
@else --}}

  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/dist/css/mycustom.css')}}">
  @yield('css')