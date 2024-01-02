<aside class="main-sidebar sidebar-light-light elevation-4 custom-theme " >
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 ml-3 pb-1 mb-3 d-flex" >
        <img src="{{Auth::user()->getFirstMediaUrl('profile')}}" alt="" class=" mr-3 profile" > 
        <div class="info">
          <a style=" color:rgb(0, 0, 100)"> {{ucfirst(Auth::user()->name)}}</a> 
        
        </div>
      </div>
     

      <!-- Sidebar Menu -->
      <nav class="mt-1" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
     
       
          <li class="nav-item has-treeview menu-close">
            @can('general settings')
            <a href="" class="nav-link active">
              <i class="fa-solid fa-gears"></i>
              <p>
                  General Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            @endcan
            <ul class="nav nav-treeview">
              
          <li>
            @can('view activity log')
              <a href="{{route('systemActivity.index')}}" class="nav-link">
                <i class="fa-solid fa-laptop-file"></i>
                <p> System Activity Log </p>
              </a>
              @endcan 
            </li>

            <li>
              @can('view system list ')
                <a href="{{route('dropdown.index')}}" class="nav-link">
                  <i class="fa-solid fa-circle-chevron-down"></i>
                  <p> dropdown lists</p>
                </a>
                @endcan 
              </li>
 </ul>

 <li class="nav-item has-treeview menu-close">
  @can('general settings')
  <a href="" class="nav-link active">
    <i class="fa-solid fa-users-gear"></i>
    <p>
      users
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  @endcan
  <ul class="nav nav-treeview">
              <li class="nav-item">
                @can('view users')
                <a href="{{route('user.index')}}" class="nav-link">
                  <i class="fa-regular fa-id-card"></i>
                  <p> Users </p>
                </a>
                @endcan
              </li>
           

     
              <li class="nav-item">
                @can('view roles')
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="fa-solid fa-circle-user"></i>
                  <p> Roles </p>
                </a>
                @endcan
              </li>
    


       
              <li class="nav-item">
                @can('view permissions')
                <a href="{{route('permissions.index')}}" class="nav-link">
                  <i class="fa-solid fa-unlock-keyhole"></i>
                  <p> Permissions </p>
                </a>
                @endcan
              </li>
            </ul>
          </li>


          
          <li class="nav-item has-treeview menu-close">
            <a href="" class="nav-link active">
              <i class="fa-solid fa-couch"></i>
              <p>
                 product info
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link">
                  <i class="fa-brands fa-product-hunt"></i>
                  <p> Product List </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('productDetails')}}" target="_blank" class="nav-link">
                  <i class="fa-solid fa-circle-info"></i>
                  <p> Price List </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('productUpdate.index')}}" class="nav-link">
                  <i class="fa-solid fa-wrench"></i>
                  <p> Product Updates </p>
                </a>
              </li>

             
              <li class="nav-item">
                <a href="{{route('offers.index')}}" class="nav-link">
                  <i class="fa-solid fa-tags"></i>
                  <p> offers List </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('installments.index')}}" class="nav-link">
                  <i class="fa-solid fa-wallet"></i>
                  <p> installments List </p>
                </a>
              </li>
            </ul>
          </li>
          
          
          <li class="nav-item has-treeview menu-close">
            <a href="" class="nav-link active">
              <i class="fa-solid fa-store"></i>
              <p>
              Branches 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @can('view distributors')
                <a href="{{route('dist.index')}}" class="nav-link">
                  <i class="fa-solid fa-shop"></i>
                  <p> Distributors  List </p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                <a href="{{route('showroom.index')}}" class="nav-link">
                  <i class="fa-solid fa-circle-info"></i>
                  <p> Showrooms List </p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{route('brachProducts.show')}}" class="nav-link"> 
                  <i class="fa-solid fa-chair"></i>
                  <p> Showroom products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('branhStaff.show')}}" class="nav-link"> 
                    <i class="fa-solid fa-user"></i>
                    <p> Showroom staffs </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{route('installStaff.index')}}" class="nav-link"> 
                      <i class="fa-solid fa-user"></i>
                      <p> installation staffs </p>
                    </a>
                  </li>
            </ul>
          </li>

          

          <li class="nav-item has-treeview menu-close">
            <a href="" class="nav-link active">
              <i class="fa-solid fa-address-card"></i>
              <p>
             Customers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">             
              <a href="{{route('customers.index')}}" class="nav-link">
                  <i class="fa-solid fa-user"></i>
                  <p>customers List </p>
                </a>
              </li>
              
                <li class="nav-item">             
                  <a href="{{route('customers.myIndex')}}" class="nav-link">
                    <i class="fa-solid fa-user "></i>
                      <p> My customers List</p>
                    </a>
                  </li>
        </ul>
        </li>

        
        <li class="nav-item has-treeview menu-close">
          <a href="" class="nav-link active">
            <i class="fa-solid fa-tags"></i>
            <p>
          sales
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">             
              <a href="{{route('customerOrder.index')}}" class="nav-link">
                <i class="fa-solid fa-bag-shopping"></i>
                <p> orders per customer </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('customerOrder.show')}}" class="nav-link">
                <i class="fa-solid fa-bag-shopping"></i>
                <p> orders </p>
              </a>
            </li> 
      </ul>
        </li>  

        <li class="nav-item has-treeview menu-close">
          <a href="" class="nav-link active">
            <i class="fa-solid fa-calendar-day"></i>
            <p>
                Appointments
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">             
              <a href="{{route('deliveryAppointment.index')}}" class="nav-link">
                <i class="fa-solid fa-calendar-day"></i>
                <p> delivery  </p>
              </a>
            </li>

            
      </ul>
    </li> 
              

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
