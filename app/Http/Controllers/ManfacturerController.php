<?php

namespace App\Http\Controllers;

use App\Models\Manfacturer;
use App\Http\Requests\StoreManfacturerRequest;
use App\Http\Requests\UpdateManfacturerRequest;

class ManfacturerController extends Controller
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
     * @param  \App\Http\Requests\StoreManfacturerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManfacturerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manfacturer  $manfacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manfacturer $manfacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manfacturer  $manfacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manfacturer $manfacturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateManfacturerRequest  $request
     * @param  \App\Models\Manfacturer  $manfacturer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManfacturerRequest $request, Manfacturer $manfacturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manfacturer  $manfacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manfacturer $manfacturer)
    {
        //
    }
}
