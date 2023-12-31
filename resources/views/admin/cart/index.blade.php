@extends('layouts.app')
@section('title', 'الطلبات ')
@section('content')
<div class="content-body">
    <div class="col-12"> 
        <div class="card">

            <div class="card-content">
                <div class="card-body card-dashboard">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="container px-12 py-8 mx-auto">
                        <h3 class="text-2xl font-bold text-purple-700">منتجاتنا</h3>
                        <div class="h-1 bg-red-500 w-36"></div>
                        <div class="grid grid-cols-1 gap-2 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 d-lg-flex flex-row align-content-start flex-wrap ">
                            @foreach ($products as $product)
                            <div class="w-75 max-w-sm mx-auto overflow-hidden bg-white rounded-md shadow-md ">
                                <div class="px-5 py-3">
                                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                                    <span class="mt-2 text-gray-500">${{ $product->price }}</span>
                                    <form action="/admin/cart" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <input type="hidden" value="{{ $product->name }}" name="name">
                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                        <div class="form-group">
                                            <label for="first-name-vertical">الكمية</label>
                                            <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                                name="quantity" min ='1' max="{{$product->quantity}}" placeholder="الكمية" value="{{ old('quantity') }}" required>
                                        </div>
                                        <button class="px-2 py-1.5 text-white text-sm bg-primary rounded">اضافة المنتج</button>
                                    </form>
                                </div>   
                            </div>
                            @endforeach
                            
                </div>
                <a href="/admin/cart" class="btn btn-primary" >متابعة الطلب </a>
            </div>
        </div>
    </div>
</div>

@endsection