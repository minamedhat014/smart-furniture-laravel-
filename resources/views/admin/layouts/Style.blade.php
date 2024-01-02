
  <title>@yield('title')</title>
  <link rel="icon" type="image/x-icon" href="https://smartfurniture.com.eg/wp-content/uploads/2020/03/favicon.png">
  @livewireStyles
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}"> 
  <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
<link rel="stylesheet" href="{{asset('assets/dist/bootstrap-5.3.0-dist/css/bootstrap.min.css')}}"> 
  {{-- <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}"> --}}
<!-- select2 -->
   <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@if(App::getLocale()=='ar')

   <link rel="stylesheet" href="{{asset('assets/dist/css/custom.css')}}">
@else
<link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
@endif
  <link rel="stylesheet" href="{{asset('assets/dist/css/mycustom.css')}}">
  @yield('css')