<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{asset('admin/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .9">
      <span class="brand-text font-weight-light">Violet</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="height: 40px;width: 2.5rem;" src="{{asset('admin/img/user.jpg')}}" 
            class="img-circle elevation-2" alt="User Image">
           <span class="brand-text font-weight-light" style="color:white"> Alexander NTQ</span>  
        </div>
        <div class="info">
          
          <a href="#" class="d-block">
               <!-- @if(Auth::user())
              {{Auth::user()->name}}
            @endif -->
            
          </a>  
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
               <i style='font-size:21px' class="fas fa-cog"> </i>
               <p>
                Hệ Thống
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-tools"></i>
                  <p>Cài Đặt</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-images"></i>
                  <p>Slider</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Quản Lí
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.users.index')}}" class="nav-link ">
                  <i class="fas fa-users"></i>
                  <p>Tài Khoản</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.orders.index')}}" class="nav-link">
                  <i class="fas fa-dolly"></i>
                  <p>Đơn hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.categories.index')}}" class="nav-link">
                  <i class="fas fa-folder-open"></i>
                  <p>Danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.comments.index')}}" class="nav-link">
                  <i class="far fa-comments"></i>
                  <p>Bình luận</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.contacts.index')}}" class="nav-link">
                  <i class="fas fa-id-card"></i>
                  <p>Liên hệ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.products.index')}}" class="nav-link">
                 <i class="fas fa-box-open"></i>
                  <p>Sản phẩm</p>
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
