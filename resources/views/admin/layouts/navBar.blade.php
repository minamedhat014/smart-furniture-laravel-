<div class="wrapper">
    <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light custom-theme" > 
    
  
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

        {{-- <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown" >
          <a class="nav-link " data-toggle="dropdown" href="#"  style="color: #002659;">
            <i class="far fa-bell fa-lg"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li> --}}

{{-- translations  --}}

        {{-- <li class="nav-item dropdown" >
          <a class="nav-link " data-toggle="dropdown" href="#"  style="color: #002659;">
            <i class="fa-solid fa-language fa-lg"></i>
            
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
            <div class="dropdown-divider"></div>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            
                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item">
                    {{ $properties['native'] }}
                </a>   
        @endforeach
        </li> --}}

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