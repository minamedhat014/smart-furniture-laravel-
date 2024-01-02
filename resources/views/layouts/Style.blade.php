
  <title>@yield('title')</title>
  @livewireStyles
  <!-- Font Awesome Icons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">  --}}
  <link rel="stylesheet" href="{{asset('assets/dist/css/smart .css')}}">
 
  <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
  
  
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">

@if(App::getLocale()=='ar')
{{-- 
   <link rel="stylesheet" href="{{asset('assets/dist/css/custom.css')}}">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> --}}
@else
{{-- <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}"> --}}
@endif
  {{-- <link rel="stylesheet" href="{{asset('assets/dist/css/mycustom.css')}}"> --}}
  @yield('css')