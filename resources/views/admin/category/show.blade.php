@extends('layouts.app')
@section('title', 'الفئة ')
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
                    <div class="table-responsive">
                        <table class="table zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                
                                    <th>الاسم </th>
                                    <th>الكمية</th>
                                    
                                    <th>الفئة</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $category->name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection