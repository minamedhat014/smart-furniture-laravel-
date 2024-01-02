
  <title>@yield('title')</title>
  @livewireStyles
  <!-- Font Awesome Icons -->
  <!--<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}"> 
 
  <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
  
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">

@if(App::getLocale()=='ar')

   <link rel="stylesheet" href="{{asset('assets/dist/css/custom.css')}}">
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
@else
<link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
@endif
  <link rel="stylesheet" href="{{asset('assets/dist/css/mycustom.css')}}">
  @yield('css')