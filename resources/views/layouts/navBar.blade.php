
<nav class="nav-bar">
  <img src="{{asset('assets/dist/img/log.png')}}" alt="logo" class="mobile-logo"  width="90px"  height="40px">
  <div class="ham-bar"> <i class="fa-solid fa-bars" onclick="dropDown()"></i></div>
     <div class="menu-items">
      <img src="{{asset('assets/dist/img/log.png')}}" alt="logo" width="90px"  height="40px">
        <ul>
        <li> <a href=""> <i class="fa-solid fa-cart-shopping">  </i> my orders</a></li>
            <li> <a href=""> <i class="fa-solid fa-screwdriver-wrench"> </i> my complaints</a></li>
                <li> <a href=""> <i class="fa-solid fa-pen-nib"></i> my activites</a></li>
                    <li> <a href=""> <i class="fa-solid fa-star-half-stroke"></i> rate your purchased products </a></li>
                        <li>
                          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                          
                              <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item">
                                  {{ $properties['native'] }}
                              </a>   
                      @endforeach</li>
                      
        <li class="nav-item">
          <a href="{{ route('logout') }} "class="nav-link" style="color:#002659;"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <i class="fa-solid fa-right-from-bracket fa-lg"></i>
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
        </li>
        </ul>
</div>
<div class="mobile-menu">
  <div class="close"> <i class="fa-solid fa-times" onclick="dropDown()"></i></div>

    <ul>
    <li> <a href=""> <i class="fa-solid fa-cart-shopping">  </i> my orders</a></li>
        <li> <a href=""> <i class="fa-solid fa-screwdriver-wrench"> </i> my complaints</a></li>
            <li> <a href=""> <i class="fa-solid fa-pen-nib"></i> my activites</a></li>
                <li> <a href=""> <i class="fa-solid fa-star-half-stroke"></i> rate your purchased products </a></li>
                <li>
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  
                      <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item">
                          {{ $properties['native'] }}
                      </a>   
              @endforeach</li>
              
        <li class="nav-item">
          <a href="{{ route('logout') }} "class="nav-link" style="color:#002659;"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <i class="fa-solid fa-right-from-bracket fa-lg"></i>
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
        </li>


        </ul>
        </div>

</nav>













