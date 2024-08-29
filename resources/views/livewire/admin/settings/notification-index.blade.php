<div>
<li class="nav-item dropdown" wire:poll.10000ms >
    <a class="nav-link " data-toggle="dropdown" href="#" >
      <i class="far fa-bell fa-lg"></i>
      <span class="badge badge-danger navbar-badge">{{Auth::user()->unreadNotifications->count()}}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-2xl dropdown-menu-right" style="max-height:500px; overflow:scroll;" >
        {{-- search bar  --}}
        <div class="navbar-search-block">

            <form class="form-inline col-11 justify-content-around mb-3 mt-3" >
              <div class="input-group input-group-sm col-10">
                <input class="form-control form-control-navbar " type="search" placeholder="Search" aria-label="Search" wire:model.live.debounce.500ms ="search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit" >
                    <i class="fas fa-search"></i>
                  </button>
                 
                </div>
              </div>
            </form>

          </div>

      @foreach($unReadnotifications as $notification)
      <a href=" {{$notification ->data['url']}}" class="dropdown-item">
        <!-- Message Start -->
        <div class="media" style="background-color:rgba(226, 226, 226, 0.933)">
          <img src="{{$notification->data['image']}}" alt="User Avatar" class="noti-image">
          <div class="media-body">
            <h3 class="dropdown-item-title">
              {{$notification ->data['by']}}
            </h3>
            <p class="text-sm ">{{$notification ->data['title']}}</p>
            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$notification ->created_at}}</p>
          </div>
        </div>
        <!-- Message End -->
      </a> 
     @endforeach
      <div class="dropdown-divider"></div>


      @foreach($readnotifications as $row)
      <a href=" {{$row ->data['url']}}" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
          <img src="{{$row->data['image']}}" alt="notification Image" class="noti-image">
          <div class="media-body">
            <h3 class="dropdown-item-title">
              {{$row ->data['by']}}
            </h3>
            <p class="text-sm">      {{$row ->data['title']}}</p>
            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$row ->created_at}}</p>
          </div>
        </div>
        <!-- Message End -->
      </a> 
     @endforeach

     <a href="{{route('notifications.index')}}" class="btn btn-outline-secoandry col-12"  wire:click="readAll"> <i class="fa-solid fa-eye"></i> view all </a>
    </div>
  </li>

</div>