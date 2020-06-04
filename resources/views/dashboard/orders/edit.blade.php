@extends('dashboard.layouts')
@section('title', 'Cập nhật đơn hàng')
@section('contents')
<div class="wrapper">
    <section class="content container-fluid">
        <form  action="{{ route('dashboard.orders.update',$order->id)}}" method="POST" role="form" enctype="multipart/form-data">
        <legend>Cập nhật đơn hàng </legend>
        @csrf
        <div class="row">
            <div class="col-lg-5">
                <div class="form-group">
                    <label for="">Tên khách hàng</label>
                    <input readonly type="text" name="name" class="form-control" id="" value="{{$order->customer_name}}" >
                </div>
              
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input readonly type="text" name="phone" class="form-control" id="" value="{{$order->customer_phone}}" >
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input readonly type="text" name="email" class="form-control" id="" value="{{$order->customer_email}}">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ nhận hàng</label>
                    <input readonly type="text" name="address" class="form-control" id="" value="{{$order->customer_address}}" >
                </div>
                <div class="form-group">
                    <label for="">Tổng tiền</label> 
                    <input readonly type="number" name="total_price" class="form-control" id="" value="{{$order->total_price}}" >
                </div>
                <div class="form-group">
                    <label for="">Phương thức thanh toán</label>
                    <select name="payment_method" class="form-control">
                        @foreach($payment_method as $key => $pm_mt)
                            <option @if($key==$order->payment_method)
                                selected 
                                @endif
                                value="{{$key}}">
                                {{$pm_mt}}
                            </option>   
                        @endforeach

                    </select>
                </div>
                
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select name="status" class="form-control">
                        @foreach($status_payment as $key => $stt_pm)
                            <option @if($key==$order->status)
                                selected 
                                @endif
                                value="{{$key}}">
                                {{$stt_pm}}
                            </option>   
                        @endforeach

                    </select>
                </div> 
                <a href="{{route('dashboard.orders.index')}}" class="btn btn-danger">Hủy</a>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            <div class="col-lg-5"> 
                
            </div>
        </div>
        
    </form>
    
    </section>
  </div>

@endsection