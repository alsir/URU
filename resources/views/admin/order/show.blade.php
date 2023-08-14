@extends('layouts.app')
@section('title', ', الطلبات ')
@section('content')
<div class="card position-center">
    <div class="card-body">
        <h3 class="card-title text-center">طلب رقم :{{$order->id}}</h3>
        <h3 class=" text-center">
            @if ($order->order_status == 0)
                <span class="badge badge-danger">مبيعات</span>
            @else
                <span class="badge badge-success"> مشاريع</span>
            @endif
        </h3>
        <p> منفذ العملية :{{$order->name}}</p>
        <p> اسم العميل :{{$order->costumer_name}}</p>
        <p class="card-text">
            المجموع:{{$order->total}} 
        </p>
    </div>
</div>
<div class="table-responsive">
    <table class="table zero-configuration">
        <thead>
            <tr>
                <th>#</th>
                <th>رقم الطلب</th>
                <th>رقم المنتج</th>
                <th>اسم المنتج</th>
                <th>الكمية </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($orderitems as $orderitem)
                <tr>
                    <td>{{$orderitem->id}}</td>
                    {{-- <td>
                        <div class="avatar mr-1 avatar-xl">
                            <img src="{{ asset($product->photo) }}" alt="avtar img holder"
                                style="object-fit: cover">
                        </div>
                    </td> --}}
                    <td><a href="/admin/order/{{$orderitem->order_id}}">{{ $orderitem->order_id }}</a></td>
                    <td><a href="/admin/product/{{$orderitem->product_id}}">{{ $orderitem->product_id }}</a></td>
                    <td> 
                        {{ $orderitem->product_name }}
                    </td>
                    <td>{{ $orderitem->quantity }}</td>
                       
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection