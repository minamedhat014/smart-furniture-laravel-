<div class="content-wrapper">
  @include('layouts.contentHeader')
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" >
      @yield('content')
      @livewire('livewire-toast')
    <!-- /.content -->
    </div>
  </div>

 
