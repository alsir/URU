@extends('layouts.app')
@section('title', 'تاكيد الطلب ')
@section('content')
<section id="touchspin-min-max">
    <div class="row">
<div class="col-lg-6">
    <div class="order-infobox">
        <h3 class="small-title">الطلب</h3>
        <div class="checkout-table table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-left">المنتج</th>
                        <th class="text-left">الكمية</th>
                        <th class="text-right">المجموع</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                    <tr>
                        <td class="text-left"> {{$cartItem->name}} </td>
                        <td class="text-left"> {{$cartItem->quantity}} </td>
                        <td class="text-right">{{$cartItem->quantity * $cartItem->price}}  </td>  
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="total-price">
                        <th class="text-left">المجموع</th>
                        <th class="text-left"></th>
                        <td class="text-right">{{ Cart::getTotal() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <form class="form form-vertical" action="/admin/ordering" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden"  value="{{ Auth::user()->name }}"name="name" >
            <input type="hidden" value="{{ Cart::getTotal() }}" name="total">
            <div class="col-6">
                <div class="form-group">
                    <label for="first-name-vertical">اسم العميل </label>
                    <input type="text" class="form-control @error('costumer_name') is-invalid @enderror"
                        name="costumer_name" placeholder="اسم العميل " value="{{ old('costumer_name') }}" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="email-id-vertical"> نوع الطلب</label>
                    <select name="order_type" class="form-control" required>
                        <option value="0" @selected(old('order_type') == 0)>مبيعات</option>
                        <option value="1" @selected(old('order_type') == 1)>مشاريع</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mr-1 mb-1">تاكيد</button>
        </button>
        </form>
    </div>
</div>
    </div>
</section>
@endsection