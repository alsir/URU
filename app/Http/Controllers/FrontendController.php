<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
       $products = Product::orderBy('id','Desc')->get();
       $products_with_low_quanitiys = Product::where('quantity' ,'<' , 5)->get();

        return view('dashboard')->with('products',$products)
        ->with('products_with_low_quanitiys',$products_with_low_quanitiys)
        ;
}
}
