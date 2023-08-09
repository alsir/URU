<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
       $products = Product::orderBy('id','Desc')->get();
       $products_with_low_quanitiy = Product::where('quantity' ,'<' , 5);

        return view('dashboard')->with('products',$products)
        ->with('products_with_low_quanitiy',$products_with_low_quanitiy)
        ;
}
}
