<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
    
    <span class="brand-text font-weight-light ml-3">SHOPSTOCKS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">



    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->


            <li class="nav-item menu-open">
              <a href="{{route('dashboard')}}" class="nav-link {{ request()->is('dashboard*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  
                </p>
              </a>
            </li>


       <!--      <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('user*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{route('user.create')}}" class="nav-link {{ request()->is('user*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-plus"></i>
                  <p>Add New Admin</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link {{ request()->is('user*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-database"></i>
                  <p>All Admins</p>
                </a>
              </li>

        
            </ul>
          </li> -->

 
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('category*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{route('category.create')}}" class="nav-link {{ request()->is('category*') ? 'active' : ''}}">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Category </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{ request()->is('category*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-database"></i>
                  <p>All Categories</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('brand*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Brand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{route('brand.create')}}" class="nav-link {{ request()->is('brand*') ? 'active' : ''}}">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Brand </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('brand.index')}}" class="nav-link {{ request()->is('brand*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-database"></i>
                  <p>All Brands</p>
                </a>
              </li>
            </ul>
          </li>


          
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('size*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Size
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{route('size.create')}}" class="nav-link {{ request()->is('size*') ? 'active' : ''}}">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Size </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('size.index')}}" class="nav-link {{ request()->is('size*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-database"></i>
                  <p>All Sizes</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('product*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{route('product.create')}}" class="nav-link {{ request()->is('product*') ? 'active' : ''}}">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Product </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link {{ request()->is('product*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-database"></i>
                  <p>All Products</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('stocks*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Product Stocks
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{route('stocks')}}" class="nav-link {{ request()->is('stocks*') ? 'active' : ''}}">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Stocks Manage </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('stocks-history')}}" class="nav-link {{ request()->is('stocks*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-database"></i>
                  <p>Stocks History</p>
                </a>
              </li>
              
              
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('return*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Return Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{route('return-product')}}" class="nav-link {{ request()->is('return*') ? 'active' : ''}}">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Return Product </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('return-product-history')}}" class="nav-link {{ request()->is('return*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-database"></i>
                  <p>Return Product History</p>
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
