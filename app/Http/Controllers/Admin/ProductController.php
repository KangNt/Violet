<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;
class ProductController extends Controller
{

    public function index()
    {   $category = Category::all();
        $products = Product::orderBy('created_at','desc')->paginate(8);
        return view('dashboard.products.index', ['products' => $products,'category'=>$category]);
    }

    public function create()
    {   $get_all_categories = Category::all();
        $status_cmt = [
            "Bật"=>1,
            "Tắt"=>0
        ];
        return view('dashboard.products.create',['categories'=>$get_all_categories,'status_cmt'=>$status_cmt]);
    }
    public function store(Request $request)
    {   

        $rules =[
            'name'=>'required|unique:products,name',
            'image'=>'required',
            'price'=>'required', 
            'cate_id'=>'required',  
            'amount'=>'required',  


        ];
        $msg = [
            'name.required'=>"Tên sản phẩm không được để trống",
            'name.unique'=>"Tên sản phẩm đã tồn tại",
            'image.required'=>"Ảnh sản phẩm không được để trống",
            'price.required'=>"Giá sản phẩm không được để trống",
            'cate_id.required'=>'Danh mục không được để trống',
            'amount.required'=>'Số lượng không được để trống',
        ];
        
        $validator = FacadesValidator::make($request->except('_token'),$rules,$msg);
        if($validator->fails()){
            return redirect()->route('dashboard.products.create')->withErrors($validator);
        }
        else{
            $filename = $request->file('image')->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);
            $path = $request->file('image')->move('images/',$filename);
            $image=url('images/'.$filename);
            $Addproduct = Product::insert(
                [
                    'name'=>$request->name,
                    'image'=>$image,
                    "price"=>$request->price,
                    "cate_id"=>$request->cate_id,
                    "sale_off"=>$request->sale_off,
                    "desc_short"=>$request->desc_short,
                    "detail"=>$request->detail,
                    "amount"=>$request->amount,
                    "rating"=>$request->rating,
                    "views"=>$request->views,
                    "status"=>$request->status,
                    "disabled_comment"=>$request->disabled_comment,
                ]
            );
            return redirect()->route('dashboard.products.index');
        }

    }
    public function search(Request $request)
    {   
        $search = Product::where('name','like','%'.$request->search.'%')
                        ->orWhere('id','like','%'.$request->search.'%')->get();
        $searchNull = Product::orderBy('created_at','desc')->paginate(8);
        $url =url('dashboard.products');
        $output = '';
        $test= isset($request->search)=='' ? $searchNull : $search;
        foreach($test as $s){
            $output.="
                
                <tr>  
                    <td>$s->id</td>
                        <td>$s->cate_id</td>
                        <td>$s->name</td>
                        <td>
                        <img width='60' height='50' src='$s->image'>
                        </td>
                        <td>$s->price</td>
                        <td>$s->amount</td>
                        <td>$s->views</td>
                        <td>$s->rating</td>
                        <td>
                          <a href='$url/edit-product/$s->id' title='Chỉnh sửa' class='btn btn-primary'>
                          <i class='fas fa-pen-alt'></i>
                          </a>
                          <a delete-pro='$s->id' class='btn btn-danger del' name-product='$s->name' title='Xóa' href='javascript:;'>
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
                        var proID = $(this).attr('delete-pro')
                        var proName = $(this).attr('name-product')
                        var conf = confirm('Bạn có muốn xóa sản phẩm ' + proName + ' không?')
                        if(conf){
                            window.location.href='$url/destroy/'+proID
                        }
                    })
                });
            </script>
        ";
        if(count($search)>0){
            return response()->json(['result'=>$output,'count'=>count($search)]);
        }
        else{
            return response()->json(['result'=>'err']);
        }
        // dd($output);
        
    }
        // dd($search);
        
    public function edit($id)
    {   $status_cmt = [
        "Bật"=>1,
        "Tắt"=>0
        ];
        $product = Product::find($id);
        $get_all_categories = Category::all();
        return view('dashboard.products.edit', [
            'product' => $product,'listCate'=>$get_all_categories,'status_cmt'=>$status_cmt
        ]);
    }
    public function update(Request $request, $id)
    {
        $editPros = Product::find($id);
        $editPros->fill($request->all());
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $filename = str_replace(' ', '-', $filename);
            $path = $request->file('image')->move('images/',$filename);
            $image=url('images/'.$filename);
            echo $image;
            $editPros->image=$image;
            
        }
        $editPros->save();

        return redirect()->route('dashboard.products.index');
    }
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('dashboard.products.index');
    }
}
