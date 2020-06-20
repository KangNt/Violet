<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// }); 


// Route::get('login-dashboard', function () {
//     if(Auth::check()){
//         return redirect()->route('dashboard');
//     }else{  
//         return view('dashboard.login');
//     }  
// })->name('login');

// Route::get('logout', function () {
//     Auth::logout();
//     return redirect()->route('login');
// })->name('logout');

// Route::post('check-login', function (Request $request) {
//     $Get_info = $request->only(['email', 'password']);
//     $checkLogin = Auth::attempt($Get_info);
//     if($checkLogin){
//         return redirect()->route('dashboard');
//     }
//     else{
//         return redirect()->route('login')->with('err','Tài khoản hoặc mật khẩu không chính xác');
//     } 
// })->name('Checklogin');



Route::group([
    'prefix'=>'/dashboard',
    'as'=>'dashboard.',
    'namespace' => 'Admin'],function(){ 

    Route::get('','AdminController@index')->name('index');// hiển thị tất cả tài nguyên
});

// Route::get('Dashboard','AdminController@index')->name('admin');


Route::group([
    'prefix'=>'/dashboard/users',
    'as'=>'dashboard.users.',
    'namespace' => 'Admin',
    // 'middleware'=>'Checklogin'
    ]
    ,function(){
     //------------------------------------------users----------------------------------
     Route::get('/','UserController@index')->name('index'); // hiển thị toàn bộ users
     Route::get('/create','UserController@create')->name('create');//tạo mới
     Route::post('/store','UserController@store')->name('store');//lưu trữ một tài nguyên mới
     Route::get('/edit/{id}','UserController@edit')->name('edit');// sửa một tài nguyên theo tham số truyền vào
     Route::post('/update/{id}','UserController@update')->name('update');
     Route::get('/show','UserController@show')->name('show');
     Route::get('/destroy/{id}','UserController@destroy')->name('destroy');//xóa 1 tài nguyên
     //---------------------------------------------------------------------------------------
});

Route::group([
    'prefix'=>'/dashboard/orders',
    'as'=>'dashboard.orders.',
    'namespace' => 'Admin',
    // 'middleware'=>'Checklogin'
    // 'middleware'=> 'check_admin_role',
],function(){
    Route::get('/','OrderController@index')->name('index');// hiển thị tất cả tài nguyên
    Route::get('/create','OrderController@create')->name('create');//tạo mới
    Route::post('/store','OrderController@store')->name('store');//lưu trữ một tài nguyên mới
    Route::post('/search','OrderController@search')->name('search');
    Route::get('/edit/{id}','OrderController@edit')->name('edit');// sửa một tài nguyên theo tham số truyền vào
    Route::post('/update/{id}','OrderController@update')->name('update');//cập nhật 1 tài nguyên theo tham số truyền vào
    Route::post('/filter','OrderController@filter')->name('filter');
    Route::post('/show-filter','OrderController@show_filter')->name('show-filter');
    Route::get('/show/{id}','OrderController@show')->name('show');
    Route::get('/destroy/{id}','OrderController@destroy')->name('destroy');//xóa 1 tài nguyên
    
});


Route::group([
    'prefix'=>'/dashboard/contacts',
    'as'=>'dashboard.contacts.',
    'namespace' => 'Admin',
    // 'middleware'=>'Checklogin'
    // 'middleware'=> 'check_admin_role',
],function(){
    Route::get('/','ContactController@index')->name('index');// hiển thị tất cả tài nguyên
    Route::get('/create','ContactController@create')->name('create');//tạo mới
    Route::post('/store','ContactController@store')->name('store');//lưu trữ một tài nguyên mới
    Route::get('/edit/{id}','ContactController@edit')->name('edit');// sửa một tài nguyên theo tham số truyền vào
    Route::post('/update/{id}','ContactController@update')->name('update');//cập nhật 1 tài nguyên theo tham số truyền vào
    Route::get('/reply/{id}','ContactController@ReplyContact')->name('reply');
    Route::post('/submit-reply/{id}','ContactController@SubmitReplyContact')->name('submitReplyContact');
    Route::get('/show','ContactController@show')->name('show');
    Route::get('/destroy/{id}','ContactController@destroy')->name('destroy');//xóa 1 tài nguyên
    
});


Route::group([
    'prefix'=>'/dashboard/comments',
    'as'=>'dashboard.comments.',
    'namespace' => 'Admin',
    // 'middleware'=>'Checklogin'
    // 'middleware'=> 'check_admin_role',
],function(){
    Route::get('/','CommentController@index')->name('index');// hiển thị tất cả tài nguyên
    Route::get('/create','CommentController@create')->name('create');//tạo mới
    Route::post('/store','CommentController@store')->name('store');//lưu trữ một tài nguyên mới
    Route::get('/edit/{id}','CommentController@edit')->name('edit');// sửa một tài nguyên theo tham số truyền vào
    Route::post('/update/{id}','CommentController@update')->name('update');//cập nhật 1 tài nguyên theo tham số truyền vào
    Route::get('/show','CommentController@show')->name('show');
    Route::get('/destroy/{id}','CommentController@destroy')->name('destroy');//xóa 1 tài nguyên
    
});


Route::group([
    'prefix'=>'/dashboard/products',
    'as'=>'dashboard.products.',
    'namespace' => 'Admin',
    // 'middleware'=>'Checklogin'
    // 'middleware'=> 'check_admin_role',
],function(){
    Route::get('list-product','ProductController@index')->name('index');// hiển thị tất cả tài nguyên
    Route::get('/create','ProductController@create')->name('create');//tạo mới
    Route::post('/store','ProductController@store')->name('store');//lưu trữ một tài nguyên mới
    Route::get('/edit-product/{id}','ProductController@edit')->name('edit');// sửa một tài nguyên theo tham số truyền vào
    Route::post('/update-product/{id}','ProductController@update')->name('update');//cập nhật 1 tài nguyên theo tham số truyền vào
    Route::get('/show','ProductController@show')->name('show');
    Route::post('/search','ProductController@search')->name('search');
    Route::get('/destroy/{id}','ProductController@destroy')->name('destroy');//xóa 1 tài nguyên
    
});


Route::group([
    'prefix'=>'/dashboard/categories',
    'as'=>'dashboard.categories.',
    'namespace' => 'Admin',
    // 'middleware'=>'Checklogin'
    // 'middleware'=> 'check_admin_role',
],function(){
    Route::get('/','CategoryController@index')->name('index');// hiển thị tất cả tài nguyên
    Route::get('/create','CategoryController@create')->name('create');//tạo mới
    Route::post('/store','CategoryController@store')->name('store');//lưu trữ một tài nguyên mới
    Route::get('/edit/{id}','CategoryController@edit')->name('edit');// sửa một tài nguyên theo tham số truyền vào
    Route::post('/update/{id}','CategoryController@update')->name('update');//cập nhật 1 tài nguyên theo tham số truyền vào
    Route::get('/show','CategoryController@show')->name('show');
    Route::get('/destroy/{id}','CategoryController@destroy')->name('destroy');//xóa 1 tài nguyên
    
});


Route::group([
    'prefix'=>'/dashboard/vouchers',
    'as'=>'dashboard.vouchers.',
    'namespace' => 'Admin',
    // 'middleware'=>'Checklogin'
    // 'middleware'=> 'check_admin_role',
],function(){
    Route::get('/','VoucherController@index')->name('index');// hiển thị tất cả tài nguyên
    Route::get('/create','VoucherController@create')->name('create');//tạo mới
    Route::post('/store','VoucherController@store')->name('store');//lưu trữ một tài nguyên mới
    Route::get('/edit/{id}','VoucherController@edit')->name('edit');// sửa một tài nguyên theo tham số truyền vào
    Route::post('/update/{id}','VoucherController@update')->name('update');//cập nhật 1 tài nguyên theo tham số truyền vào
    Route::get('/show','VoucherController@show')->name('show');
    Route::get('/destroy/{id}','VoucherController@destroy')->name('destroy');//xóa 1 tài nguyên
    
});








//Route site
Route::group([
    'prefix'=>'/',
    'as'=>'site',
],function(){
    Route::get('/','HomeController@index')->name('index');// hiển thị tất cả tài nguyên
    Route::get('/categories','HomeController@categories')->name('categories');// hiển thị tất cả tài nguyên
    Route::get('/dresses','HomeController@dresses')->name('dresses');// hiển thị tất cả tài nguyên
    Route::get('/bags','HomeController@bags')->name('bags');// hiển thị tất cả tài nguyên
    Route::get('/shoes','HomeController@shoes')->name('shoes');// hiển thị tất cả tài nguyên
    Route::get('/accesories','HomeController@accesories')->name('accesories');// hiển thị tất cả tài nguyên
    Route::get('/checkout','HomeController@checkout')->name('checkout');// hiển thị tất cả tài nguyên
    Route::get('/contacts','HomeController@contacts')->name('contacts');// hiển thị tất cả tài nguyên
    Route::get('/about','HomeController@about')->name('about');// hiển thị tất cả tài nguyên
    Route::get('/shoppingCart','HomeController@shoppingCart')->name('shoppingCart');// hiển thị tất cả tài nguyên
    Route::get('/register','HomeController@register')->name('register');// hiển thị tất cả tài nguyên
    Route::get('/signIn','HomeController@signIn')->name('signIn');// hiển thị tất cả tài nguyên
    Route::get('/profile','HomeController@profile')->name('profile');// hiển thị tất cả tài nguyên
    Route::get('/productDetail','HomeController@productDetail')->name('productDetail');// hiển thị tất cả tài nguyên
    

});



