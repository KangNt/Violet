<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('role','desc')->paginate(7);
        $role =[
            0 =>'Thành Viên',
            1 =>'Nhân Viên',
            10 =>'Quản Trị Viên'
        ];
        $status =[
            -5 =>'Khóa vĩnh viễn',
            -3=>'Khóa 1 tháng',
            -1 =>'Chưa kích hoạt',
             0 =>'Kích hoạt',
        ];
        // foreach ($users as $user) {
        //     $user->posts;    
        // }
        // $users->toArray();
        return view('dashboard.users.index', ['users' => $users,'role' => $role,'status'=>$status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'avatar' => $data['avatar'],
            'email' => $data['email'],
            'password' => bcrypt(''),
            'role' => $data['role'],
            'status' => $data['status']
            
        ]);
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function search(Request $request)
    // {   
    //     $role =[
    //         0 =>'Thành Viên',
    //         1 =>'Nhân Viên',
    //         10 =>'Quản Trị Viên'
    //     ];
    //     $status =[
    //         -5 =>'<p class="text-danger">Khóa vĩnh viễn</p>',
    //         -3=>'<p class="text-danger">Khóa 1 tháng</p>',
    //         -1 =>'<p class="text-warning">Chưa kích hoạt</p>',
    //          0 =>'<p class="text-success">Kích hoạt</p>'
            
    //     ];
    //     $search = User::where('name','like','%'.$request->search.'%')
    //     ->orWhere('email',$request->search)
    //     ->get();
    //     $searchNull = User::orderBy('role','desc')->paginate(7);
    //     $url =url('dashboard/users');
    //     $output = '';
    //     $rol='';
    //     $stt='';
    //     $test= isset($request->search)=='' ? $searchNull : $search;
    //     foreach($test as $s){
    //         foreach($role as $key =>$val){
    //             if($s->role==$key){
    //                 $rol=$val;
    //             }
    //         }
    //         foreach($status as $key =>$val){
    //             if($s->status==$key){
    //                 $stt=$val;
    //             }
    //         }
    //         $output.="
                
    //             <tr>  
    //                 <td>$s->id</td>
    //                     <td>$s->name</td>
    //                     <td>
    //                     <img width='60' height='50' src='$s->avatar'>
    //                     </td>
    //                     <td>$s->email</td>
    //                     <td>$rol</td>
    //                     <td>$stt</td>
                        
    //                     <td>
    //                       <a href='$url/edit/$s->id' title='Chỉnh sửa' class='btn btn-primary'>
    //                       <i class='fas fa-pen-alt'></i>
    //                       </a>
    //                       <a delete-user='$s->id' class='btn btn-danger del' name-user='$s->name' title='Xóa' href='javascript:;'>
    //                         <i class='far fa-trash-alt'></i>
    //                       </a>
    //                     </td>         
    //                 </tr>
                    
    //         ";
    //     }
    //     $output.="
    //         <script>
    //             $(document).ready(function(){
    //                 $('.del').click(function(){
    //                     var userID = $(this).attr('delete-user')
    //                     var userName = $(this).attr('name-user')
    //                     var conf = confirm('Bạn có muốn xóa tài khoản ' + userName + ' không?')
    //                     if(conf){
    //                         window.location.href='$url/destroy/'+userID
    //                     }
    //                 })
    //             });
    //         </script>
    //     ";
    //     if(count($search)>0){
    //         return response()->json(['result'=>$output,'count'=>count($search)]);
    //     }
        
    //     else{
    //         return response()->json(['result'=>'err']);
    //     }
    //     // dd($output);
        
    // }
    public function show ($id)
    {
        $user = User::find($id);
        return $user;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function edit($id)
    {   
        $role =[
            0 =>'Thành Viên',
            1 =>'Nhân Viên',
            10 =>'Quản Trị Viên'
        ];
        $status =[
            -5 =>'Khóa vĩnh viễn',
            -3=>'Khóa 1 tháng',
            -1 =>'Chưa kích hoạt',
             0 =>'Kích hoạt',
            
        ];
        $user = User::find($id);
        return view('dashboard.users.edit', [
            'user' => $user,'role'=>$role,'status'=>$status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('dashboard.users.index');
    }
}
