<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('site.layouts.home');
    }

    public function categories()
    {
        return view('site.pages.categories');
    }

    public function dresses()
    {
        return view('site.pages.dresses');
    }
    
    public function bags()
    {
        return view('site.pages.bags');
    }
    public function shoes()
    {
        return view('site.pages.shoes');
    }
    public function accesories()
    {
        return view('site.pages.accesories');
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
