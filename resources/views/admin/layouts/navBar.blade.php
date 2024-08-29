
    <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light custom-theme "  > 
    
  
      <!-- Left navbar links -->
      <ul class="navbar-nav">
      
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" ><i class="fas fa-bars"></i></a>
        </li>

        <a href="{{route('admin.home')}}">
          <img src="{{asset('assets/dist/img/log.png')}}" alt="logo" class="admin-logo" >
        </a>
      </ul>
  
 
      
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
   
       @livewire('admin.settings.notification-index')

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt fa-lg"></i>
          </a>
        </li>
        
        <li class="nav-item">
        <a href="{{ route('admin.logout') }} "class="nav-link" style="color:#002659;"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket fa-lg"></i>
       </a>
       <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
           @csrf
       </form>
      </li>

      </ul>
    </ul>
    </nav>
    <!-- /.navbar -->