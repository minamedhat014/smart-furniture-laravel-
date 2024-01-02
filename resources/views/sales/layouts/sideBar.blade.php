<aside class="main-sidebar sidebar-light-light elevation-4 custom-theme " >


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-1 ml-3 pb-1 mb-1 d-flex" >
        <img src="{{asset('assets/dist/img/user.png')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle" > 
        <div class="info">
          <a style="color: white">  welcome {{Auth::user()->name}}</a> 
        </div>
      </div>
     

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
     
       
          <li class="nav-item has-treeview menu-close">
            <a href="" class="nav-link active">
              <i class="fa-solid fa-couch"></i>
              <p>
                 products Module
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link active">
                  <i class="fa-solid fa-circle-plus"></i>
                  <p> Add new products </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa-solid fa-table-cells"></i>
                  <p> show customers </p>
                </a>
              </li>
            </ul>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
