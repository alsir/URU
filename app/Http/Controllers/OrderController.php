<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderitem;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','Desc')->get();
        $order_count= $orders->count();
        $new_order=Order::where('order_status',0)->count();
        $received_order=Order::where('order_status',1)->count();
        $delivered_order=Order::where('order_status',2)->count();


        return view('admin.order.index')
        ->with('orders',$orders)
        ->with('order_count',$order_count)
        ->with('new_order',$new_order)
        ->with('received_order',$received_order)
        ->with('delivered_order',$delivered_order)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order=new order();
        $order->total = $request->total;
        $order->note = $request->note;
        $order->costumer_name = $request->costumer_name;
        $order->costumer_number = $request->costumer_number;
        $order->address = $request->address;
        $order->order_status=$request->order_status;
        $order->coupon_id=$request->coupon_id;
        $order ->save();
        toastr()->success('تم حفظ بيانات الطلب بنجاح !!');
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
        $order = order::find($id);
        $orderitems = Orderitem::where('order_id', $order->id)->get();
        

        return view('admin.order.show')->with('order', $order)
        ->with('orderitems', $orderitems)
        
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
        $order = order::find($id);
        return view('admin.order.edit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $order=order::find($id);
        $order->total = $request->total;
        $order->note = $request->note;
        $order->costumer_name = $request->costumer_name;
        $order->costumer_number = $request->costumer_number;
        $order->address  = $request->address;
        $order->order_status=$request->order_status;
        $order->coupon_id=$request->coupon_id;
        $order ->save();
        toastr()->success('تم حفظ بيانات الطلب بنجاح !!');
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
        $order =  order::find($id)->delete();
        toastr()->success('تم حذف بيانات الطلب بنجاح !!');
        return back();
    }
}
