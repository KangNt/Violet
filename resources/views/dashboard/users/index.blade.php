@extends('dashboard.layouts')

@section('title', 'Users')

@section('contents')
<!-- Code -->
  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Thành Viên
      </h1>
      
    </section>

    <!-- Main content -->
    <div class="row">
      
      <div class="col-lg-5">
        <input id="search" class="form-control mt-1 ml-2 col-lg-7" type="text" placeholder="Tìm kiếm: Tên thành viên, email..." 
        aria-label="Search">
      </div>
      <a href="{{ route('dashboard.users.create') }}" class="btn btn-success">Create</a>  
    </div>
   
  

    <br>
    <section class="content container-fluid">
    @if(empty($users))
        <p>No Data</p>
    @else
    <div>
        <p id="show_search"></p>
      </div>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Trạng thái</th>
                <th>Tùy chọn</th>
            </thead>
            <tbody id="load">
                @foreach($users as $item)
                    <tr>  
                    <td>{{ $item ['id'] }}</td>
                        <td>{{ $item ['name'] }}</td>
                        <td>
                          <img width="70" height="60" src="{{$item ['avatar'] }}"></img>

                        </td>
                        <td>{{ $item ['email'] }}</td>
                        <td>
                        @foreach($role as $key =>$value)
                            @if($item['role']==$key)
                              {{ $value }}
                            
                            @endif
                        
                        @endforeach
                        
                        </td>
                        <td>
                          @foreach($status as $key =>$value)
                              @if($item['status']==$key)
                                @if($item['status']==0)
                                  <p class="text-success">{{ $value }}</p>
                                @elseif($item['status']==-1)
                                  <p class="text-warning">{{ $value }}</p>
                                @else
                                  <p class="text-danger">{{ $value }}</p>
                                @endif
                              @endif
                          
                          @endforeach
                        </td>
                        <td>
                          @if($item->role==10)
                          @else
                          <a href="{{route('dashboard.users.edit',$item ['id'])}}" class="btn btn-primary">
                            <i class="fas fa-user-edit"></i>
                          </a>
                          <a onclick="return confirm('Bạn có muốn xóa tài khoản này không?')" class="btn btn-danger" href="{{route('dashboard.users.destroy',$item ['id'])}}" >
                            <i class="far fa-trash-alt"></i>
                          </a>
                          @endif
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="justify-content-center" >
      <p style="text-align:center" id="test"></p>
    </div
        {{$users->links()}}
    @endif
    <!-- /.content -->
    </section> 
  </div>
  <!-- /.content-wrapper -->
 
@endsection