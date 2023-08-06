<?php

namespace App\Http\Controllers;

use App\Models\Orderitem;
use App\Http\Requests\StoreOrderitemRequest;
use App\Http\Requests\UpdateOrderitemRequest;

class OrderitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreOrderitemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderitemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orderitem  $orderitem
     * @return \Illuminate\Http\Response
     */
    public function show(Orderitem $orderitem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orderitem  $orderitem
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderitem $orderitem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderitemRequest  $request
     * @param  \App\Models\Orderitem  $orderitem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderitemRequest $request, Orderitem $orderitem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orderitem  $orderitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderitem $orderitem)
    {
        //
    }
}
