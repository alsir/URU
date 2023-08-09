@extends('layouts.app')
@section('title', 'الرئيسية')
@section('content')
<div class="content-body">
    <div class="col-12"> 
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">المنتجات </h4>
            </div>
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
                    <div class="table-responsive">
                        <table class="table zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                
                                    <th>الاسم </th>
                                    <th>الكمية</th>
                                    
                                    <th>المصنع</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td><a href="/admin/product/{{$product->id}}">{{$product->id}}</a></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $manufacturer->name = $manfacturers->where('id' ,$product->manfacturer_id ) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            @if(Auth::user()->user_type_id  == 1)
            <div class="card-header">
                <h4 class="card-title">المنتجات بكمية اقل من 5 وحدات </h4>
            </div>
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
                    <div class="table-responsive">
                        <table class="table zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                
                                    <th>الاسم </th>
                                    <th>الكمية</th>
                                    
                                    <th>المصنع</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products_with_low_quanitiy as $product)
                                    <tr>
                                        <td><a href="/admin/product/{{$product->id}}">{{$product->id}}</a></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $manufacturer->name = $manfacturers->where('id' ,$product->manfacturer_id ) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            @endif

            
        </div>
    </div>
</div>
@endsection
