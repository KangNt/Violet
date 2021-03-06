<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listProducts= Product::all() ;
        return view('site.layouts.home',['listProducts'=>$listProducts]);
    }

    public function categories()
    {
        $listCategories = Category::all();
        return view('site.pages.categories',['listCategories'=>$listCategories]);
    }

    public function dresses()
    {
        $listDresses = Product::where('cate_id',47)->limit(6)->get(); 
        return view('site.pages.dresses',['listDresses' => $listDresses]);
    }
    
    public function bags()
    {
        $listBags = Product::where('cate_id',48)->limit(6)->get();
        return view('site.pages.bags',['listBags'=>$listBags]);
    }
    public function shoes()
    {
        $listShoes = Product::where('cate_id',49)->limit(6)->get(); 
        return view('site.pages.shoes',['listShoes'=>$listShoes]);
    }
    public function accesories()
    {   
        $listAccesories = Product::where('cate_id',50)->limit(6)->get();
        return view('site.pages.accesories',['listAccesories'=>$listAccesories]);
    }
    public function checkout()
    {
        return view('site.pages.checkout');
    }
    public function contacts()
    {
        return view('site.pages.contacts');
    }
    public function about()
    {
        return view('site.pages.about');
    }

    public function shoppingCart()
    {
        return view('site.pages.shoppingCart');
    }
    public function register()
    {
        return view('site.pages.register');
    }
    public function signIn()
    {
        return view('site.pages.signIn');
    }
    public function profile()
    {
        return view('site.pages.profile');
    }
    public function productDetail()
    {
        $listProducts= Product::all();
        return view('site.pages.productDetail',['listProducts'=>$listProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
