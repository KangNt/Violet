@extends('dashboard.layouts')
@section('title', 'Trả lời phản hồi')
@section('contents')
<div class="wrapper">
    <section class="content container-fluid">
        <form  action="{{route('dashboard.contacts.submitReplyContact',$reply->id)}}" method="POST" role="form" enctype="multipart/form-data">
        <legend>Trả lời phản hồi </legend>
        <p class="text-success">
            @if(Session::has('success'))
                {{ Session::get('success') }}
            
            @endif
        </p>
        @csrf
        <div class="row">
            <div class="col-lg-5">
                <div class="form-group">
                    <label for="">Tên khách hàng</label>
                    <input readonly type="text"  name="name" class="form-control" id="" value="{{$reply->fullname}}" >
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input readonly type="text" name="email" class="form-control" id="" value="{{$reply->email}}">
                </div>
                <div class="form-group">
                    <label for="">Tiêu đề </label>
                    <textarea class="form-control" required name="title" id="" placeholder="Nhập tiêu đề" cols="30" rows="1"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea class="form-control" required name="content" placeholder="Nhập nội dung" id="" cols="30" rows="10"></textarea>
                </div>
                <p class="text-danger">Lưu ý: Email sẽ được gửi địa chỉ email của người phải hồi</p>
                <a href="{{route('dashboard.ab-c-bcontacts.index')}}" class="btn btn-danger">Hủy</a>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </div>
            <div class="col-lg-5"> 
                
            </div>
        </div>
        
    </form>
    
    </section>
  </div>

@endsection