  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link text-center">
      <img src="{{asset('backend')}}/dist/img/adminLogo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">@Company Name</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <a href="{{route('home')}}">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('backend')}}/dist/img/home icon.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="{{route('home')}}" class="d-block">Go to Home Page</a>
          </div>
        </a>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               @if ( Auth::user()->role == 'admin')
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-users"></i>
                  <p>
                    User Management
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('user_management.view')}}" class="nav-link">
                      <i class="fa fa-eye nav-icon"></i>
                      <p>View User</p>
                    </a>
                  </li>         
                </ul>
              </li>
              @endif


          <!-- Buyer Section -->
          @if ( Auth::user()->role == 'admin' || Auth::user()->role == 'buyer')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-gift"></i>
              <p>
                Buyer Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('supplier.view')}}" class="nav-link">
                  <i class="fa fa-plus-circle nav-icon"></i>
                  <p>Supplier List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('stock_product_list.view')}}" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('expense_invoice.view')}}" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>Invoice List View</p>
                </a>
              </li>

            </ul>
          </li>
          @endif
          <!-- End Buyer Section -->

           <!-- Seller Section -->
           @if ( Auth::user()->role == 'admin' || Auth::user()->role == 'seller')
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-gift"></i>
              <p>
                Seller Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-plus-circle nav-icon"></i>
                  <p>Menu 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>Menu 2</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <!-- End Seller Section -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>