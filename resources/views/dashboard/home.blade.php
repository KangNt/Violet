@extends('dashboard.layouts')
@section('title' , 'ADMIN')
@section('contents')
<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">DashBoard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
  
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              
              <h3>12</h3>

              <p>Đơn Hàng</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-invoice"></i>
            </div>
            <a href="#" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
              
              <h3>12</h3>
              <p>Danh Mục</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              
              <h3>41</h3>
              <p>Thành Viên</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            
            <a href="{{route('dashboard.users.index')}}" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              
              <h3>24</h3>
              <p>Sản Phẩm</p>
            </div>
            <div class="icon">
            <i class="fas fa-toolbox"></i>
            </div>
            <a href="#" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              
              <h3>46</h3>

              <p>Liên Hệ</p>
            </div>
            <div class="icon">
              <i class="far fa-address-card"></i>
            </div>
            <a href="#" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
              
              <h3>34</h3>
              <p>Bình Luận</p>
            </div>
            <div class="icon">
              <i class="far fa-comments"></i>
            </div>
            <a href="#" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              
              <h3>123</h3>

              <p>Mã Giảm Giá</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div><!-- end-row-->
    </div> <!-- end-container-fluid-->
  </section><!--endSection-->  
</div> <!-- content-wrapper-->
<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header border-0">
        <div class="d-flex justify-content-between">
          <h3 class="card-title">Biểu đồ sản phẩm được mua</h3>
          <a href="javascript:void(0);">Xem báo cáo</a>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex">
          <p class="d-flex flex-column">
            <span class="text-bold text-lg">320 Sản Phẩm</span>
            <span>Sản phẩm tuần trước</span>
          </p>
          <p class="ml-auto d-flex flex-column text-right">
            <span class="text-success">
              <i class="fas fa-arrow-up"></i> 12.5%
            </span>
            <span class="text-muted">Sản phẩm tuần này</span>
          </p>
        </div>
        <!-- /.d-flex -->

        <div class="position-relative mb-4">
          <canvas id="visitors-chart" height="200"></canvas>
        </div>

        <div class="d-flex flex-row justify-content-end">
          <span class="mr-2">
            <i class="fas fa-square text-primary"></i> Tuần này
          </span>

          <span>
            <i class="fas fa-square text-gray"></i> Tuần trước
          </span>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-md-6 -->
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header border-0">
        <div class="d-flex justify-content-between">
          <h3 class="card-title">Biểu đồ doanh thu</h3>
          <a href="#">Xem báo cáo</a>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex">
          <p class="d-flex flex-column">
            <span class="text-bold text-lg"> 
           </span>
            <span>Doanh thu tháng trước</span>
          </p>
          <p class="ml-auto d-flex flex-column text-right">
            <span class="text-success">
              <i class="fas fa-arrow-up"></i> 95.1%
            </span>
            <span class="text-muted">Doanh thu tháng này</span>
          </p>
        </div>
        <!-- /.d-flex -->

        <div class="position-relative mb-4">
          <canvas id="sales-chart" height="200"></canvas>
        </div>

        <div class="d-flex flex-row justify-content-end">
          <span class="mr-2">
             Đơn vị: Việt Nam Đồng
          </span>

          <span>
           
          </span>
        </div>
      </div>
    </div>        
  </div>
          <!-- /.col-md-6 -->
</div>
@endsection