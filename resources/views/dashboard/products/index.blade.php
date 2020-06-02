@extends('dashboard.layouts')
@section('title', 'Products')
@section('contents')
<!-- Code -->
  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
        Danh sách sản phẩm
      </h4>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <a href="{{ route('dashboard.products.create') }}" class="btn btn-success mb-2">
      Thêm sản phẩm
    </a>
    
    <div class="row">
      <div class="col-lg-5">
        <input id="search" class="form-control mt-1 col-lg-7" type="text" placeholder="Tìm kiếm: Tên sản phẩm, mã..." aria-label="Search">
      </div>
      
    </div>
    <!-- <form class="form-inline ml-3 justify-content-center">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
    </div>
  </form> -->
  <br>
    @if(empty($products))
        <p>No Data</p>
    @else
      <div>
        <p id="show_search"></p>
      </div>
        <table id="nam123" class="table">
            <thead>
                <th>ID</th>
                <th>Danh Mục</th>
                <th>Tên Sản Phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Lượt Xem</th>
                <th>Đánh Giá</th>
                <th>Tùy chọn</th>
          
              
            </thead>
            <tbody id="load">
                
                @foreach($products as $item)
                    <tr>  
                    <td>{{ $item ['id'] }}</td>
                        @foreach($category as $cate)
                           
                            @if($cate->id==$item['cate_id'])
                             <td>
                                {{$cate->cate_name}}
                             </td>
                            
                           
                            @endif
                            
                        @endforeach
                        <td>{{ $item ['name'] }}</td>
                        <td>
                          <img width="60" height="50" src="{{ $item ['image'] }}">
                        </td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item ['amount'] }}</td>
                        <td>{{ $item ['views'] }}</td>
                        <td>{{ $item ['rating'] }}</td>
                        <td>
                          <a href="{{route('dashboard.products.edit',$item ['id'])}}" title="Chỉnh sửa" class="btn btn-primary">
                          <i class="fas fa-pen-alt"></i>
                          </a>
                          <!-- <a onclick="return confirm('Bạn có muốn xóa sản phẩm {{ $item['name'] }} không ?');" class="btn btn-danger" title="Xóa"  href="{{route('dashboard.products.destroy',$item ['id'])}}"> -->
                            <i class="far fa-trash-alt"></i>
                          </a>
                        </td> 
                    </tr>
                @endforeach
                
            </tbody>
            
        </table>
    @endif
    <!-- /.content -->
    <div class="justify-content-center" >
      <p style="text-align:center" id="test"></p>
    </div>
    {{$products->links()}}
    
    </section> 
  </div>
  
  <!-- /.content-wrapper -->
  <script>
    $(document).ready(function(){
    
      $('#search').keyup(function(){
          var search = $('#search').val();
         
            $.ajax({
          method:"post",
          url:"{{route('dashboard.products.search')}}",
          data:{
            search:search,
            _token:"{{ csrf_token() }}"
          },
          dataType:'json',
          
          success:function(res){
            if(res.result=='err'){
              $('#show_search').hide();
              $('#test').html('Không tìm thấy dữ liệu trong bảng!').show();
              $('#load').hide();
              
            }else if(search==''){
              $('#show_search').hide();
              $('#test').hide();
              $('#load').html(res.result).show();
            }
            else{
              $('#show_search').html('Kết quả tìm kiếm: '+res.count).show();
              $('#load').html(res.result).show();
              $('#test').hide();
            }
              

          }
        })  
          
          
        
      });
    });
  </script>
@endsection