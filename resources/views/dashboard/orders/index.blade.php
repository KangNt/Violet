@extends('dashboard.layouts')

@section('title', 'Orders')

@section('contents')
<!-- Code -->
  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Đơn Hàng
      </h1>
    </section>
    <div class="row">
      <div class="col-lg-3">
        <input id="search" class="form-control float-left mt-1" type="text" placeholder="Tìm kiếm: Mã đơn hàng..." aria-label="Search">
      </div>
      <div class="col-lg-4">
          <select class="float-right form-control col-lg-11 mt-1" name="" id="select">
            <option value="">Tùy chọn lọc đơn hàng</option>
              <option value="buy_day">Lọc đơn hàng theo ngày mua</option>
              <option value="status">Lọc đơn hàng theo trạng thái</option>
              <option value="payment_method">Lọc đơn hàng theo phương thức thanh toán</option>
              <option value="total_price">Lọc đơn hàng theo số tiền thanh toán</option>
            
          </select>
      </div>
      <div class="col-lg-3">
          <select class="float-left form-control mt-1" name="" id="select_data">
            <option value="">- - - - - - - - - - - - - - -</option>
            
            
          </select>
      </div>
      <div class="col-lg-2">
        <button id="filter" class="btn btn-primary mt-1"><i class="fas fa-filter"></i> Lọc</button>
        <button id="cancel" class="btn btn-danger mt-1"> Hủy</button>
      </div>
    </div>
    <br>
    <!-- Main content -->
    <section class="content container-fluid">
    <?php $err=''; ?>
        <div>
        <p id="show_search"></p>
      </div>
        <table class="table">
            <thead>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ nhận hàng</th>
                <th>Tổng tiền</th>
                <th>Phương thức thanh toán</th>
                <th>Ngày mua</th>
                <th>Trạng thái</th>
                <th>Tùy chọn</th>
                
                
            </thead>
            <tbody id="load">
              @if(count($orders)==0)
                 <td> Không có dữ liệu</td>
              @else
                @foreach($orders as $item)
                    <tr>  
                      <td>{{ $item ['id'] }}</td>
                        <td>{{ $item ['customer_name'] }}</td>   
                        <td>{{ $item ['customer_phone'] }}</td>
                        <td>{{ $item ['customer_email'] }}</td>
                        <td>{{ $item ['customer_address'] }}</td>
                        
                        <td>{{ $item ['total_price'] }} VNĐ</td>
                        @foreach($payment_method as $key => $pm_mt)
                            @if($key==$item['payment_method'])
                            <td>
                                {{$pm_mt}}
                            </td>
                            @endif
                        @endforeach
                        <td>{{ $item ['created_at'] }}</td>
                        @foreach($status_payment as $key => $stt_pm)
                            @if($key==$item['status'])
                            <td>
                                @if($key==0)
                                <p class='text-danger'>
                                    {{$stt_pm}}
                                </p>
                                @elseif($key==1)
                                <p style="color:#f89400">
                                    {{$stt_pm}}
                                </p>
                                 @elseif($key==2)
                                <p class='text-warning'>
                                    {{$stt_pm}}
                                </p>
                                 @elseif($key==3)
                                <p class='text-success'>
                                    {{$stt_pm}}
                                </p>
                                @endif
                            </td>
                            @endif
                        @endforeach
                        
                        <td>
                        <a href="{{route('dashboard.orders.edit',$item['id'])}}" class="btn btn-primary">
                            <i class="fas fa-pen-alt"> </i>
                          </a>
                          <a href="{{route('dashboard.orders.show',$item['id'])}}" class="btn btn-info">
                            <i class="fas fa-eye"></i>
                          </a>
                          <a onclick="return confirm('Bạn có muốn xóa đơn hàng này không?')" class="btn btn-danger" type="submit" value="" href="{{route('dashboard.orders.destroy',$item ['id'])}}"  >
                            <i class="far fa-trash-alt"></i>
                          </a>
                          

                        </td>
                        


                    </tr>
                  @endforeach
                @endif
            </tbody>
        </table>
        <div class="justify-content-center" >
          <p style="text-align:center" id="test"></p>
        </div>
        {{$orders->links()}}
    <!-- /.content -->
    </section> 
  </div>
  <script>
    $(document).ready(function(){
        $('#cancel').click(function(){
        var vlue = $('#select').val('')
        $.ajax({
          method:"post",
          url:"{{route('dashboard.orders.show-filter')}}",
          data:{
            filter:'cancel',
            _token:"{{ csrf_token() }}"
          },
          dataType:'json',
          success:function(data){
            $('#select_data').html(data.res)
            $('#load').html(data.result)
          }
        })
      })
      $('#select').change(function(){
         var val = $(this).val()
        $.ajax({
          method:"post",
          url:"{{route('dashboard.orders.filter')}}",
          data:{
            filter:val,
            _token:"{{ csrf_token() }}"
          },
          dataType:'json',
          success:function(data){
            $('#select_data').html(data.result)
          }
        })
        
      })
      $('#filter').click(function(){
        var vlue = $('#select_data').val()
        var get_vl_sl =$('#select').val()
        if(get_vl_sl=='buy_day'){
            $.ajax({
              method:"post",
              url:"{{route('dashboard.orders.show-filter')}}",
              data:{
                filter_date_buy:vlue,
                _token:"{{ csrf_token() }}"
              },
              dataType:'json',
              success:function(data){
                $('#load').html(data.result)
              }
            })
        }else if(get_vl_sl=='status'){
          $.ajax({
              method:"post",
              url:"{{route('dashboard.orders.show-filter')}}",
              data:{
                status:vlue,
                _token:"{{ csrf_token() }}"
              },
              dataType:'json',
              success:function(data){
                $('#load').html(data.result)
              }
            })
        }
        else if(get_vl_sl=='payment_method'){
            $.ajax({
                method:"post",
                url:"{{route('dashboard.orders.show-filter')}}",
                data:{
                  payment_method:vlue,
                  _token:"{{ csrf_token() }}"
                },
                dataType:'json',
                success:function(data){
                  $('#load').html(data.result)
                }
              })
        }
        else if(get_vl_sl=='total_price'){
            $.ajax({
                method:"post",
                url:"{{route('dashboard.orders.show-filter')}}",
                data:{
                  total_price:vlue,
                  _token:"{{ csrf_token() }}"
                },
                dataType:'json',
                success:function(data){
                  $('#load').html(data.result)
                }
              })
        }    
      }) 
      $('#search').keyup(function(){
          var search = $('#search').val();
         
        $.ajax({
          method:"post",
          url:"{{route('dashboard.orders.search')}}",
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
  <!-- /.content-wrapper -->
@endsection