<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('admin.cart.index', compact('cartItems'));
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

        return redirect()->route('cart.list');
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

        toastr()->success('تم حفظ بيانات الطلب بنجاح !!');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        toastr()->success('تم حفظ بيانات الطلب بنجاح !!');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        Cart::clear();

        toastr()->success('تم حفظ بيانات الطلب بنجاح !!');

        return redirect()->route('cart.list');
    }
}

