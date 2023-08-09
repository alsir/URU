<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Orderitem;
use App\Models\Manfacturer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function ordering()
    {
        $products = Product::all();
        $categories = Category::all();
        $manfacturers = Manfacturer::all();

        return view('admin.cart.index')
        ->with('products', $products)
        ->with('categories', $categories)
        ->with('manfacturers', $manfacturers);
    }
    public function orderingComfirming(Request $request){
     $order = new Order();
     $order->name = $request->name;
     $order->total=$request->total;
     $order->order_type = $request->order_type;
     $order->save();
     $order_id = $order->id;
     foreach( $request->orderitems as $orderitem){
        $orderitem=new Orderitem();
        $orderitem->product_id = $request->product_id;
        $orderitem->order_id = $order_id;
        $orderitem->quantity = $request->quantity;
        $orderitem ->save();
    }
    toastr()->success('تم حفظ بيانات الطلب بنجاح !!');
    Cart::clear();

    }
    
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('admin.cart.list', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        toastr()->success('تم حفظ بيانات الطلب بنجاح !!');

        return back();
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        toastr()->success('تم تعديل بيانات الطلب بنجاح !!');

        return back();
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        toastr()->success('تم حذف بيانات الطلب بنجاح !!');

        return back();
    }

    public function clearAllCart()
    {
        Cart::clear();

        toastr()->success('تم حفظ بيانات الطلب بنجاح !!');

        return redirect()->route('cart.list');
    }
}

