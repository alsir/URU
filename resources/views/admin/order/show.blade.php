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
        <p> منفذ العملية {{$order->name}}</p>

        <p class="card-text">
            تعليق:{{$order->note}}
        </p>
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
                <th>الكمية </th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($orderitems as $orderitem)
                <tr>
                    <td><a href="/admin/orderitem/{{$orderitem->id}}">{{$orderitem->id}}</a></td>
                    {{-- <td>
                        <div class="avatar mr-1 avatar-xl">
                            <img src="{{ asset($product->photo) }}" alt="avtar img holder"
                                style="object-fit: cover">
                        </div>
                    </td> --}}
                    <td><a href="/admin/order/{{$orderitem->order_id}}">{{ $orderitem->order_id }}</a></td>
                    <td><a href="/admin/product/{{$orderitem->product_id}}">{{ $orderitem->product_id }}</a></td>
                    <td>{{ $orderitem->quantity }}</td>
                       <td> <button class="btn btn-success" name="edit_button"
                            value="{{ $orderitem->id }}" data-toggle="modal"
                            data-target="#edit_modal"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger mr-2"
                            onclick="if(confirm('هل أنت متأكد ؟')){document.getElementById('delete-users_{{ $orderitem->id }}').submit();}else{
                    event.preventDefault();}"><i
                                class="fa fa-trash"></i></button>
                        <form id="delete-users_{{ $orderitem->id }}"
                            action="/admin/orderitem/{{ $orderitem->id }}" method="POST"
                            class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection