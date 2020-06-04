<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;

class OrderController extends Controller
{
    public function index()
    {   $status_payment = [
            0=>'Đã hủy',
            1=>'Đang chờ xử lí',
            2=>'Đang chuyển',
            3=>'Đã nhận hàng'
        ];
        $payment_method = [
            
            1=>'Chuyển khoản ngân hàng',
            2=>'COD',
            3=>'VISA/MASTER CARD',
            4=>'Tiền mặt'
        ];
        $orders = Order::orderBy('created_at','desc')->paginate(8);
        return view('dashboard.orders.index', 
            ['orders' => $orders,
             'status_payment'=>$status_payment,
             'payment_method'=>$payment_method
        
            ]
        );
    }
        public function filter(Request $request)
    {   
        if($request->filter=='buy_day'){
            $show ="
                <option value='1'>Lọc hóa đơn mới -> cũ</option>
                <option value='2'>Lọc hóa đơn cũ -> mới</option>
                <option value='3'>Lọc hóa đơn tháng này</option>
                <option value='4'>Lọc hóa đơn tháng trước</option>
               
            ";
            return response()->json(['result'=>$show]);
        }else if($request->filter=='status'){
            $show ="
                <option value='0'>Đã hủy</option>
                <option value='1'>Đang chờ xử lí</option>
                <option value='2'>Đang chuyển</option>
                <option value='3'>Đã nhận hàng</option>
               
            ";
            return response()->json(['result'=>$show]);
        }
        else if($request->filter=='payment_method'){
            $show ="
                <option value='1'>Chuyển khoản ngân hàng</option>
                <option value='2'>COD</option>
                <option value='3'>VISA/MASTER CARD</option>
                <option value='4'>Tiền mặt</option>
               
            ";
            return response()->json(['result'=>$show]);
        }
        else if($request->filter=='total_price'){
            $show ="
                <option value='5'>Lọc thấp -> cao</option>
                <option value='4'>Lọc cao -> thấp</option>
                <option value='3'>> 2.000.000 VNĐ</option>
                
                <option value='2'>500.000 VNĐ -> 1.000.000 VNĐ</option>
                <option value='1'>50.000 VNĐ -> 100.000 VNĐ</option>
               
               
            ";
            return response()->json(['result'=>$show]);
        }
        
        

    }
    public function show_filter(Request $request){
        $url =url('dashboard/orders');
        $payment_method = [
            
            1=>'Chuyển khoản ngân hàng',
            2=>'COD',
            3=>'VISA/MASTER CARD',
            4=>'Tiền mặt'
        ];
        $ordtatus_payment = [
            0=>'<p class="text-danger">Đã hủy</p>',
            1=>'<p style="color:#f89400">Đang chờ xử lí</p>',
            2=>'<p class="text-warning">Đang chuyển</p>',
            3=>'<p class="text-success">Đã nhận hàng</p>'
        ];
        $filter='';
        $cancel='';
        if($request->filter_date_buy==1){
            $filter=Order::orderBy('created_at','DESC')->get();
        }
        
        elseif($request->filter_date_buy==2){
            $filter=Order::orderBy('created_at','ASC')->get();
        }
        elseif($request->filter_date_buy==3){
            $filter=Order::where(DB::raw('month(created_at)'),DB::raw('month(now())'))->get();
        }
        elseif($request->filter_date_buy==4){
            $filter=Order::where(DB::raw('month(created_at)'),DB::raw('month(CURRENT_DATE - INTERVAL 1 month)'))->get();
        }
        
        elseif($request->status==0){
            $filter=Order::where('status','0')->get();
        }
        elseif($request->status==1){
            $filter=Order::where('status','1')->get();
        }
        elseif($request->status==2){
            $filter=Order::where('status','2')->get();
        }
        elseif($request->status==3){
            $filter=Order::where('status','3')->get();
        }
        if($request->payment_method==1){
            $filter=Order::where('payment_method','1')->get();
        }
        elseif($request->payment_method==2){
            $filter=Order::where('payment_method','2')->get();
        }
        elseif($request->payment_method==3){
            $filter=Order::where('payment_method','3')->get();
        }
        elseif($request->payment_method==4){
            $filter=Order::where('payment_method','4')->get();
        }
        if($request->total_price==1){
            $filter=DB::table('orders')->whereBetween('total_price', [50000, 100000])->get();
        }
        elseif($request->total_price==2){
            $filter=DB::table('orders')->whereBetween('total_price', [500000, 1000000])->get();
        }
        elseif($request->total_price==3){
            $filter=DB::table('orders')->where('total_price','>',2000000)->get();
        }
        elseif($request->total_price==3){
            $filter=DB::table('orders')->where('total_price','>',2000000)->get();
        }
        elseif($request->total_price==4){
            $filter=Order::orderBy('total_price','DESC')->get();
        }
        elseif($request->total_price==5){
            $filter=Order::orderBy('total_price','asc')->get();
        }
        if($request->filter=='cancel'){
            $cancel ="
                <option value=''>- - - - - - - - - - - - - - -</option> 
            ";
            $filter = Order::orderBy('created_at','desc')->paginate(8);
           
        }
        
        $pm_mt ='';
        $stt_pm ='';
       
        $output='';
        foreach($filter as $ord){
            foreach($ordtatus_payment as $key => $val){
                if($ord->status ==$key){
                    $stt_pm=$val;
                } 
            }
            foreach($payment_method as $key => $val){
                    if($ord->payment_method ==$key){
                        $pm_mt=$val;
                    }
            }
            
            $output.="
                
                <tr>  
                    <td>$ord->id</td>
                        <td>$ord->customer_name</td>
                        <td>$ord->customer_phone</td>
                        <td>$ord->customer_email</td>
                        <td>$ord->customer_address</td>
                        <td>$ord->total_price VNĐ</td>
                        <td>$pm_mt</td>
                        <td>$ord->created_at</td>
                        <td>$stt_pm</td>
                        <td>
                          <a href='$url/edit/$ord->id' title='Chỉnh sửa' class='btn btn-primary'>
                          <i class='fas fa-pen-alt'></i>
                          </a>
                          <a href='$url/show/$ord->id' class='btn btn-info'>
                            <i class='fas fa-eye'></i>
                          </a>
                          <a delete-ord='$ord->id' class='btn btn-danger del' title='Xóa' href='javascript:;'>
                            <i class='far fa-trash-alt'></i>
                          </a>
                        </td>         
                    </tr>
                    
            ";
        }
        $output.="
            <script>
                $(document).ready(function(){
                    $('.del').click(function(){
                        var ordID = $(this).attr('delete-ord')
                        var conf = confirm('Bạn có muốn xóa đơn hàng này không không?')
                        if(conf){
                            window.location.href='$url/destroy/'+ordID
                        }
                    })
                });
            </script>
        ";
        return response()->json(['result'=>$output,'res'=>$cancel]);
    }
    public function search(Request $request)
    {   
        $payment_method = [
            
            1=>'Chuyển khoản ngân hàng',
            2=>'COD',
            3=>'VISA/MASTER CARD',
            4=>'Tiền mặt'
        ];
        $ordtatus_payment = [
            0=>'<p class="text-danger">Đã hủy</p>',
            1=>'<p style="color:#f89400">Đang chờ xử lí</p>',
            2=>'<p class="text-warning">Đang chuyển</p>',
            3=>'<p class="text-success">Đã nhận hàng</p>'
        ];
        $ord_search = Order::where('id',$request->search)

                            ->get();
        $ord_searchNull = Order::orderBy('created_at','desc')->paginate(8);
        $url =url('dashboard/orders');
        $output = '';
        $order= isset($request->search)=='' || null ? $ord_searchNull : $ord_search;
        $pm_mt ='';
        $stt_pm ='';
       
        foreach($order as $ord){
            foreach($ordtatus_payment as $key => $val){
                if($ord->status ==$key){
                    $stt_pm=$val;
                } 
            }
            foreach($payment_method as $key => $val){
                    if($ord->payment_method ==$key){
                        $pm_mt=$val;
                    }
            }
            $output.="
                
                <tr>  
                    <td>$ord->id</td>
                        <td>$ord->customer_name</td>
                        <td>$ord->customer_phone</td>
                        <td>$ord->customer_email</td>
                        <td>$ord->customer_address</td>
                        <td>$ord->total_price VNĐ</td>
                        <td>$pm_mt</td>
                        <td>$ord->created_at</td>
                        <td>$stt_pm</td>
                        <td>
                          <a href='$url/edit/$ord->id' title='Chỉnh sửa' class='btn btn-primary'>
                          <i class='fas fa-pen-alt'></i>
                          </a>
                          <a href='$url/show/$ord->id' class='btn btn-info'>
                            <i class='fas fa-eye'></i>
                          </a>
                          <a delete-ord='$ord->id' class='btn btn-danger del' title='Xóa' href='javascript:;'>
                            <i class='far fa-trash-alt'></i>
                          </a>
                        </td>         
                    </tr>
                    
            ";
        }
        $output.="
            <script>
                $(document).ready(function(){
                    $('.del').click(function(){
                        var ordID = $(this).attr('delete-ord')
                        var conf = confirm('Bạn có muốn xóa đơn hàng này không?')
                        if(conf){
                            window.location.href='$url/destroy/'+ordID
                        }
                    })
                });
            </script>
        ";
        if(count($order)>0){
            return response()->json(['result'=>$output,'count'=>count($order)]);
        }
        
        else{
            return response()->json(['result'=>'err']);
        }
        // dd($output);
        
    }

    public function show($id)
    {
        $order = DB::table('order_detail')->join('products','order_detail.product_id','=','products.id')->where('order_id',$id)->get();
 
        return view('dashboard.orders.show',['order'=>$order]);
     
    }

    public function edit($id)
    {
        $status_payment = [
            0=>'Đã hủy',
            1=>'Đang chờ xử lí',
            2=>'Đang chuyển',
            3=>'Đã nhận hàng'
        ];
        $payment_method = [
            
            1=>'Chuyển khoản ngân hàng',
            2=>'COD',
            3=>'VISA/MASTER CARD',
            4=>'Tiền mặt'
        ];
        $order = Order::find($id);
        return view('dashboard.orders.edit', [
            'order' => $order,
            'status_payment'=>$status_payment,
            'payment_method'=>$payment_method
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => $request->status,
            'payment_method'=>$request->payment_method
            
        ]);
        return redirect()->route('dashboard.orders.index');
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return redirect()->route('dashboard.orders.index');
    }
}
