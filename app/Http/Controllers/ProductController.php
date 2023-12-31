<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Manfacturer;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','Desc')->get();
        $products_counter= $products->count();
        $categories = Category::all();
        $manfacturers = Manfacturer::all();
        $total = 0;
        foreach($products as $product){
            $total = $total + ($product->quantity *$product->price);
        }

        return view('admin.product.index')
        ->with('products',$products)
        ->with('total',$total)
        ->with('products_counter',$products_counter)
        ->with('categories', $categories)
        ->with('manfacturers', $manfacturers)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product=new product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->manfacturer_id = $request->manfacturer_id;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        
        $product ->save();
        toastr()->success('تم حفظ بيانات المنتج بنجاح !!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::find($id);
        $categorying = Category::where('id', $product->category_id)->get();
        $manfacturering = Manfacturer::where('id', $product->manfacturer_id)->get();
        return view('admin.product.show')->with('product', $product)
        ->with('categorying', $categorying)
        ->with('manfacturering', $manfacturering)
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        $categories = Category::all();
        $manfacturers = Manfacturer::all();
        return view('admin.product.edit')->with('product', $product)
        ->with('categories', $categories)
        ->with('manfacturers', $manfacturers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product= Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->manfacturer_id = $request->manfacturer_id;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product ->save();
        toastr()->success('تم حفظ بيانات المنتج بنجاح !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  product::find($id)->delete();
        toastr()->success('تم حذف بيانات المنتج بنجاح !!');
        return back();
    }
}