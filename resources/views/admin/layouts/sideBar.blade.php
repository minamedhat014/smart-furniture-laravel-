<aside class="main-sidebar sidebar-light-light  elevation-4 custom-theme col-lg-3" >
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 ml-3 pb-1 mb-3 d-flex" >
        <img src="{{Auth::user()->getFirstMediaUrl('profile')}}" alt="" class="profile" > 
        <div class="info mt-2">
          <a style=" color:rgb(0, 0, 100)"> {{ucfirst(Auth::user()->name)}}</a> 
        
        </div>
      </div>
     

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
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
              @can('view import center')
                <a href="{{route('settings.importCenter')}}" class="nav-link">
                  <i class="fa-solid fa-cloud-arrow-up"></i>
                  <p> Data import center </p>
                </a>
                @endcan 
              </li>

            <li>
              @can('view system list')
                <a href="{{route('dropdown.index')}}" class="nav-link">
                  <i class="fa-solid fa-circle-chevron-down"></i>
                  <p> dropdown lists</p>
                </a>
                @endcan 
              </li>
 </ul>

 <li class="nav-item has-treeview menu-close">
  @can('view users')
  <a class="nav-link active">
    <i class="fa-solid fa-users-gear"></i>
    <p>
      users
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  @endcan
  <ul class="nav nav-treeview">
            @can('view users')
            
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                  <i class="fa-regular fa-id-card"></i>
                  <p> Users </p>
                </a>
              </li>
            
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="fa-solid fa-circle-user"></i>
                  <p> Roles </p>
                </a>
              </li>
    
              <li class="nav-item">     
                <a href="{{route('permissions.index')}}" class="nav-link">
                  <i class="fa-solid fa-unlock-keyhole"></i>
                  <p> Permissions </p>
                </a>
              </li>

              @endCan
            </ul>
          </li>


          
          <li class="nav-item has-treeview menu-close">
            @can('view products')
            <a href="" class="nav-link active">
              <i class="fa-solid fa-couch"></i>
              <p>
               Product Module
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            @endcan
            <ul class="nav nav-treeview">

              @can('view products')
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link">
                  <i class="fa-brands fa-product-hunt"></i>
                  <p> Product List </p>
                </a>
              </li>
           @endcan

            @can('view available items')  
              <li class="nav-item">
                <a href="{{route('avilableItems')}}" target="_blank" class="nav-link">
                  <i class="fa-solid fa-circle-info"></i>
                  <p>Available items </p>
                </a>
              </li>
              @endcan

              @can('view products versions')
              <li class="nav-item">
                <a href="{{route('productUpdate.index')}}" class="nav-link">
                  <i class="fa-solid fa-wrench"></i>
                  <p> Product Updates </p>
                </a>
              </li>
            @endCan
             
            @can('view offers')
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
              @endCan
            </ul>
          </li>
          
          @can('view distributors'|'view showroom')

          <li class="nav-item has-treeview menu-close">      
            <a href="" class="nav-link active">
              <i class="fa-solid fa-store"></i>
              <p>
               distributors and  Branches 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              @can('view distributors')
              <li class="nav-item">
                <a href="{{route('dist.index')}}" class="nav-link">
                  <i class="fa-solid fa-shop"></i>
                  <p> Distributors  List </p>
                </a>
              </li>
              @endcan

              @can('view showrooms')
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
                  @endcan
            </ul>
          </li>
            @endcan
          

          
  
            @can('view customers')

          <li class="nav-item has-treeview menu-close">
            <a href="" class="nav-link active">
              <i class="fa-solid fa-address-card"></i>
              <p>
             Customer Module
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">             
              <a href="{{route('customers.index')}}" class="nav-link">
                  <i class="fa-solid fa-user"></i>
                  <p> customers </p>
                </a>
              </li>
              
              <li class="nav-item">             
                <a href="{{route('customerDetails.index')}}" class="nav-link">
                  <i class="fa-solid fa-bag-shopping"></i>
                  <p> customer Master Data </p>
                </a>
              </li>
              
                <li class="nav-item">             
                  <a href="{{route('customers.myIndex')}}" class="nav-link">
                    <i class="fa-solid fa-user "></i>
                      <p> My Customers List</p>
                    </a>
                  </li>
        </ul>
        </li>
         @endcan 
        
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
                <p> Delivery Appointments  </p>
              </a>
            </li>      
      </ul>
      </li> 
          
{{--        
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
 --}} 

      {{-- <li class="nav-item has-treeview menu-close">
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
       --}}
    

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
